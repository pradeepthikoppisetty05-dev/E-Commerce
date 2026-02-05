<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
=======
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
<<<<<<< HEAD
    use HasFactory, Notifiable;
=======
    use HasFactory, Notifiable, HasApiTokens;
>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
<<<<<<< HEAD
        'phone',
        'google_id',
        'facebook_id',
=======
>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e
        'password',
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
<<<<<<< HEAD
=======

    public function orders() {
    return $this->hasMany(Order::class);
    }

    public function carts()
    {
    return $this->hasMany(Cart::class);
    }


>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e
}
