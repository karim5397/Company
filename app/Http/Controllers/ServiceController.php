<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceUpdateRequest;

class ServiceController extends Controller
{
    public function index(){
        $services=Service::get();
        return view('admin.services.index' , compact('services'));
    }
    public function create(){
        return view('admin.services.create');
    }
    public function store(ServiceStoreRequest $request){

        Service::create($request->validated());
        return redirect()->route('home.service')->with('message' , 'The Service Created Successfully');
    }
    public function edit($id){
        $services=Service::find($id);
        return view('admin.services.edit' ,compact('services'));
    }
    public function update(ServiceUpdateRequest $request , $id){
        Service::find($id)->update($request->validated());
        return redirect()->route('home.service')->with('message' , 'The Service Updated Successfully');

    }
    public function destroy($id){
        Service::findOrFail($id)->delete();
        return redirect()->back()->with('message' , 'The Service Deleted Successfully');

    }
}
