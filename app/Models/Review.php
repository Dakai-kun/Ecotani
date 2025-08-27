<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "rating",
        "comment",
        "productId",
        "userId"
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class, "productId");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
}
