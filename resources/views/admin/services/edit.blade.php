@extends('admin.admin_master')
  @section('admin')




  <h1>Update Service</h1>

  <form action="{{route('service.update' , $services->id)}}" method="POST" >
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label">Title</label>
        <input type="text" class="form-control" placeholder="Write Title" name="title" value="{{$services->title}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Sub Description</label>
        <textarea class="form-control" rows="3" name="sub_description" >{{$services->sub_description}}</textarea>
    </div>

      <div class="mb-3">
        <label class="form-label">Icon name</label>
        <input type="text" name="icon_name" value="{{$services->icon_name}}" class="form-control" placeholder="Select icon" data-fa-browser />
    </div>
      <input type="submit" value="Update" class="btn btn-primary">
</form>



@endsection
