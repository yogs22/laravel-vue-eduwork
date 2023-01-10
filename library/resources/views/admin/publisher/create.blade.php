@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Publisher</h3>
        </div>
        <form action="{{ url('publishers') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
              <label>No. HP</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Enter HP" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection