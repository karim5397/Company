@extends('admin.admin_master')
  @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">

                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                                <div class="card">
                                    <div class="card-header">Edit Brand</div>
                                    <div class="card-body">
                                        <form action="{{route('update.brand',$brands->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label"> Brand Name</label>
                                                    <input type="text" class="form-control" name='brand_name' value="{{$brands->brand_name}}">
                                                    </div>
                                                    @error('brand_name')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label"> Brand Image</label>
                                                    <input type="file" class="form-control" name='brand_image' value="{{$brands->brand_image}}">
                                                    </div>
                                                    @error('brand_image')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                            </div>
                                            <div>
                                                <img src="{{asset($brands->brand_image)}}" style="height: 400px; width:500px;">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update brand</button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
