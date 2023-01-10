@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Publisher</h3>
      <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary float-right">Create New Publisher</a>
      {{-- <div class="card-tools">
        <ul class="pagination pagination-sm float-right">
          <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
      </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Address</th>
            <th class="text-center">Email</th>
            <th class="text-center">Created At</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($publishers as $key => $publisher)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $publisher->name }}</td>
            <td class="text-center">{{ $publisher->phone_number }}</td>
            <td class="text-center">{{ $publisher->address }}</td>
            <td class="text-center">{{ $publisher->email }}</td>
            <td class="text-center">{{ date('H:i:s - d M Y', strtotime($publisher->created_at)) }}</td>
            <td class="text-center">
              <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure?')">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection