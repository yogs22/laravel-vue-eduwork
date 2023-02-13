@extends('layouts.admin')
@section('header', 'Peminjaman')

@section('content')
<div class="row">
  <div class="col-md-12" style="align-items: center; justify-content: center; padding: 0% 20% 0% 20%">
    <div class="card">
      <div class="card-header">
        <a>Detail Peminjaman</a>
      </div>
      <div class="card-body">
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">Anggota</div>
            <div class="col-md-9">{{ $transaction->member->name }}</div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">Tanggal</div>
            <div class="col-md-9">{{ dateFormat($transaction->date_start).' - '.dateFormat($transaction->date_end) }}</div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">Buku</div>
            <div class="col-md-9">
              @foreach ($transaction->details as $detail)
                {{ $detail->book->title }}<br>
              @endforeach
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">Status</div>
            <div class="col-md-9">{{ $transaction->status }}</div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
              <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
              <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection