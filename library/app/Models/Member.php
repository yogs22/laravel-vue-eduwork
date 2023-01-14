<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 'L' ? 'Laki-Laki' : 'Perempuan'
        );
    }
}
