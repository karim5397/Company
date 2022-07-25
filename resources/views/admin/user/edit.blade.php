@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
{{--  --}}
        <h1>{{__('Update User')}}</h1>

        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-6">
                    <label  class="form-label">Name </label>
                    <input type="text" class="form-control"  name="name" value="{{$user->name}}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control"  name="email" value="{{$user->email}}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">{{__('Password')}}</label>
                    <input type="password" class="form-control"  name="password"  placeholder="{{__('password ')}}">
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">{{__('password confirmation')}}</label>
                    <input type="password" class="form-control form-control-solid" placeholder="{{__('password confirmation')}}"  name="password_confirmation" id="password-fields" />

                </div>
                <div class="mb-3 col-6" >
                    <label class="form-label">User Image</label>
                    <input class="form-control" type="file" name="image" value="{{$user->image}}">
                    <input type="hidden" name="old_image" value="{{$user->image}}">
                </div>
            </div>

            <input type="submit" value="Update" class="btn btn-primary">
        </form>

    </div>


</div>

   <!-- start page title -->

<!-- end page title -->
@endsection
