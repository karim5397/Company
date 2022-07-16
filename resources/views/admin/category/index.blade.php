<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category <b>  </b>
            {{-- <b style="float: right;">
                <span style="background-color:blue; color:white; padding:5px;"> </span>
            </b> --}}
        </h2>
    </x-slot>

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
                            <div class="card-header">All Categories</div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($categories as $category)

                                    <tr>
                                       {{-- <th scope="row">{{$i++}} )</th> --}}
                                       <th scope="row">{{$categories->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  -->
                                        <td>{{ $category->id}}</td>
                                        <td>{{ $category->category_name}}</td>
                                        {{-- <td>{{ $category->user_id}}</td> --}}
                                        <td>{{ $category->user->name}}</td>
                                        {{-- <td>{{ $category->user}}</td>  <!-- if use 1 to 1 by quey builder--> --}}
                                        <td>
                                        @if ( $category->created_at == Null)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                           {{ $category->created_at->diffForHumans()}}
                                        </td>
                                        @endif

                                        <td>
                                            <a href="{{url('category/edit',$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('category/softdelete',$category->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label"> Category Name</label>
                                  <input type="text" class="form-control" name='category_name'>
                                </div>
                                @error('category_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <button type="submit" class="btn btn-primary">Add Category</button>
                              </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- tarsh part --}}
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">


                            <div class="card-header">Trashed List</div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Deleted At</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($trashcat as $category)

                                    <tr>
                                       {{-- <th scope="row">{{$i++}} )</th> --}}
                                       <th scope="row">{{$categories->firstItem()+$loop->index}} )</th> <!-- for contuin count when go to next page  -->
                                        <td>{{ $category->id}}</td>
                                        <td>{{ $category->category_name}}</td>
                                        {{-- <td>{{ $category->user_id}}</td> --}}
                                        <td>{{ $category->user->name}}</td>
                                        {{-- <td>{{ $category->user}}</td>  <!-- if use 1 to 1 by quey builder--> --}}
                                        <td>
                                        @if ( $category->deleted_at == Null)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                           {{ $category->deleted_at->diffForHumans()}}
                                        </td>
                                        @endif

                                        <td>
                                            <a href="{{url('/category/restore',$category->id)}}" class="btn btn-info">Restore</a>
                                            <a href="{{url('/category/forceDelete',$category->id)}}" class="btn btn-danger">P Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $trashcat->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
