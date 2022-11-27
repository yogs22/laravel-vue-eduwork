@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

@endsection

@section('content')
<div class="row" id="controller">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                Create New publisher
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Total Books</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publishers as $key => $publisher)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->phone_number }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>{{ $publisher->email }}</td>
                        <td class="text-center">{{ count($publisher->books) }}</td>
                        <td class="text-center">{{ date('H:i:s, d M Y', strtotime($publisher->created_at)) }}</td>
                        <td class="" text-align="center">
                            <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-sm">Delete</a>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title">publisher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required="">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="08xxx" :value="data.phone_number" required="">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required="">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

@endsection

@section('js')
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl :'{{ url('publishers') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('publishers') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                    if (confirm("Are you sure?")){
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                            location.reload();
                        })
                    }
                }
            }
        });
    </script>
@endsection