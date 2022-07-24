<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function changePass(){
        return view('admin.dashboard_body.change_password');
    }
    public function updatePass(Request $request){
        $validateDate=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword , $hashedPassword))
        {
            $user =User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message' , 'The Password Change Successfully');
        }else{
            return redirect()->back()->with('message' , 'Current Password Is Invalide');
        }
    }

    public function profile(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user){
                return view('admin.dashboard_body.profile_update' ,compact('user'));
            }

        }
    }

    public function updateProfile(Request $request){
        $user=User::find(Auth::user()->id);
        if($user){
            $user->name=$request->name;
            $user->email=$request->email;
            $user->save();
            return redirect()->back()->with('message' , 'The Profile Update Successfully');
        }
        return redirect()->back();
    }
}
