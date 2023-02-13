@extends('layouts.admin')
@section('header', 'Member')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-10">
          <a @click="addData()" class="btn btn-sm btn-primary">Create New Member</a>
        </div>
        <div class="col-md-2">
          <select name="sex" class="form-control">
            <option value="0">Semua Jenis Kelamin</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table" id="datatable">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Address</th>
            <th class="text-center">Created At</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" v-if="!editStatus">Create New Member</h4>
          <h4 class="modal-title" v-if="editStatus">Edit Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form :action="actionUrl" method="POST" @submit="submitForm($event, data.id)">
          @csrf
          <input type="hidden" name="_method" value="PUT" v-if="editStatus">
          <div class="modal-body">  
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="gender" class="form-control">
                <option value="L" :selected="data.gender == 'L' ? true : false">Laki-Laki</option>
                <option value="P" :selected="data.gender == 'P' ? true : false">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No. HP</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Enter HP" :value="data.phone_number" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
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
    var actionUrl = '{{ url('members') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
      {data: 'DT_RowIndex', class: 'text-center', orderable: true},
      {data: 'name', class: 'text-center', orderable: true},
      {data: 'gender', class: 'text-center', orderable: true},
      {data: 'email', class: 'text-center', orderable: true},
      {data: 'phone_number', class: 'text-center', orderable: false},
      {data: 'address', class: 'text-center', orderable: false},
      {data: 'date', class: 'text-center', orderable: true},
      {render: function(index, row, data, meta){
        return `
          <a class="btn btn-sm btn-warning" onclick="controller.editData(event, ${meta.row})">Edit</a>
          <a class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">Delete</a>
        `;
      }, class: 'text-center', width: '200px', orderable: false}
    ];
  </script>
  <script type="text/javascript" src="{{ asset('crud.js') }}"></script>
  <script type="text/javascript">
    $('select[name=sex]').on('change', function() {
      sex = $('select[name=sex]').val();

      if(sex == 0){
        controller.table.ajax.url(apiUrl).load();
      }else{
        controller.table.ajax.url(apiUrl+'?sex='+sex).load();
      }
    })
  </script>
  {{-- <script>
    $(function () {
      $("#datatable").DataTable();
    });
  </script> --}}
  {{-- function vue --}}
  {{-- <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data: {
        data: {},
        actionUrl: '{{ url('authors') }}',
        editStatus: false
      },
      mounted: function(){},
      methods: {
        addData(){
          this.data = {};
          this.actionUrl = '{{ url('authors') }}';
          this.editStatus = false;
          $('#modal-default').modal();
        },
        editData(data){
          this.data = data;
          this.actionUrl = '{{ url('authors') }}'+'/'+data.id;
          this.editStatus = true;
          $('#modal-default').modal();
        },
        deleteData(id){
          this.actionUrl = '{{ url('authors') }}'+'/'+id;

          if(confirm("Are you sure?")){
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
            });
          }
        }
      }
    });
  </script> --}}
@endsection