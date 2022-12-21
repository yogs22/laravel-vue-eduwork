@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>AUTHOR</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 300px" class="text-center">Name</th>
                                        <th  class="text-center">Email</th>
                                        <th  class="text-center">Phone Number</th>
                                        <th  class="text-center">Address</th>
                                        <th  class="text-center">Created_at</th>
                                        <th  class="text-center">Update_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $key => $author)
                                    <tr>
                                        <td>{{$authors->firstItem() + $key}}</td>
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->phone_number}}</td>
                                        <td>{{$author->address}}</td>
                                        <td class="text-center">{{date('H:i:s - d M Y', strtotime($author->created_at))}}</td>
                                        <td class="text-center">{{ date('H:i:s - d M Y', strtotime($author->updated_at))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm m-0 float-left">
                                Showing
                                {{ $authors->firstItem() }}
                                to
                                {{ $authors->lastItem() }}
                                of
                                {{ $authors->total() }}
                                Entries
                            </div>
                            <div class="pagination pagination-sm m-0 float-right">
                            {{ $authors->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection