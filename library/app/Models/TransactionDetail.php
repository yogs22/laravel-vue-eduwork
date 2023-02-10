<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['book_id', 'transaction_id'];
    use HasFactory;

    public function books(){
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
}
