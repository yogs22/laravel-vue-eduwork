@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Publisher</h3>
        </div>
        <form action="{{ url('publishers/'.$publisher->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $publisher->name }}" required>
              </div>
              <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Enter HP" value="{{ $publisher->phone_number }}" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $publisher->address }}" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $publisher->email }}" required>
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