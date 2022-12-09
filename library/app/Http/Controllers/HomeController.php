<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        //------------------------------------------------
        //  Script Eloquent Relationship Model dilaravel
        //------------------------------------------------
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
        
        //--------------------------------------------------------------
        //                Script Query Builder in Laravel
        //--------------------------------------------------------------
        // note : Need mentoring Script $data : '10', '13', '17', '19' 
        //--------------------------------------------------------------

        $data1 = member::select('*')
                    ->join('users','users.member_id','=','members.id')
                    ->where('users.member_id', '!=', NULL)
                    ->get();
          

        $data2 = Member::select('*')
                    ->leftjoin('users','users.member_id','=','members.id')
                    ->where('users.member_id', NULL)
                    ->get();

        $data3 = Transaction::select('members.id', 'members.name')
                    ->rightJoin('members', 'members.id','=','transactions.member_id')
                    ->where('transactions.member_id', NULL)
                    ->get();

        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                    ->join('transactions', 'transactions.member_id','=', 'members.id')
                    ->orderBy('members.id', 'asc')
                    ->get();


        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('transactions.id', '>', '1')
                    ->orderBy('members.id', 'asc')
                    ->get();

        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->orderBy('members.name', 'asc')
                    ->get();

        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->whereMonth('transactions.date_end', '=', '6')
                    ->orderBy('transactions.date_start', 'ASC')
                    ->get();

        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->whereMonth('transactions.date_start', '=', '5')
                    ->orderBy('transactions.date_start', 'ASC')
                    ->get();

        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->whereMonth('transactions.date_start','=', '6')
                    ->whereMonth ('transactions.date_end', '=', '6')
                    ->orderBy('transactions.date_start', 'ASC')
                    ->get();

        
         $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('members.address','Pohuwato')
                    ->orderBy('transactions.date_start', 'ASC')
                    ->get();
        
        

         $data11 = Member::select('members.name',  'members.gender', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('members.gender','L')
                    ->orderBy('transactions.date_start', 'ASC')
                    ->get();

        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books','books.id', '=', 'transaction_details.book_id')
                    ->where('transaction_details.qty','>', 13)
                    ->orderBy('members.name')->get();

         $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 
                    'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price',
                    DB::raw('round(transaction_details.qty * books.price) as total_price')
                    )
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books','books.id', '=', 'transaction_details.book_id')
                    //groupBy('members.name')
                    ->orderBy('total_price')
                    ->get();
        
        

        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price', 'authors.name', 'catalogs.name')
                    ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->Join('books','books.id', '=', 'transaction_details.book_id')
                    ->Join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                    ->Join('authors', 'authors.id', '=', 'books.author_id')
                    ->orderBy('members.name')          
                    ->get();

        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')
                    ->Join('books', 'books.catalog_id', '=', 'catalogs.id')
                    ->orderBy('catalogs.id')
                    ->get();

        $data16 = Book::select('*', 'publishers.name')
                    ->Join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->get();

        $data17 = Book::select('books.author_id', DB::raw('count(books.id) as total_book'))
                  ->where('books.author_id', 3)
                  ->groupBy('books.author_id')
                  ->get();
        
        

        $data18 = Book::select('*')
                    ->where('books.price', '>', '15000')
                    ->get();

        $data19 = Book::select('*')
                    ->Join('publishers', 'publishers.id', '=', 'books.publisher_id')
                    ->where('publishers.email', 'like', '%@gmail.com%') // script nggak kebaca // */
                    ->where('books.qty', '>', '10')
                    ->get();

        $data20 = Member::select('*')
                    ->whereDay('members.created_at', '=', '25')
                    ->orderBy('members.name')
                    ->get();


        
        return $data1; 
        return view('home');
         
    }
}