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
                <div class="col">
                    <div class="card">

                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('message')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                                <div class="card">
                                    <div class="card-header">Edit Category</div>
                                    <div class="card-body">
                                        <form action="{{route('update.category',$categories->id)}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"> Category Name</label>
                                            <input type="text" class="form-control" name='category_name' value="{{$categories->category_name}}">
                                            </div>
                                            @error('category_name')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
