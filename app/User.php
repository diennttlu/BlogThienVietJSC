<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CreatePost;
use App\Notifications\CreateComment;
use App\Notifications\CreateVote;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard = 'admin';
    
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'point',
        'location',
        'image',
        'email_public',
        'description',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userPosts() {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function userVotes() {
        return $this->hasMany('App\Vote');
    }

    public function userComments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follow_id', 'user_id')
                    ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follow_id')
                    ->withTimestamps();
    }

    public function follow($userId) 
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }
    public function isFollowing($userId) 
    {
        return (boolean) $this->follows()->where('follow_id', $userId)->first();
    }

    public function isVotePost($postId)
    {
        return (boolean) $this->userVotes()->where('post_id', $postId)->first();
    }
}
