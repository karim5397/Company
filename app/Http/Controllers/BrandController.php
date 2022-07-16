<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::latest()->paginate(3);
        return view('admin.brand.index' , compact('brands'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
            'brand_image' => 'required|mimes:png,jpg,jpeg',
        ],
        [
            'brand_name.required'=>'Please Input Brand Name',
            'brand_name.max'=>'The Max Length Is 55 Letter',
        ]);

        //store image without package
        // $brand_image=$request->file('brand_image');
        // $image_extention=strtolower($brand_image->getClientOriginalExtension());
        // $uniqe_id=hexdec(uniqid());
        // $image_name=$uniqe_id.'.'.$image_extention;
        // $image_location='image/brand/';
        // $last_image_name=$image_location.$image_name;
        // $brand_image->move($image_location , $image_name);

        $brand_image=$request->file('brand_image');
        $img_uniqed=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        $last_image_name="image/brand/".$img_uniqed;
        Image::make($brand_image)->resize(300,200)->save($last_image_name);


        $brand=new Brand;
        $brand->brand_name=$request->brand_name;
        $brand->brand_image=$last_image_name;
        $brand->save();

        return redirect()->back()->with('message' , 'Brand Add Successfully');
    }
    public function edit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit' ,compact('brands'));
    }
    public function update(Request $request , $id){
        $validated = $request->validate([
            'brand_name' => 'required|max:55',
        ],
        [
            'brand_name.required'=>'Please Input Brand Name',
            'brand_name.max'=>'The Max Length Is 55 Letter',
        ]);


        $old_image=$request->old_image; //to remove old image

        $brand_image=$request->file('brand_image');

        if($brand_image){
            $image_extention=strtolower($brand_image->getClientOriginalExtension());
            $uniqe_id=hexdec(uniqid());
            $image_name=$uniqe_id.'.'.$image_extention;
            $image_location='image/brand/';
            $last_image_name=$image_location.$image_name;
            $brand_image->move($image_location , $image_name);

            unlink($old_image); //to remove old image

            $brand=Brand::find($id);
            $brand->brand_name=$request->brand_name;
            $brand->brand_image=$last_image_name;
            $brand->update();

            return redirect()->back()->with('message' , 'Brand  Updated Successfully');
        }else{
            $brand=Brand::find($id);
            $brand->brand_name=$request->brand_name;
            $brand->update();

            return redirect()->back()->with('message' , 'Brand  Updated Successfully');
        }


    }
    public function delete($id){
        $brand=Brand::find($id);
        $old_image=$brand->brand_image;
        unlink($old_image);
        $brand->delete();
        return redirect()->back()->with('message' , 'The Brand Deleted Successfully');
    }
}
