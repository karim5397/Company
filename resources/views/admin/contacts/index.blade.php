@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <a href="{{route('contact.create')}}" class="btn btn-primary"> Add Contact</a>
                </div>
                <br>
                <div class="card">

                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('message')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>

                    @endif
                        <div class="card-header">All Contacts</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($contacts as $contact)

                                <tr>
                                   <th scope="row">{{$i++}} )</th>
                                   {{-- <th scope="row">{{$contacts->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}
                                    <td>{{ $contact->phone}}</td>
                                    <td>{{ $contact->email}}</td>
                                    <td>{{ $contact->address}}</td>
                                    <td>
                                        <a href="{{url('contact/edit',$contact->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('contact/delete',$contact->id)}}" onclick="return confirm('are you sure you want to delete it')" class="btn btn-danger">Delete</a>
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
