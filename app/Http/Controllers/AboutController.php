<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts=About::get();
        return view('admin.about.index' , compact('abouts'));
    }
    public function create(){
        return view('admin.about.create');
    }

    public function store(Request $request){
        About::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'long_description'=>$request->long_desc,
        ]);
        return redirect()->route('home.about')->with('message' , 'The About Created Successfully');

    }

    public function edit($id){
        $abouts=About::find($id);
        return view('admin.about.edit' ,compact('abouts'));
    }

    public function update(Request $request ,$id){
        $abouts=About::findOrFail($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'long_description'=>$request->long_desc,
        ]);
        return redirect()->route('home.about')->with('message' , 'The About Updated Successfully');

    }
    public function destroy($id){
        About::findOrFail($id)->delete();
        return redirect()->back()->with('message' , 'The About Deleted Successfully');

    }
}
