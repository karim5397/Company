@extends('admin.admin_master')
  @section('admin')




  <h1>Update Contact</h1>

  <form action="{{route('contact.update' , $contact->id)}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="mb-3 my-5">
        <label  class="form-label">Phone</label>
        <input type="text" class="form-control" placeholder="Write Phone" name="phone" value="{{$contact->phone}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Write Email" name="email" value="{{$contact->email}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="long_desc"  class="form-control" rows="3"> {{$contact->address}}</textarea>
      </div>
      <input type="submit" value="Update" class="btn btn-primary">
</form>



@endsection
