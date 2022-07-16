@extends('admin.admin_master')
  @section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div>
                        <a href="{{route('create.slider')}}" class="btn btn-primary"> Add Slider</a>
                    </div>
                    <br>
                    <div class="card">

                        @if (session('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('message')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>

                        @endif
                            <div class="card-header">All sliders</div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($sliders as $slider)

                                    <tr>
                                       <th scope="row">{{$i++}} )</th>
                                       {{-- <th scope="row">{{$sliders->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}
                                        <td>{{ $slider->title}}</td>
                                        <td>{{ $slider->description}}</td>
                                        <td><img src="{{asset($slider->image)}}" style="height: 40px; width:70px;" alt=""></td>
                                        <td>
                                            <a href="{{url('slider/edit',$slider->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('slider/delete',$slider->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

