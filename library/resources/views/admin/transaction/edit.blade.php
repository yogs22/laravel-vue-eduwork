@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div id=""dataTable" class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaction</h1>
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
							<h3 class="card-title">Edit Transaction</h3>
						</div>

						<form action="{{ route('transaction.update', $transaction->id)}}" method="post">
							@csrf
							{{method_field('PUT') }}
							<div class="card-body">
								<div class="form-group row">
									<label class="col-md-3">Member</label>
									<select name="member_id" class="form-control col-md-9" require="">
										@foreach($members  as $member)
										<option value="{{ $member->id }}" {{ $transaction->member_id === $member->id ? 'selected' : null }}>{{ $member->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="row">
									<label class="col-md-3">Tanggal</label>
									<p class="col-md-4">Pinjam<span><input type="date" name="date_start" value="{{ $transaction->date_start }}" class="form-control" required=""></span></p>
									
									<p class="col-md-4">Kembali<span><input type="date" name="date_end" value="{{ $transaction->date_end }}" class="form-control" required=""></span></p>
									
								</div>
								<div class="form-group row">
									<label class="col-md-3">Buku</label>
									<div class="select2-primary col-md-9">
										<select name="book_id[]" class="select2 " multiple="multiple" data-placeholder="Select a State" style="width: 100%;">

											@foreach($books as $book)
											<option value="{{ $book->id }}" {{ $transaction->transaction_details->contains('book_id', $book->id) ? 'selected' : null }}>{{ $book->title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3">Status</label>
                                    <p class="col-md-4"><input type="radio" style="margin: 10px" name="status" value="0" {{ $transaction->status == 'Belum dikembalikan' ? 'checked' : '' }}>Belum Dikembalikan</p>
                                    <p class="col-md-4"><input type="radio" style="margin: 10px" name="status" value="1" {{ $transaction->status == 'Sudah dikembalikan' ? 'checked' : '' }}>Sudah Dikembalikan</p>
								</div>
									<div class="col-md-8">
										<button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button>
									</div>
								</div>
							</div>
						</form>	
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