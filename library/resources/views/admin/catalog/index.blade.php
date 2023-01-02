@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>CATALOG</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="card">
						<div class="card-header">
							<a href="{{route('catalog.create')}}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
						</div>
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="width: 10px">No</th>
										<th style="width: 300px" class="text-center">Name</th>
										<th  class="text-center">Total Books</th>
										<th  class="text-center">Created_at</th>
										<th  class="text-center">Update_at</th>
										<th style="width: 200px" class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($catalogs as $keys => $catalog)
									<tr>
										<td>{{ $keys+1 }}</td>
										<td>{{$catalog->name}}</td>
										<td class="text-center">{{count($catalog->books)}}</td>
										<td class="text-center">{{date('H:i:s - d M Y', strtotime($catalog->created_at))}}</td>
										<td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->updated_at))}}</td>
										<td class="text-right">
											<a href="{{ route('catalog.edit', $catalog->id) }}" class="btn btn-warning btn-sm">Edit</a>
										
											<form action="{{ route('catalog.destroy', $catalog->id) }}" method="post">
												<input class="btn btn-danger btn-sm" type="submit" value="Delete" 
												onclick="return confirm('Are You Sure.?')">
												@method('delete')
												@csrf
											</form>											
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                       </div>
					</div>
				</div
			</div>
		</section>
	</div>
@endsection
