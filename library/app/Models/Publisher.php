<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'address'];
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('H:i:s - d M Y'),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('H:i:s - d M Y'),
        );
    }

    protected function phoneNumber(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => '+'.$value
        );
    }
}


// aksesor dan mutators
// kalau yang ini kita pakai mutators
// namaAku = nama aku = nama_aku