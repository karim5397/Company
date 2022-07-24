<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiPicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , [HomeController::class ,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users=User::all(); //elquant orm
        // $users=DB::table('users')->get(); // query builder
        return view('admin.index');
    })->name('dashboard');
});

//category routes
Route::get('/category/all' , [CategoryController::class , 'index'])->name('all.category');
Route::post('/category/store' , [CategoryController::class , 'store'])->name('store.category');
Route::get('/category/edit/{id}' , [CategoryController::class , 'edit']);
Route::post('/category/edit/{id}' , [CategoryController::class , 'update'])->name('update.category');
Route::get('/category/softdelete/{id}' , [CategoryController::class , 'softDelete']);
Route::get('/category/restore/{id}' , [CategoryController::class , 'restoreCat']);
Route::get('/category/forceDelete/{id}' , [CategoryController::class , 'permanentlyDeleted']);

//brand routes
Route::get('/all/brands' , [BrandController::class , 'index'])->name('all.brands');
Route::post('/brand/store' , [BrandController::class , 'store'])->name('store.brand');
Route::get('/brand/edit/{id}' , [BrandController::class , 'edit']);
Route::post('/brand/update/{id}' , [BrandController::class , 'update'])->name('update.brand');
Route::get('/brand/delete/{id}' , [BrandController::class , 'delete']);

//Muliti pics routes

Route::get('/all/pics' , [MultiPicController::class ,'index'])->name('all.pics');
Route::post('/add/image' ,[MultiPicController::class , 'store'])->name('store.image');


//user routes
Route::get('/user/logout' , [UserController::class , 'Logout'])->name('user.logout');


//Admin routes
//slider
Route::get('/home/slider',[SliderController::class ,'HomeSlider'])->name('home.slider');
Route::get('/create/slider',[SliderController::class ,'createSlider'])->name('create.slider');
Route::post('/store/slider',[SliderController::class ,'storeSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[SliderController::class ,'editSlider'])->name('edit.slider');
Route::post('/slider/update/{id}' , [SliderController::class , 'updateSlider'])->name('update.slider');
Route::get('/slider/delete/{id}',[SliderController::class ,'deleteSlider'])->name('delete.slider');
//about
Route::get('/home/about' ,[AboutController::class , 'index'])->name('home.about');
Route::get('/about/create' ,[AboutController::class , 'create'])->name('about.create');
Route::post('/about/store' ,[AboutController::class , 'store'])->name('about.store');
Route::get('/about/edit/{id}' ,[AboutController::class , 'edit'])->name('about.edit');
Route::post('/about/update/{id}' ,[AboutController::class , 'update'])->name('about.update');
Route::get('/about/delete/{id}' ,[AboutController::class , 'destroy'])->name('about.delete');

//services
Route::get('/home/service' ,[ServiceController::class , 'index'])->name('home.service');
Route::get('/service/create' ,[ServiceController::class , 'create'])->name('service.create');
Route::post('/service/store' ,[ServiceController::class , 'store'])->name('service.store');
Route::get('/service/edit/{id}' ,[ServiceController::class , 'edit'])->name('about.edit');
Route::post('/service/update/{id}' ,[ServiceController::class , 'update'])->name('service.update');
Route::get('/service/delete/{id}' ,[ServiceController::class , 'destroy'])->name('service.delete');


//portoflio
Route::get('/portoflio' ,[HomeController::class , 'portoflio'])->name('portoflio');


//contact us
Route::get('/contact' ,[ContactController::class , 'index'])->name('contact-us');
Route::get('/admin/contacts' , [ContactController::class , 'adminContact'])->name('contacts.index');
Route::get('/contact/create' ,[ContactController::class , 'create'])->name('contact.create');
Route::post('/contact/store' ,[ContactController::class , 'store'])->name('contact.store');
Route::get('/contact/edit/{id}' ,[ContactController::class , 'edit'])->name('contact.edit');
Route::put('/contact/update/{contact}' ,[ContactController::class , 'update'])->name('contact.update');
Route::get('/contact/delete/{id}' ,[ContactController::class , 'destroy'])->name('contact.delete');

Route::post('/send-message' ,[ContactController::class , 'ContactMessage'])->name('contact.form');
Route::get('/show/message' ,[ContactController::class , 'showMessage'])->name('show.form');
Route::get('/msg/delete/{id}' ,[ContactController::class , 'deleteMessage'])->name('delete.form');


//change password & user profile

Route::get('/change/password' , [ChangePassword::class , 'changePass'])->name('change.password');
Route::post('/update/password' , [ChangePassword::class , 'updatePass'])->name('update.password');
Route::get('/user/profile' , [ChangePassword::class , 'profile'])->name('profile');
Route::post('/profile/update' , [ChangePassword::class , 'updateProfile'])->name('update.profile');
