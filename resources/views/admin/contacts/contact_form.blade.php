@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col">

                <a href="{{route('admin.export')}}" class="btn btn-success mb-3" style="width: fit-content">Export</a>
                <div class="card">
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>

                    @endif
                        <div class="card-header">All Forms</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($msgs as $msg)

                                <tr>
                                   <th scope="row">{{$i++}} )</th>
                                   {{-- <th scope="row">{{$msgs->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}
                                    <td>{{ $msg->name}}</td>
                                    <td>{{ $msg->email}}</td>
                                    <td>{{ $msg->subject}}</td>
                                    <td>{{ $msg->message}}</td>
                                    <td>
                                        <a href="{{url('msg/delete',$msg->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
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
