<?php

namespace Square\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getHumanCreated()
    {
        Carbon::setLocale(config('app.localeCarbon'));

        return $this->created_at->diffForHumans();
    }
}