@extends('admin.admin_master')
  @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">All Images</div>
                        <div class="card-group">
                            @foreach ($images as $image )
                            <div class="col-md-4 ">
                                <div class="card m-4">
                                    <img src="{{asset($image->image)}}" alt="">
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Images</div>
                        <div class="card-body">
                            <form action="{{route('store.image')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label"> Brand Image</label>
                                        <input type="file" class="form-control" name='image[]' multiple>
                                      </div>
                                      @error('image')
                                      <div class="text-danger">{{$message}}</div>
                                      @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add Image</button>
                              </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
