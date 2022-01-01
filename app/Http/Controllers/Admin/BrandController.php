<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $brands = Brand::latest()->paginate(5);

        return view('admin.brand.index', [
            'brands' => $brands
        ]);
    }

   
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'brand_name' => 'required|min:3|max:100|unique:brands'
        ]);

        $brand             = new Brand();
        $brand->brand_name = $request->brand_name;
        $image             = $request->file('brand_image');
        if($image)
        {
            $extension         = strtolower($image->getClientOriginalExtension());
            $unique_id         = hexdec(uniqid());
            $image_name        = $unique_id.'.'.$extension;
            $image_upload_path = 'images/brandImages/';
            $image->move($image_upload_path, $image_name);
            $brand->brand_image = $image_name;
        }
        $brand->save();

        return redirect()->route('brands.index')->with('message', 'Brand Created Successfully');
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'brand_name' => "required|min:3|max:100|unique:brands,brand_name,$id"
            ]
        );

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_image');
        if($image)
        {
            $old_image = 'images/brandImages/'.$brand->brand_image;
            if(File::exists($old_image))
            {
                File::delete($old_image);
            }
            $extension = $image->getClientOriginalExtension();
            $unique_id = hexdec(uniqid());
            $image_name = $unique_id.'.'.$extension;
            $image_upload_path = 'images/brandImages/';
            $image->move($image_upload_path, $image_name);
            $brand->brand_image = $image_name;
        }
        $brand->save();

        return redirect()->route('brands.index')->with('message', 'Brand Updateded successfully');
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        //find brand image
        $image = 'images/brandImages/'.$brand->brand_image;
        if(File::exists($image))
        {
            File::delete($image);
        }
        $brand->delete();

        return redirect()->back()->with('message', 'Brand Deleted Successsfully');
    }

}
