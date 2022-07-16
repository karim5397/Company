<?php

namespace App\Http\Controllers;

use App\Models\MultiPic;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MultiPicController extends Controller
{
    public function index(){
        $images=MultiPic::get();
        return view('admin.multi_pics.index',compact('images'));
    }
    public function store(Request $request){

        $validated = $request->validate([
            'image' => 'required',
        ],
        [
            'image.required'=>'Please Input ',

        ]);

        $image=$request->file('image');
        foreach($image as $mutli_pic){

            $img_uniqed=hexdec(uniqid()).'.'.$mutli_pic->getClientOriginalExtension();
            $last_image_name="image/muti_pics/".$img_uniqed;
            Image::make($mutli_pic)->resize(300,200)->save($last_image_name);


            $images=new MultiPic;
            $images->image=$last_image_name;
            $images->save();
        }

        return redirect()->back()->with('message' , 'Images Add Successfully');
    }
}
