<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'year', 'publisher_id', 'catalog_id', 'author_id', 'qty', 'price'];

    public function transaction_details()
    {
        return $this->belongsTo('App\Models\TransactionDetail', 'book_id');
    }
    public function publishers()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function catalogs()
    {
        return $this->belongsTo('App\Models\Catalog', 'catalog_id');
    }
    public function authors()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
}
