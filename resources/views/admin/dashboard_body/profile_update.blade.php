@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update User Profile</h2>
        </div>
        <div class="card-body">
            @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>

                    @endif
            <form class="form-pill" action="{{route('update.profile')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label >User Name</label>
                    <input type="text"   name="name" class="form-control" value="{{$user->name}}">

                </div>
                <div class="form-group">
                    <label >User Email</label>
                    <input type="email"  name="email" class="form-control" value="{{$user->email}}">

                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
