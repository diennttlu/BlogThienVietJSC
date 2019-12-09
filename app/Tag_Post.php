<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_Post extends Model
{
    protected $fillable = [
        'tag_id',
        'post_id'
    ];
}
