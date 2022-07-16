@extends('admin.admin_master')
  @section('admin')


    

  <h1>Add Slider</h1>

  <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label">Title</label>
        <input type="text" class="form-control" placeholder="Write Title" name="title">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Slider Image</label>
        <input class="form-control" type="file" name="image">
      </div>
      <input type="submit" value="Create" class="btn btn-primary">
</form>



@endsection
