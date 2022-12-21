@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PUBLISHER</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('publisher.create')}}" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
                            </div>
                            
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 300px" class="text-center">Name</th>
                                            <th  class="text-center">Email</th>
                                            <th  class="text-center">Phone Number</th>
                                            <th  class="text-center">Address</th>
                                            <!-- <th  class="text-center">Total Books</th> -->
                                            <th  class="text-center">Created_at</th>
                                            <th  class="text-center">Update_at</th>
                                            <th style="width: 200px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($publishers as $key => $publisher)
                                        <tr>
                                            <td>{{$publishers->firstItem() + $key}}</td>
                                            <td>{{$publisher->name}}</td>
                                            <td>{{$publisher->name}}</td>
                                            <td>{{$publisher->phone_number}}</td>
                                            <td>{{$publisher->address}}</td>
                                            <!-- <td class="text-center">{{count($publisher->books)}}</td> -->
                                            <td class="text-center">{{date('H:i:s - d M Y', strtotime($publisher->created_at))}}</td>
                                            <td class="text-center">{{ date('H:i:s - d M Y', strtotime($publisher->updated_at))}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('publisher.edit', $publisher->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            
                                                <form action="{{ route('publisher.destroy', $publisher->id) }}" method="post">
                                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" 
                                                    onclick="return confirm('Are You Sure.?')">
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
                            <div class="card-footer clearfix">
                                <div class="pagination pagination-sm m-0 float-left">
                                    Showing
                                    {{ $publishers->firstItem() }}
                                    to
                                    {{ $publishers->lastItem() }}
                                    of
                                    {{ $publishers->total() }}
                                    Entries
                                </div>
                                <div class="pagination pagination-sm m-0 float-right">
                                    {{ $publishers->links() }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
            <!-- /.card -->
@endsection