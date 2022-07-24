@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="{{route('update.password')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label >Current Password</label>
                    <input type="password"  id="current_password" name="oldpassword" class="form-control"  placeholder="Enter Old Password">
                    @error('oldpassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >New Password</label>
                    <input type="password" id="password" name="password" class="form-control"  placeholder="Enter New Password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  placeholder="Enter New Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
