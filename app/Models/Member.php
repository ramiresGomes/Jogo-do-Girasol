<?php

namespace Square\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'members_challenges')
            ->withPivot('picture')
            ->withTimestamps();
    }
}
