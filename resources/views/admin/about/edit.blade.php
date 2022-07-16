@extends('admin.admin_master')
  @section('admin')




  <h1>Update About</h1>

  <form action="{{route('about.update' , $abouts->id)}}" method="POST" >
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label">Title</label>
        <input type="text" class="form-control" placeholder="Write Title" name="title" value="{{$abouts->title}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description" >{{$abouts->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Long Description</label>
        <textarea name="long_desc"  class="form-control" rows="3"> {{$abouts->long_description}}</textarea>
      </div>
      <input type="submit" value="Update" class="btn btn-primary">
</form>



@endsection
