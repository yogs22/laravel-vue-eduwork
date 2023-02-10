<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use HasFactory;
    protected $fillable = ['id', 'date_start', 'date_end', 'member_id', 'long_transactions', 'total_books', 'total_price', 'status'];
    public function transaction_details()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    protected function longTransactions(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value.' Hari',
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 0 ? 'Belum dikembalikan' : 'Sudah dikembalikan',
        );
    }
}
