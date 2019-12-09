<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];
    public function tagPosts() {
        return $this->belongsToMany('App\Post', 'tag_post', 'tag_id', 'post_id')->withTimestamps();
    }
}
