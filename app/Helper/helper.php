<?php
use App\Post;
use App\Vote;
use App\Category;
use App\Tag;
use App\User;
use App\Notification;

function checkVote($post, $user_id)
{
    $votes = $post->postVotes(); 
    foreach ($votes as $vote) {
        if ($vote->user_id == $user_id) {
            return true;
        }
    }
}

function saveCategory($categories, $post)
{
    foreach ($categories as $category) {
        $old_category = Category::where('name', $category)->first();
        if (!isset($old_category)) {
            $old_category = Category::create([
                'name' => $category
            ]);
        }
        $post->postCategories()->attach($old_category);  
    }
}

function saveTag($tags, $post)
{
    foreach ($tags as $tag) {
        $old_tag = Tag::where('name', $tag)->first();
        if ( !isset($old_tag) ) {
            $old_tag = Tag::create([
                'name' => $tag
            ]);
        }
        $post->postTags()->attach($old_tag);  
    }
}

function detachCategory($categories, $post) 
{
    foreach ($categories as $category) {
        $old_category = Category::where('name', $category)->first();
        $post->postCategories()->detach($old_category);
    }
}

function detachTag($tags, $post) 
{
    foreach ($tags as $tag) {
        $old_tag = Tag::where('name', $tag)->first();
        $post->postTags()->detach($old_tag);
    }
}

function getSTTPage($params) {
    return ($params->currentpage() - 1) * $params->perpage() + 1;
}

function formatDate($params) {
    return $params->created_at->format('d/m/Y');
}

function getUserNotification($id)
{
    return User::find($id);
}

function checkNotificaiton($type, $params) {
    return Notification::where('type', $type)->get()->filter(function($query) use ($params) {
            return $query->data['user_id'] == $params;
        })->first();
}

function checkFollow($post) {
    if (Auth::check()) {
        if ( Auth::user()->isFollowing($post->user_id) && Auth::user()->id != $post->user_id) {
            echo '<span class="follow active">Following</span>';
        } elseif (Auth::user()->id != $post->user_id) {
            echo '<span class="follow">+ Follow</span>';
        }
    } else {
        echo '<span class="follow">+ Follow</span>';
    }
}