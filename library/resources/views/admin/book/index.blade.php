@extends('layouts.admin')
@section('header', 'Book')

@section('content')
  <div id="controller">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" autocomplete="off" placeholder="Search from title" v-model="search">
        </div>
      </div>
      <div class="col-md-2">
        <button @click="addData()" class="btn btn-primary">Create New Book</button>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filtering">
        <div class="info-box" v-on:click="editData(book)">
          <div class="info-box-content">
            <span class="info-box-text h3">@{{ book.title }} (@{{ book.qty }})</span>
            <span class="info-box-number">@{{ numbering(book.price) }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" v-if="!editStatus">Create New Book</h4>
            <h4 class="modal-title" v-if="editStatus">Edit Book</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form :action="actionUrl" method="POST" @submit="submitForm($event, book.id)">
            @csrf
            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
            <div class="modal-body">  
              <div class="form-group">
                <label>ISBN</label>
                <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" :value="book.isbn" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Name" :value="book.title" required>
              </div>
              <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="year" class="form-control" placeholder="Enter Year" :value="book.year" required>
              </div>
              <div class="form-group">
                <label>Publisher</label>
                <select name="publisher_id" class="form-control">
                  @foreach ($publishers as $publisher)
                    <option :selected="book.publisher_id == {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Author</label>
                <select name="author_id" class="form-control">
                  @foreach ($authors as $author)
                    <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Catalog</label>
                <select name="catalog_id" class="form-control">
                  @foreach ($catalogs as $catalog)
                    <option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input type="number" name="qty" class="form-control" placeholder="Enter Stock" :value="book.qty" required>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Price" :value="book.price" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
    var actionUrl = '{{ url('books') }}';
    var apiUrl = '{{ url('api/books') }}';

    var app = new Vue({
      el: '#controller',
      data: {
        books: [],
        book: {},
        search: '',
        actionUrl,
        apiUrl,
        editStatus: false
      },
      mounted: function(){
        this.getBooks();
      },
      methods: {
        getBooks(){
          const _this = this;
          _this.data = $.ajax({
            url: apiUrl,
            method: 'GET',
            success: function(data){
              _this.books = JSON.parse(data);
            },
            error: function(error){
              console.log(error);
            }
          });
        },
        numbering(x){
          return 'Rp. ' + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        addData(){
          this.book = {};
          this.editStatus = false;
          $('#modal-default').modal();
        },
        editData(book){
          this.book = book;
          this.editStatus = true;
          $('#modal-default').modal();
        },
        deleteData(id){
          if(confirm("Are you sure?")){
            axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
              alert('Data has been removed');
            });

            $('#modal-default').modal('hide');
            this.getBooks();
          }
        },
        submitForm(event, id){
          event.preventDefault();
          const _this = this;
          var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
          axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
            $('#modal-default').modal('hide');
            this.getBooks();
          });
        }
      },
      computed: {
        filtering(){
          return this.books.filter(book => {
            return book.title.toLowerCase().includes(this.search.toLowerCase())
          })
        }
      }
    });
  </script>
@endsection