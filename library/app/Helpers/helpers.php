<?php
use App\Models\Book;

    function convert_date($value) {
        return date('d F Y', strtotime($value));
    }

    // * | CODE HELPER UNTUK NOTIFICATION 
    // * | Dan untuk memanggil Helper Notification Tersebut, kita menggunakan foreach pada HTML, 
        // ? |  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        // ? |     <span class="dropdown-item dropdown-header">
        // ? |        @foreach (get_notifications() as $book) 
        // ? |           <p> {{ $book->title }} </p>
        // ? |        @endforeach
        // ? |      </span>
        // ? |  <div class="dropdown-divider">

    function get_notifications() {
        return Book::all();
    }

    function convert_rupiah($value) {
        return 'Rp. ' . number_format($value);
    } 
?>