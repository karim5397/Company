<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Contact;
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
    $contacts=Contact::get();
    return view('home' ,compact('brands','sliders' , 'abouts' ,'services','multipics','contacts'));
   }

   public function portoflio(){
    $multipics=MultiPic::all();
    return view('pages.portoflio' , compact('multipics'));
   }
    public function aboutUs(){
        $abouts=About::first();
        $brands=Brand::get();
        return view('pages.aboutus' , compact('abouts','brands'));
    }
    public function services(){
        $services=Service::get();
        return view('pages.services' ,compact('services'));
    }
    public function pricing(){
        return view('pages.pricing');
    }
    public function blogs(){
        return view('pages.blogs');
    }
    public function team(){
        return view('pages.team');
    }
    public function testimonials(){
        return view('pages.testimonials');
    }


}
