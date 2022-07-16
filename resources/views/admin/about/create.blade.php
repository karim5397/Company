@extends('admin.admin_master')
  @section('admin')




  <h1>Add About</h1>

  <form action="{{route('about.store')}}" method="POST" >
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label" for="title">Title</label>
        <input type="text" id="title" class="form-control" placeholder="Write Title" name="title" required>

     
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" rows="3" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">long Description</label>
        <textarea class="form-control" rows="3" name="long_desc" required></textarea>
      </div>

      <input type="submit" value="Create" class="btn btn-primary">
</form>



@endsection
