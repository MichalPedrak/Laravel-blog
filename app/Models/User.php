<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function setPasswordAttribute($password){ // za każdym razem jak do tego modelu jest set ,,Password,, to nam to robi - password to ta nazwa co wysyłana jest
        $this->attributes['password'] = bcrypt($password);

        // przypisuje nam do tego ten zahashowane hasło i wtedy dopiero
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() // User->posts a on ma wiele wiec has many
    {
        return $this->hasMany(Post::class);
    }
}
