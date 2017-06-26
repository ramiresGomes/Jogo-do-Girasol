<?php

namespace Sunflower\Models;

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
            ->withPivot('picture', 'picture_dimensions', 'picture_url', 'picture_path')
            ->withTimestamps();
    }
}
