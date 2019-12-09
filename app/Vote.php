<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function votePost()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
