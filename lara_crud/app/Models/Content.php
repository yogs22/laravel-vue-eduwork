<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'body', 'location', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
