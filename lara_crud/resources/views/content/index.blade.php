@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('content.create') }}" class="btn btn-primary">Bikin Status</a>
                    </div>
                    @foreach ($contents as $content)
                        <div class="mb-3">
                            <hr>
                            <small class="font-weight-bold">{{ $content->user->name }} - {{ $content->location }} - {{ $content->created_at }}</small>
                            <h5>{{ $content->body }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
