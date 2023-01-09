<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
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
        // $data = Author::with('books')->get();
        // $data = Book::with('author')->with('catalog')->with('publisher')->get();
        // $data = Catalog::with('books')->get();
        // $data = Member::with('user')->get();
        // $data = Publisher::with('books')->get();
        // $data = Transaction::with('member')->with('details')->get();
        // $data = TransactionDetail::with('transaction')->with('book')->get();
        $data = User::with('member')->get();

        return $data;
        return view('home');
    }
}
