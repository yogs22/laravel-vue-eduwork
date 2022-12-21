@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>PUBLISHER</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
		  	<div class="row">
		    	<div class="col-md-6">
			      	<div class="card card-primary">
			        	<div class="card-header">
			          	<h3 class="card-title">Edit Publishers</h3>
			        	</div>
			        	
			        	<form action="{{ route('publisher.update', $publisher->id) }}" method="post">
			        		@csrf
			        		{{method_field('PUT') }}
				          	<div class="card-body">
				            	<div class="form-group">
				              		<label>Name</label>
				              		<input type="text" name="name" class="form-control" placeholder="Enter name" required="" value="{{$publisher->name}}">
				            	</div>
				          	</div>
				          	<div class="card-body">
					            <div class="form-group">
					                <label>Email</label>
					                <input type="email" name="email" class="form-control"  placeholder="Enter email" required="" value="{{$publisher->email}}">
					            </div>
					        </div>
					        <div class="card-body">
					            <div class="form-group">
					                <label>Phone Number</label>
					                <input type="tel" name="phone_number"class="form-control"  placeholder="Phone Number" required="" value="{{$publisher->phone_number}}">
					            </div>
					        </div>
					        <div class="card-body">
					            <div class="form-group">
					                <label>Address</label>
					                <input type="text" name="address" class="form-control"  placeholder="Enter email" required="" value="{{$publisher->address}}">
					            </div>
					        </div>
				          	<div class="card-footer">
				            	<button type="submit" class="btn btn-primary">Submit</button>
				          	</div>
			        	</form>

			      	</div>
		    	</div>
		  	</div>
		</div>
	</section>
</div>

@endsection
