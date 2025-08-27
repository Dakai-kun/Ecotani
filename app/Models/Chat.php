<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillbale = [
        "comment",
        "userId"  
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
}
