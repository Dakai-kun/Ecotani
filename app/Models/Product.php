<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "description",
        "weight",
        "price",
        "stock",
        "gram",
        "image",
        "categoryId",
        "userId"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
