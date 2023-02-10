@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
	<section class="header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12 text-center">
					<h1>Detail Transaction</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" style="margin-top: 20px" src="{{ asset('assets/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
							<h1 value="{{ $transaction->member->name }}">{{ $transaction->member->name }}</h1>
						</div>
						<div class="row">
							<div class="col-md-2" style="margin-left: 10px">
								<p>Status</p>
								<p>Tanggal Pinjam</p>
								<p>Tanggal Kembali</p>
							</div>
							<div class="col-md-7" style="margin-left: -40px">
								<p class="{{ ($transaction->status == 'Sudah dikembalikan') ? 'text-success' : 'text-danger' }}">: {{ $transaction->status }}</p>
								<p>: {{ convert_date($transaction->date_start) }}</p>
								<p>: {{ convert_date($transaction->date_end) }}</p>
							</div>
							<div class="col-md-1" style="margin-left: 40px">
								<p>Total Book</p>
								<p>Lama Pinjam</p>
							</div>
							<div class="col-md-1">
								<p>: {{ $transaction->transaction_details->count('book_id') }} Buku</p>
								<p>: {{ $transaction->long_transactions }}</p>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
									<h5 class="text-center">Detail Book</h5>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th class="text-center" style="width: 20px">NO</th>
											<th class="text-center" style="width: 200px">ISBN</th>
											<th class="text-center" style="width: 500px">TITLE</th>
											<th class="text-center" style="width: 250px">YEAR</th>
											<th class="text-center" style="width: 100px">QTY</th>
											<th class="text-center" style="width: 200px">PRICE</th>
										</tr>
									</thead>
									<tbody>
										@foreach($books as $book)
										<tr>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }} text-center" >{{ $loop->index +1}}</td>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }}">{{ $book->isbn }}</td>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }}">{{ $book->title }} </td></td>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }}">{{ $book->year }} </td></td>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }}">{{ $book->qty }} </td></td>
											<td class="{{ ($transaction->transaction_details->contains('book_id', $book->id)) ? 'bg-success' : 'bg-danger' }}">{{ $book->price }} </td></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	var actionUrl = '{{ route('transaction.index') }}';
	var apiUrl = '{{ route('api.transaction') }}';

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });


</script>


@endsection