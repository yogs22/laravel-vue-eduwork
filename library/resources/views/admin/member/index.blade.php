@extends('layouts.admin')
@section('header', 'Member')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>MEMBER</h1>
                    </div>
                </div>
            </div>
        </section>

        <div id="controller">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <a href="#"  @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Member</a>
                                </div>
                                <div class="col-md-2">
                                    <select name="sex" class="form-control">
                                        <option value="0">All Gender</option>
                                        <option value="L">Male</option>
                                        <option value="P">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr class="bg-indigo">
                                        <th style="width: 10px">No</th>
                                        <th style="width: 300px" class="text-center">Name</th>
                                        <th  class="text-center">Gender</th>
                                        <th  class="text-center">Phone Number</th>
                                        <th style="width: 250px" class="text-center">Address</th>
                                        <th  class="text-center">Email</th>
                                        <th style="width: 200px" class="text-center">Created_at</th>
                                        <th style="width: 200px" class="text-center">Update_at</th>
                                        <th style="width: 250px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Member</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            @csrf
                                            <input type="hidden" name="_method" value="PUT"  v-if="editStatus">

                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control">
                                                    <option value="">Pilih Gender</option>
                                                    <option value="L" :selected="data.gender == 'Laki-laki' ? true : false">Laki-Laki</option>
                                                    <option value="P" :selected="data.gender == 'Perempuan' ? true : false">Perempuan</option>
                                                    
                                                </select>
                                                <!-- <input type="text" name="gender" class="form-control" placeholder="LP" :value="data.gender" required=""> -->
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" :value="data.phone_number" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required="">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
    var actionUrl = '{{ route('member.index') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},
        {data: 'name', class: 'text-left', orderable: false},
        {data: 'gender', class: 'text-left', orderable: true},
        {data: 'phone_number', class: 'text-center', orderable: false},
        {data: 'address', class: 'text-left', orderable: false},
        {data: 'email', class: 'text-left', orderable: false},
        {data: 'created_at', class: 'text-center', orderable: false},
        {data: 'updated_at', class: 'text-center', orderable: false},
        {render: function(index, row, data, meta) {
            return `
                <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                    Edit
                </a>
                <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id} )">
                    Delete
                </a>`;
            }, orderable: false, width: '200px', class: 'text-center'},
        ];

</script>

<script src="{{ asset('js/data.js') }}"></script>
<script type="text/javascript">
    $('select[name=sex]').on('change', function() {
        sex = $('select[name=sex]').val();

        if (sex == 0) {
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+ '?gender='+sex).load();
        }
    });
</script>


@endsection