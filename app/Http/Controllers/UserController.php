<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Requests\user\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->Paginate(5);
        return view('admin.user.index' , compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(UserRequest $request)
    {
        //upload hasFile image
        if($request->hasFile('image')){

            $user_img=$request->file('image');
            $img_ext=hexdec(uniqid()). '.' . $user_img->getClientOriginalExtension();
            $img_path="frontend/assets/img/";
            $last_img=$img_path . $img_ext;
            Image::make($user_img)->resize(400 , 500)->save($last_img);
            //upload hasFile image

            User::create(array_merge($request->validated(), ['image'=>$last_img]));
            return redirect()->route('users.index')->with('message' , 'User Created Successfully');
        }

            User::create($request->validated());
            return redirect()->route('users.index')->with('message' , 'User Created Successfully');

    }


    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.edit' , compact('user'));
    }

    public function update(UserRequest $request , User $user)
    {

        if ($request->password) {
            $password  = Hash::make($request->password);
          } else {
            $password  =  $user->password;
          }

        $old_image=$request->old_image;
        $user_img=$request->file('image');

        if($user_img){
            $img_ext=hexdec(uniqid()). '.' . $user_img->getClientOriginalExtension();
            $img_path='frontend/assets/img/';
            $last_img=$img_path . $img_ext;
            Image::make($user_img)->resize(400 , 500)->save($last_img);
            unlink($old_image);

            $user=User::find($user->id);
            $user->update(array_merge($request->validated(), ['image'=>$last_img],[$password]));
            return redirect()->route('users.index')->with('message' , 'The User Is Updated Successfully');
        }else{
            $user=User::find($user->id)->update($request->safe()->except(['image' ,'password']));
            return redirect()->route('users.index')->with('message' , 'The User Is Updated Successfully');
        }

    }

    public function destroy(User $user)
    {

        if($user->image === null){
            $user=User::findOrFail($user->id);
            $user->delete();
        }else{
            $user->delete();
            $old_image=$user->image;
            unlink($old_image);
        }

        return redirect()->route('users.index')->with('message' , 'The User Is Deleted Successfully');
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('message' , 'You Logout');
    }
}
