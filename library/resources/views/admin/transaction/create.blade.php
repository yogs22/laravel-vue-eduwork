@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
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
							<h3 class="card-title">Create New Transaction</h3>
						</div>
						<form action="{{ route('transaction.store')}}" method="post">
							@csrf
							<div class="card-body">
								<div class="form-group row">
									<label class="col-md-3">Member</label>
									<select name="member_id" class="form-control col-md-9" require="">
										<option value=" ">-Select Member-</option>
										@foreach($members as $member)
										<option value="{{ $member->id }}" require="">{{ $member->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="row">
									<label class="col-md-3">Tanggal Pinjam</label>
									<input type="date" name="date_start" value="{{ date('Y-m-d') }}" class="form-control col-md-4" required="">
									<p class="col-md-5">Note :<span>Lama Pinjam Maksimal 7 (Tujuh) Hari</span></p>
									<input type="hidden" name="date_end" value="{{ date('Y-m-d', strtotime('+7 days')) }}" class="form-control col-md-8" required="">
								</div>
								<div class="form-group row">
									<label class="col-md-3">Buku</label>
									<div class="select2-primary col-md-9">
										<select name="book_id[]" class="select2 " multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
											@foreach($books as $book)
											<option value="{{ $book->id }}">{{ $book->title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3">Status</label>
									<input type="hidden" name="status" readonly value="0" class="form-control col-md-4" required="">
									<p>Belum Dikembalikan</p>
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