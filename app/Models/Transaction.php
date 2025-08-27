<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "payDate",
        "amount",
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
