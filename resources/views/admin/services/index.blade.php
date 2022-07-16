@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <a href="{{route('service.create')}}" class="btn btn-primary"> Add Service</a>
                </div>
                <br>
                <div class="card">

                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>

                    @endif
                        <div class="card-header">All Services</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Sub Description</th>
                                <th scope="col">Icon Name</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($services as $service)

                                <tr>
                                   <th scope="row">{{$i++}} )</th>
                                   {{-- <th scope="row">{{$services->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}
                                    <td>{{ $service->title}}</td>
                                    <td>{{ $service->sub_description}}</td>
                                    <td>{{ $service->icon_name}}</td>
                                    <td>
                                        <a href="{{url('/service/edit',$service->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('/service/delete',$service->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
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
