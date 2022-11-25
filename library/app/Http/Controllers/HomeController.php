<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Member;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $members = Member::with('user')->get();
        // $books = Book::with('publisher')->get();
        // $books = Book::with('catalog')->get();
        // $books = Book::with('author')->get();
        // $publishers = Publisher::with('books')->get();
        // $catalogs = Catalog::with('books')->get();
        // $authors = Author::with('books')->get();

        // return $authors;
        // return $catalogs;
        // return $publishers;
        // return $books;
        // return $members;
        return view('home');
    }
}
