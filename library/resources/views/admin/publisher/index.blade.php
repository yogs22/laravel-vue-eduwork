@extends('layouts.admin')
@section('header', 'Publisher')

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
      <h3 class="card-title">Data Publisher</h3>
      <a @click="addData()" class="btn btn-sm btn-primary float-right">Create New Publisher</a>
    </div>
    <div class="card-body">
      <table class="table" id="datatable">
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
              <a @click="editData({{ $publisher }})" class="btn btn-sm btn-warning">Edit</a>
              <a @click="deleteData({{ $publisher->id }})" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create New Author</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form :action="actionUrl" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
            <div class="modal-body">  
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required>
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
  <script>
    $(function () {
      $("#datatable").DataTable();
    });
  </script>
  {{-- function vue --}}
  <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data: {
        data: {},
        actionUrl: '{{  url('publishers') }}',
        editStatus: false
      },
      mounted: function(){},
      methods: {
        addData(){
          this.data = {};
          this.actionUrl = '{{ url('publishers') }}';
          this.editStatus = false;
          $('#modal-default').modal();
        },
        editData(data){
          this.data = data;
          this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
          this.editStatus = true;
          $('#modal-default').modal();
        },
        deleteData(id){
          this.actionUrl = '{{ url('publishers') }}'+'/'+id;

          if(confirm("Are you sure?")){
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
            });
          }
        }
      }
    });
  </script>
@endsection