<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
        'name',
    ];

    public function categoryPosts() {
        return $this->belongsToMany('App\Post', 'category_post', 'category_id', 'post_id')->withTimestamps();
    }
}
