@extends('layouts.admin')
@section('header', 'Peminjaman')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@role('admin')
@section('content')
  <div id="controller">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8">
            <a href="{{ route('transactions.create') }}" class="btn btn-sm btn-primary">Tambah Transaksi</a>
          </div>
          <div class="col-md-2">
            <select name="status" class="form-control">
              <option value="none">Semua Status</option>
              <option value="1">Dikembalikan</option>
              <option value="false">Belum</option>
            </select>
          </div>
          <div class="col-md-2">
            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th class="text-center">Tanggal Pinjam</th>
              <th class="text-center">Tanggal Kembali</th>
              <th class="text-center">Nama Peminjam</th>
              <th class="text-center">Lama Pinjam (hari)</th>
              <th class="text-center">Total Buku</th>
              <th class="text-center">Total Bayar</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@endrole

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
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';

    var columns = [
      {data: 'date_start', class: 'text-center', orderable: true},
      {data: 'date_end', class: 'text-center', orderable: true},
      {data: 'name', class: 'text-center', orderable: true},
      {data: 'time', class: 'text-center', orderable: true},
      {data: 'totalBook', class: 'text-center', orderable: true},
      {data: 'price', class: 'text-center', orderable: true},
      {data: 'status', class: 'text-center', orderable: true},
      {render: function(index, row, data, meta){
        return `
          <a class="btn btn-sm btn-secondary" onclick="controller.showData(${data.id})">Detail</a>
          <a class="btn btn-sm btn-warning" onclick="controller.editData(${data.id})">Edit</a>
          <a class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">Delete</a>
        `;
      }, class: 'text-center', width: '200px', orderable: false}
    ];

    var controller = new Vue({
    el: '#controller',
    data: {
      datas: [],
      data: {},
      actionUrl,
      apiUrl,
      editStatus: false
    },
    mounted: function(){
      this.datatable();
    },
    methods:{
      datatable(){
        const _this = this;
        _this.table = $('#datatable').DataTable({
          ajax: {
            url: _this.apiUrl,
            type: 'GET',
          },
          columns
        }).on('xhr', function(){
          _this.datas = _this.table.ajax.json().data;
        });
      },
      showData(id){
        window.location.href = this.actionUrl+'/'+id
      },
      editData(id){
        window.location.href = this.actionUrl+'/'+id+'/edit'
      },
      deleteData(event, id){
        if(confirm("Are you sure?")){
          $(event.target).parents('tr').remove();
          axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
            alert('Data has been removed');
          });
          this.table.ajax.reload();
        }
      },
      submitForm(event, id){
        event.preventDefault();
        const _this = this;
        var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
        axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
          $('#modal-default').modal('hide');
          _this.table.ajax.reload();
        });
      }
    }
  });
  </script>
  <script type="text/javascript">
    var status = 'none';
    var date = null;
    $('select[name=status]').on('change', function() {
      status = $('select[name=status]').val();

      if(status == 'none' && date == null){
        controller.table.ajax.url(apiUrl).load();
      }else if (date == null){
        controller.table.ajax.url(apiUrl+'?status='+status).load();
      }else{
        controller.table.ajax.url(apiUrl+'?status='+status+'&date='+date).load();
      }
    });
    
    $('input[name=date]').on('change', function(){
      date = $('input[name=date]').val();

      if(date == null && status == 'none'){
        controller.table.ajax.url(apiUrl).load();
      }else if (status == 'none'){
        controller.table.ajax.url(apiUrl+'?date='+date).load();
      }else{
        controller.table.ajax.url(apiUrl+'?status='+status+'&date='+date).load();
      }
    });
  </script>
@endsection