<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\MultiPic;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    $brands=Brand::get();
    $sliders=Slider::get();
    $abouts=About::first();
    $services=Service::get();
    $multipics=MultiPic::all();
    return view('home' ,compact('brands','sliders' , 'abouts' ,'services','multipics'));
   }

   public function portoflio(){
    $multipics=MultiPic::all();
    return view('pages.portoflio' , compact('multipics'));
   }


}
