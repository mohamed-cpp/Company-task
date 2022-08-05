<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];




    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationFor()
    {
        return $this->email;
    }
    /**
     * Get the guard to be used during password reset.
     * @param array $guarded
     * @return StatefulGuard|\Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(array $guarded)
    {
        return Auth::guard('admin');
    }
}
