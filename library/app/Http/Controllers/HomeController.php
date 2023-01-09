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
use Illuminate\Support\Facades\DB;

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
        // $data = User::with('member')->get();

        $data = Member::select('*')
                    ->join('users', 'users.member_id', '=', 'members.id')
                    ->get();

        $data2 = Member::select('*')
                    ->leftJoin('users', 'users.member_id', '=', 'members.id')
                    ->where('users.id', NULL)
                    ->get();

        $data3 = Transaction::select('members.id', 'members.name')
                    ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                    ->where('transactions.member_id', NULL)
                    ->get();

        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->orderBy('members.id', 'asc')
                    ->get();

        $data5 = Transaction::select('members.id', 'members.name', 'members.phone_number')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->groupBy('members.id')
                    ->having(DB::raw('count(*)'), '>', 1)
                    ->get();

        $data6 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->orderBy('members.name', 'asc')
                    ->get();
            
        $data7 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->whereMonth('transactions.date_end', '=', '6')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();
            
        $data8 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->whereMonth('transactions.date_start', '=', '5')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        $data9 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->whereMonth('transactions.date_start', '=', '6')
                    ->whereMonth('transactions.date_end', '=', '6')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        $data10 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->where('members.address',"%Bandung%")
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        $data11 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->where('members.address',"%Bandung%")
                    ->where('members.gender','P')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        $data12 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books', 'books.id', '=', 'transaction_details.book_id')
                    ->where('transaction_details.qty', '>', 1)
                    ->orderBy('members.name')
                    ->get();

        $data13 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price', DB::raw('sum(transaction_details.qty * books.price) as total_price'))
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books','books.id', '=', 'transaction_details.book_id')
                    ->groupBy('members.name')
                    ->get();

        $data14 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price', 'authors.name', 'catalogs.name')
                    ->Join('members', 'members.id', '=', 'transactions.member_id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books','books.id', '=', 'transaction_details.book_id')
                    ->Join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                    ->Join('authors', 'authors.id', '=', 'books.author_id')
                    ->get();

        $data15 = Catalog::select('catalogs.*', 'books.title')
                    ->rightJoin('books', 'books.catalog_id', '=', 'catalogs.id')
                    ->get();

        $data16 = Book::select('books.*', 'publishers.name')
                    ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->get();

        $data17 = Book::select('authors.id', DB::raw('count(*) as total'))
                    ->join('authors', 'authors.id', '=', 'books.author_id')
                    ->where('books.author_id', 5)
                    ->get();

        $data18 = Book::select('title', 'price')
                    ->where('price', '>', '10000')
                    ->get();

        $data19 = Book::select('books.title', 'publishers.name', 'books.qty')
                    ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->where('publishers.name', 'like', '%Publisher 01%')
                    ->where('books.qty', '>', '10')
                    ->get();

        $data20 = Member::select('*')
                    ->whereMonth('members.created_at', '6')
                    ->get();

        return $data20;
        return view('home');
    }
}
