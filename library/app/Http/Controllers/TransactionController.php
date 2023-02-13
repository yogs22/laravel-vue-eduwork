<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionValidation;
use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        if(auth()->user()->can('index transaksi')){
            return view('admin.transaction.index');
        }else{
            abort('403');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books   = Book::where('qty', '>', 0)->get();
        $members = Member::orderBy('name', 'asc')->get();
        return view('admin.transaction.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = explode(" - ", $request->date);

        Transaction::create([
            'member_id'  => $request->member,
            'date_start' => Carbon::parse($date[0])->format('Y-m-d'),
            'date_end'   => Carbon::parse($date[1])->format('Y-m-d'),
            'status'     => 0
        ]);

        $idTransaction = Transaction::select('id')->orderBy('id', 'desc')->first()->id;

        foreach($request->books as $idBook){
            TransactionDetail::create([
                'transaction_id' => $idTransaction,
                'book_id'        => $idBook,
                'qty'            => 1
            ]);

            Book::whereId($idBook)->decrement('qty');
        }

        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        // return $transaction->details()->firstOrCreate();
        return view('admin.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
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
        if($transaction->status == 'Belum dikembalikan' && $request->status == '1'){
            foreach($transaction->details as $detail){
                Book::whereId($detail->book_id)->increment('qty', $detail->qty);
            }
        }else if ($transaction->status == 'Sudah dikembalikan' && $request->status == '0'){
            foreach($transaction->details as $detail){
                Book::whereId($detail->book_id)->decrement('qty', $detail->qty);
            }
        }

        $transaction->update(['status' => $request->status]);

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        foreach($transaction->details as $detail){
            Book::whereId($detail->book_id)->increment('qty', $detail->qty);
        }
        
        $transaction->delete();
    }

    public function api(Request $request){
        $transactions = Transaction::when($request->status, function($query) use($request) {
            return $query->where('status', $request->status);
        })
        ->when($request->date, function($query) use($request){
            return $query->whereDate('date_start', $request->date);
        })
        ->get();

        return datatables()->of($transactions)
            ->addColumn('name', fn($transaction) => $transaction->member->name)
            ->addColumn('time', fn($transaction) => $transaction->longBorrow())
            ->addColumn('totalBook', fn($transaction) => $transaction->totalBook())
            ->addColumn('price', fn($transaction) => idrCurrency($transaction->totalPrice()))
            ->make(true);
    }

    public function test_spatie(){
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'index transaksi']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = auth()->user();
        // $user->assignRole('admin');

        // $user = User::with('roles')->get();
        // return $user;
        
        $user = auth()->user();
        $user->removeRole('admin');
    }
}
