@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Create author</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('authors') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="08xxx" required="">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" required="">
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
