<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImageController extends Controller
{
   public function __construct() {
       $this->middleware('auth');
   }
   
    public function index()
    {
        $images = MultiImage::all();
        return view('admin.multiImage.index', [
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.multiImage.create');
    }

    public function store(Request $request)
    {
        $files = $request->hasfile('image');
        if($files) {
            $images = $request->file('image');
            foreach($images as $image) {
            $extension         = strtolower($image->getClientOriginalExtension());
            $unique_id         = hexdec(uniqid());
            $image_name        = $unique_id.'.'.$extension;
            $image_upload_path = 'images/multiImage/';
            $image->move($image_upload_path, $image_name);
            MultiImage::insert([
                'image'      => $image_name,
                'created_at' => Carbon::now()
            ]);
         }
        }
        return redirect()->route('multiImage.index')->with('message', 'Image Added Successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
