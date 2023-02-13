@extends('layouts.admin')
@section('header', 'Peminjaman')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12" style="align-items: center; justify-content: center; padding: 0% 20% 0% 20%">
    <div class="card">
      <div class="card-header">
        <a>Detail Peminjaman</a>
      </div>
      <div class="card-body">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
          @csrf
          @method('patch')
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
              <div class="col-md-9">
                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary" name="status" value="1" {{ $transaction->status == 'Sudah dikembalikan' ? 'checked' : '' }}>
                    <label for="radioPrimary">Dikembalikan</label>
                  </div>
                </div>
                <div class="form-group clearfix">
                  <div class="icheck-danger d-inline">
                    <input type="radio" id="radioDanger" name="status" value="0" {{ $transaction->status == 'Belum dikembalikan' ? 'checked' : '' }}>
                    <label for="radioDanger">Belum Dikembalikan</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-md-3">
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection