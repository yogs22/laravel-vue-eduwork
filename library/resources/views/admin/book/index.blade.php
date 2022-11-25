@extends('layouts.admin')
@section('header', 'Book')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
        <a href="{{ url('books/create') }}" class="btn btn-sm btn-primary pull-right">Create New Book</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">No</th>
                    <th class="text-center">ISBN</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Publisher ID</th>
                    <th class="text-center">Author ID</th>
                    <th class="text-center">Catalog ID</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $key => $book)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->publisher_id }}</td>
                        <td>{{ $book->author_id }}</td>
                        <td>{{ $book->catalog_id }}</td>
                        <td>{{ $book->qty }}</td>
                        <td>{{ $book->price }}</td>
                        <td class="text-center">{{ date('H:i:s, d M Y', strtotime($book->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ url('books', ['id' => $book->id]) }}" method="POST">
                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('are you sure?')">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div> -->
    </div>
</div>
@endsection