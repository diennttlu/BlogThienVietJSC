<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'view',
        'user_id',
        'image',
        'status'
    ];

    public function postComments() {
        return $this->hasMany('App\Comment')->orderBy('id', 'DESC');
    }

    public function postUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function postCategories() {
        return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id')->withTimestamps();
    }

    public function postTags() {
        return $this->belongsToMany('App\Tag', 'tag_post', 'post_id', 'tag_id')->withTimestamps();
    }

    public function postVotes() {
        return $this->hasMany('App\Vote', 'post_id', 'id');
    }

    public function checkPost($user_id) {
        return $this->postVotes->where('user_id', $user_id)->first();
    }

    public function checkRole()
    {
        if ($this->postUser->role == 0) {
            return true;
        } 
        return false;
    }

    public function scopePostFilter($post, $page) {
        return $post->whereHas('postUser', function ($query) {
            $query->where('role',  '=' , 0);
        })->where('status', 1)->with('postCategories')->paginate($page);
    }
}
