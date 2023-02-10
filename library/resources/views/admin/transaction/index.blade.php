@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>TRANSACTION</h1>
                    </div>
                </div>
            </div>
        </section>

        <div id="controller">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <form method="get">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('transaction.create') }}" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="member_name" placeholder="masukan nama member" class="form-control" value="{{ request('member_name') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status" class="form-control">
                                            <option value="0">Filter Status</option>
                                            <option value="2" {{ request('status') == 2 ? 'selected' : null}}>Belum Dikembali</option>
                                            <option value="1" {{ request('status') == 1 ? 'selected' : null}}>Sudah Dikembali</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" name="date_start" class="form-control" placeholder="Masukkan tanggal Pinjam" value="{{ request('date_start') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a href="{{ route('transaction.index') }}" class="btn btn-danger">clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="card-body">

                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr class="bg-indigo">
                                        <th style="width: 10px">No</th>
                                        <th  class="text-center">Tanggal Pinjam</th>
                                        <th  class="text-center">Tanggal Kembali</th>
                                        <th  class="text-center">Nama Peminjam</th>
                                        <th  class="text-center">Lama Pinjam (Hari)</th>
                                        <th  class="text-center">Total Buku</th>
                                        <th  class="text-center">Total Bayar</th>
                                        <th  class="text-center">Status</th>
                                        <th  class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($transactions as $keys => $transaction)
									<tr>
										<td class="text-center">{{ $keys+1 }}</td>
										<td class="text-center">{{$transaction->date_start}}</td>
										<td class="text-center">{{ $transaction->date_end}}</td>
										<td class="text-left">{{ $transaction->member_name }}</td>
										<td class="text-center">{{ $transaction->long_transactions }}</td>
										<td class="text-center">{{ $transaction->total_books }}</td>
										<td class="text-center">{{ $transaction->total_price }}</td>
										<td class="text-center">{{ $transaction->status }}</td>
                                        
										<td class="text-right">
                                            <div class="row">
                                                <a href="{{ route('transaction.edit', $transaction->id) }}" style="margin-left: 10px" class="btn btn-warning btn-sm fas fa-edit col-md-3"></a>
                                                <a href="{{ route('transaction.show', $transaction->id) }}" style="margin-left: 10px" class="btn btn-primary btn-sm fa fa-eye col-md-3"></a>
                                                <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                                                    <input class="btn btn-danger btn-sm" style="margin-left: 10px" type="submit" value="Delete" 
                                                    onclick="return confirm('Are You Sure.?')">
                                                    @method('delete')
                                                    @csrf
											    </form>	
                                            </div>										
										</td>
									</tr>
									@endforeach
								</tbody>
                            </table>
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
