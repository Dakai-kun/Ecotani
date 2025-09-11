<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitizenScience extends Model
{
    protected $fillable = [
        "name",
        "location",
        "weight",
        "userId"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
}
