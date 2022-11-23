@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('content.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="body">Isi Status</label>
                            <textarea type="text" id="body" class="form-control" name="body" required>{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Lokasi</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
