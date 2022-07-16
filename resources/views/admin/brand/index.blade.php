@extends('admin.admin_master')
  @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <div class="card-header">All brands</div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($brands as $brand)

                                    <tr>
                                       {{-- <th scope="row">{{$i++}} )</th> --}}
                                       <th scope="row">{{$brands->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  -->
                                        <td>{{ $brand->brand_name}}</td>
                                        <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; width:70px;" alt=""></td>
                                        <td>
                                        @if ( $brand->created_at == Null)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                           {{ $brand->created_at->diffForHumans()}}
                                        </td>
                                        @endif

                                        <td>
                                            <a href="{{url('brand/edit',$brand->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('brand/delete',$brand->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links('pagination::bootstrap-4') }}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label"> Brand Name</label>
                                        <input type="text" class="form-control" name='brand_name'>
                                      </div>
                                      @error('brand_name')
                                      <div class="text-danger">{{$message}}</div>
                                      @enderror
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label"> Brand Image</label>
                                        <input type="file" class="form-control" name='brand_image'>
                                      </div>
                                      @error('brand_image')
                                      <div class="text-danger">{{$message}}</div>
                                      @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add Brand</button>
                              </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection

