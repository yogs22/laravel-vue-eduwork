<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Member;
use App\Models\Book;
use App\Models\TransactionDetail;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $members = Member::all();
        $transactions = Transaction::select('transactions.id', 'date_start', 'date_end', 'members.name AS member_name', DB::raw('datediff(date_end, date_start) as long_transactions'), 
                                            DB::raw('count(transaction_details.book_id) as total_books'), DB::raw('SUM(books.price) as total_price'), 'status')
                                            ->when(request('status'), function($query) {
                                                return $query->where('status', request('status'));
                                            })
                                            ->when(request('date_start'), function($query) {
                                                return $query->whereDate('date_start', request('date_start'));
                                            })
                                            ->when(request('member_name'), function($query) {
                                                return $query->whereHas('member', function(Builder $query) {
                                                    $query->where('name', 'like', '%'.request('member_name').'%');
                                                });
                                            })
                                        ->Join('members', 'members.id', '=', 'transactions.member_id')
                                        ->rightJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                                        ->Join('books', 'books.id', '=', 'transaction_details.book_id')
                                        ->groupBy('date_start', 'date_end', 'member_name', 'status', 'transactions.id')
                                        ->orderBy('date_start', 'asc')->paginate(5);

                                            

        // return $members;
        return view('admin.transaction.index', compact('books', 'members', 'transactions'));
    }

    public function api() 
    {
        $transactions = Transaction::select('transactions.id', 'date_start', 'date_end', 'members.name AS member_name', DB::raw('datediff(date_end, date_start) as long_transactions'), 
                                            DB::raw('count(transaction_details.book_id) as total_books'), DB::raw('SUM(books.price) as total_price'), 'status')
                                        ->Join('members', 'members.id', '=', 'transactions.member_id')
                                        ->rightJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                                        ->Join('books', 'books.id', '=', 'transaction_details.book_id')
                                        ->groupBy('date_start', 'date_end', 'member_name', 'status', 'transactions.id')
                                        ->orderBy('date_start', 'asc')->get();

        $datatables = datatables()->of($transactions)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::where('qty', '>', 0)->get();
        $members = Member::all();

        
        
        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'book_id' => ['required'],
            'status' => ['required'],
            ]);
        
        

        $transaction = Transaction::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status,
        ]);


        foreach($request->book_id as $book) {
            Book::where('id', $book)->decrement('qty', 1);
            TransactionDetail::create([
                'book_id' => $book,
                'transaction_id' => $transaction->id,

            ]);
        }


        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $books = Book::all();
        $members = Member::all();
        $transaction_details = TransactionDetail::with('books')->get();
        


        // return $books;
        return view('admin.transaction.show', compact('transaction', 'transaction_details', 'members', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::all();
        $members = Member::all();
        $transaction_details = TransactionDetail::with('books')->get();
        


        // return $transaction;
        
        return view('admin.transaction.edit', compact('members', 'books', 'transaction', 'transaction_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->validate($request, [
            'member_id' => ['required'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'book_id' => ['required'],
            'status' => ['required'],
            ]);
        
        

        $transaction = Transaction::update($request->all());

        foreach($request->book_id as $book) {
            Book::where('id', $book)->increment('qty', 1);
            TransactionDetail::update([
                'book_id' => $book,
                'transaction_id' => $transaction->id,
            ]);
        }


        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
