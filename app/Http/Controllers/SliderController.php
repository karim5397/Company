<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function HomeSlider(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));

    }

    public function createSlider(){
        return view('admin.slider.create');

    }
    public function storeSlider(Request $request){
        $sliders=new Slider;

        $slider_image=$request->file('image');
        $img_ext=hexdec(uniqid()). '.' . $slider_image->getClientOriginalExtension();
        $img_path='image/slider/';
        $last_img=$img_path . $img_ext;
        Image::make($slider_image)->resize(1920 , 1088)->save($last_img);

        $sliders->title=$request->title;
        $sliders->description=$request->description;
        $sliders->image=$last_img;
        $sliders->save();
        return redirect()->route('home.slider')->with('message' , 'The Slider Is Created Successfully');

    }
    public function editSlider($id){
        $sliders=Slider::findOrFail($id);
        return view('admin.slider.edit' , compact('sliders'));
    }
    public function updateSlider(Request $request , $id){



        $old_image=$request->old_image;
        $slider_image=$request->file('image');
        if($slider_image){
            $img_ext=hexdec(uniqid()). '.' . $slider_image->getClientOriginalExtension();
            $img_path='image/slider/';
            $last_img=$img_path . $img_ext;
            Image::make($slider_image)->resize(1920 , 1088)->save($last_img);
            unlink($old_image);

            $sliders=Slider::findOrFail($id);
            $sliders->title=$request->title;
            $sliders->description=$request->description;
            $sliders->image=$last_img;
            $sliders->update();
            return redirect()->route('home.slider')->with('message' , 'The Slider Is Updated Successfully');
        }else{
            $sliders=Slider::findOrFail($id);
            $sliders->title=$request->title;
            $sliders->description=$request->description;
            $sliders->update();
            return redirect()->route('home.slider')->with('message' , 'The Slider Is Updated Successfully');
        }

    }
    public function deleteSlider($id){
        $slider=Slider::findOrFail($id)->delete();
        $old_image=$slider->image;
        unlink($old_image);
        return redirect()->route('home.slider')->with('message' , 'The Slider Is Deleted Successfully');
    }
}
