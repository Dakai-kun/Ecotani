<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitizenScience extends Model
{
    protected $fillbale = [
        "title",
        "description",
        "media_url",
        "submitted_at",
        "verified",
        "userId"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
}
