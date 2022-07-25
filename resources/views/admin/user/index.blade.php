@extends('admin.admin_master')
@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-3">
                    <div class="row mx-1">
                        <a href="{{route('users.create')}}" class="btn btn-primary" style="width: fit-content">Add User</a>

                </div>
                </div>
                <br>
                <div class="card">

                    @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0;">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                      @endif

                        <div class="card-header" style="background-color: #2b3d51; color:#fff;">All Users</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>


                            </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($users as $user)

                                <tr>
                                   <th scope="row">{{$i++}} )</th>
                                   {{-- <th scope="row">{{$users->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  --> --}}


                                   <td>{{ $user->name}}</td>
                                   <td>{{ $user->email}}</td>
                                    <td><img src="{{asset($user->image)}}" style="height: 40px; width:70px;" alt=""></td>
                                    <td>
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">{{__('Edit')}}</a>
                                        <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="{{__('Delete')}}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete it')">
                                        </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin: 15px">{{ $users->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
