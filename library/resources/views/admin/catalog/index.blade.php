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
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Simple Tables</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Catalog Table</h3>
							</div>

							<div class="card-body">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th style="width: 300px" class="text-center">Name</th>
											<th style="width: 200px" class="text-center">Total Books</th>
											<th style="width: 200px" class="text-center">Created_at</th>
											<th style="width: 200px" class="text-center">Update_at</th>
										</tr>
									</thead>
									<tbody>
										@foreach($catalogs as $catalog)
										<tr>
											<td>{{$catalog->id}}</td>
											<td>{{$catalog->name}}</td>
											<td class="text-center">{{count($catalog->books)}}</td>
											<td class="text-center">{{date('H:i:s - d M Y', strtotime($catalog->created_at))}}</td>
											<td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->updated_at))}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination-sm m-0 float-right">
									<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div
				</div>
			</div>
		</section>
@endsection
