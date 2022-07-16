@extends('admin.admin_master')
  @section('admin')




  <h1>Add Service</h1>

  <form action="{{route('service.store')}}" method="POST" >
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label" for="title">Title</label>
        <input type="text" class="form-control" id='title' placeholder="Write Title" name="title" required>

    </div>
    <div class="mb-3">
        <label class="form-label">Sub Description</label>
        <textarea class="form-control" rows="3" name="sub_description" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Icon name</label>
        <input type="text" name="icon_name" class="form-control" placeholder="Select icon" data-fa-browser />
    </div>
      <input type="submit" value="Create" class="btn btn-primary">
</form>



@endsection
