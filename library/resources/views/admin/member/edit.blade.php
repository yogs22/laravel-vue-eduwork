@extends('layouts.admin')
@section('header', 'Member')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit member</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('members/'.$member->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}

                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required="" value="{{ $member->name }}">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" placeholder="Enter Gender" required="" value="{{ $member->gender }}">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="08xxx" required="" value="{{ $member->phone_number }}">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address" required="" value="{{ $member->address }}">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" required="" value="{{ $member->email }}">
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
