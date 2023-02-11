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

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

        // ? TOTAL BOX 
        $total_books = Book::count();
        $total_publishers = Publisher::count();
        $total_authors = Author::count();
        $total_transactions = Transaction::whereMonth('date_start', date('m'))->count();

        // ? GRAFIK PUBLISHER
        $data_donut = Book::select(DB::raw("COUNT('publisher_id') as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')
                                    ->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')
                                    ->groupBy('publishers.name')->pluck('publishers.name');

        // ? GRAFIK TRANSACTION
        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ( $label_bar as $key => $value ) {
            $data_bar [$key]['label'] = $label_bar[$key];
            $data_bar [$key]['backgroundColor'] = $key == 0 ? 'rgba(60, 141, 188, 0.9)' : 'rgba(210, 241, 222, 1)';
            $data_month = [];

            foreach ( range(1,12) as $month ) {
                if ( $key == 0 ) {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }
            $data_bar [$key]['data'] = $data_month;
        }

        // ? GRAFIK 
        $data_pie = Book::select(DB::raw("COUNT('author_id') as total"))->groupBy('author_id')->orderBy('author_id', 'asc')
                            ->pluck('total');
        $label_pie = Author::orderBy('authors.id', 'asc')->join('books', 'books.author_id', '=', 'authors.id')
                            ->groupBy('authors.name')->pluck('authors.name');

        return view('home', compact('total_books', 'total_publishers', 'total_authors', 'total_transactions', 'data_donut', 'label_donut', 'data_bar', 'data_pie', 'label_pie'));
    }

    public function test_spatie() 
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'index member']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user = auth()->user();
        $user->assignRole('admin');
        return $user;
    }
}
