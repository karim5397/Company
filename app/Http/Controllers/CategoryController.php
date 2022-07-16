<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //one to one relation ship by query builder
        // $categories=DB::table('categories')
        // ->join('users' ,'categories.user_id','users.id')
        // ->select('categories.*' , 'users.name')
        // ->latest()->paginate(3);





        // $categories=Category::all();
        // $categories=DB::table('categories')->latest()->get();
        // $categories=Category::latest()->get(); // to show the newest data first


         $categories=Category::latest()->paginate(3);
         $trashcat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index' , compact("categories",'trashcat'));

    }
    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ],
        [
            'category_name.required'=>'Please Input Category Name',
            'category_name.max'=>'The Max Length Is 55 Letter',
        ]);
        //1)query builder first method

        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);

        //2)query builder second method

        // $category= new Category;
        // $category->category_name=$request->category_name;
        // $category->user_id= Auth::user()->id;
        // $category->save();

        //3)query builder third method

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);


        return redirect()->back()->with('message' , 'The Category Add Successfully');
    }
    public function edit($id){
        $categories=Category::findOrFail($id);
        // $categories=DB::table('categories')->where('id' ,$id)->first(); //query builder
        return view('admin.category.edit' , compact('categories'));
    }
    public function update(Request $request ,  $id){

        $categories=Category::findOrFail($id)->update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
        ]);

        //query builder
        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->where('id' , $id)->update($data);
        return redirect()->route('all.category')->with('message' , 'The Category Updated Successfully');
    }
    public function softDelete($id){
        $category=Category::find($id)->delete();
        return redirect()->route('all.category')->with('message' , 'The Category Deleted Successfully');

    }
    public function restoreCat($id){
        $category=Category::withTrashed()->find($id)->restore();
        return redirect()->route('all.category')->with('message' , 'The Category Restored Successfully');

    }
    public function permanentlyDeleted($id){
        $category=Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('all.category')->with('message' , 'The Category Permanently Deleted Successfully');
    }
}
