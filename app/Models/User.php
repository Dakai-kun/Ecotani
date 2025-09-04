<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'type',
        'password',
        'address',
        'locationId'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, "locationId");
    }

    public function CitizenScience()
    {
        return $this->hasMany(User::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }
}
