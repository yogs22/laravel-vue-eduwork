@extends('layouts.admin')
@section('header', 'Author')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Author</h3>
      <a href="{{ url('authors/create') }}" class="btn btn-sm btn-primary float-right">Create New Author</a>
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
            <th class="text-center">Email</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Address</th>
            <th class="text-center">Created At</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($authors as $key => $author)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $author->name }}</td>
            <td class="text-center">{{ $author->email }}</td>
            <td class="text-center">{{ $author->phone_number }}</td>
            <td class="text-center">{{ $author->address }}</td>
            <td class="text-center">{{ date('H:i:s - d M Y', strtotime($author->created_at)) }}</td>
            <td class="text-center">
              {{-- <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ url('authors', ['id' => $author->id]) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure?')">
              </form> --}}
              //
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection