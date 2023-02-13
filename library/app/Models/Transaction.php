<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function longBorrow(){
        return Carbon::parse($this->date_end)->diff($this->date_start)->days;
    }

    public function totalBook(){
        return $this->details()->sum('qty');
    }

    public function totalPrice(){
        return $this->details->sum(function($value){
            return $value->qty * $value->book->price;
        });
    }

    protected function status(): Attribute{
        return Attribute::make(
            get: fn($value) => $value == true ? 'Sudah dikembalikan' : 'Belum dikembalikan'
        );
    }

    protected $casts = [
        'status' => 'boolean'
    ];
}
