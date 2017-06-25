<?php

namespace Square\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'members_challenges')
            ->withPivot('picture')
            ->withTimestamps();
    }
}
