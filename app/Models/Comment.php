<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'author_name', 'content', 'rating'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
