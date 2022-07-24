@extends('admin.admin_master')
  @section('admin')




  <h1>Add Contact</h1>

  <form action="{{route('contact.store')}}" method="POST" >
    @csrf
    <div class="mb-3 my-5">
        <label  class="form-label" for="title">Phone</label>
        <input type="text" id="title" class="form-control" placeholder="Write Title" name="phone" required>


    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"  class="form-control" placeholder="Write Email" name="email" required>

    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" rows="3" name="address" required></textarea>
      </div>

      <input type="submit" value="Create" class="btn btn-primary">
</form>



@endsection
