@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <a href="{{route('about.create')}}" class="btn btn-primary"> Add About</a>
                </div>
                <br>
                <div class="card">

                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>

                    @endif
                        <div class="card-header">All Abouts</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($abouts as $about)

                                <tr>
                                   <th scope="row">{{$i++}} )</th>
                                   {{-- <th scope="row">{{$abouts->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}
                                    <td>{{ $about->title}}</td>
                                    <td>{{ $about->description}}</td>
                                    <td>{{ $about->long_description}}</td>
                                    <td>
                                        <a href="{{url('/about/edit',$about->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('/about/delete',$about->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
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
