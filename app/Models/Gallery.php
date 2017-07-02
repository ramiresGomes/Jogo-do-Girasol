<?php

namespace Sunflower\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'path',
        'url',
        'dimensions'
    ];
}