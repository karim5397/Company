@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">

        <h1>{{__('Add User')}}</h1>

        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="mb-3 col-6">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Write Name" name="name">
                    @error('name')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Write Your Email" name="email">
                    @error('email')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Write Your Password" name="password">
                    @error('password')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Write Your Password" name="password_confirmation">
                    @error('password')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">User Image</label>
                    <input class="form-control" type="file" name="image">
                    @error('image')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <input type="submit" value="Create" class="btn btn-primary">

        </form>

    </div>


</div>

@endsection
