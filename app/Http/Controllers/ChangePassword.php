<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePassword extends Controller
{
    public function changePass(){
        return view('admin.dashboard_body.change_password');
    }
}
