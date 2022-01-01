<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        //get all data using ORM
        // $categories = Category::all();

        //get latest data using ORM
        // $categories = Category::latest()->get();

        //get data with paginatuion
        $categories = Category::latest()->paginate(5);

        //get all data using query builder
        // $categories = DB::table('categories')->get();

        // joint query
        // $categories = DB::table('categories')
        //             ->join('users', 'categories.user_id', 'users.id')
        //             ->select('categories.*', 'users.name')->get();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
            'category_name' => 'required|min:3|max:255|unique:categories'
            ],
            //custom validation message
            [
                'category_name.required' => 'Please Enter Category Name',
                'category_name.min'      => 'Minimum Leangth is Three Character'
            ]
        );

        $category                = new Category();
        $category->category_name = $request->category_name;
        $category->user_id       = Auth::user()->id;
        $category->save();

        // insert data using query builder
        // $category = array();
        // $category['category_name'] = $request->category_name;
        // $category['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($category);

        return redirect()->route('categories.index')->with('message', 'Category Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //using ORM
        $category = Category::find($id);

        //using query builder
        // $category = DB::table('categories')->where('id', $id)->first();

        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'category_name' => "required|min:3|max:255|unique:categories,category_name,$id"
            ]
        );

        $category                = Category::find($id);
        $category->category_name = $request->category_name;
        $category->user_id       = Auth::user()->id;
        $category->save();

        //update data using query builder
        // $category                  = array();
        // $category['category_name'] = $request->category_name;
        // $category['user_id']       = Auth::user()->id;
        // DB::table('categories')->where('id', $id)->update($category);

        return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
