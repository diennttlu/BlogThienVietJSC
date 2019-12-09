<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CreateVote;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Vote;
use App\User;
class VoteController extends Controller
{
    public function rating(Request $request)
    {
        $html = '';
        if  (Auth::check()) { 
            $post = Post::findOrFail($request->post_id);
            $user = Auth::user();
            $vote = $post->checkPost($user->id);
            if(!$vote) {
                $vote = Vote::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id
                ]);
                $post->postUser->point += 5;
                $notification = checkNotificaiton('App\Notifications\CreateVote', $post->user_id);
                if (!$notification && $user->id != $post->user_id) {
                    User::find($post->user_id)->notify(new CreateVote($vote));
                }
                $html .= '<span class="vote active" ><i class="fa fa-star"></i></span>';
                $html .= ' &nbsp;'. (count($post->postVotes) + 1) .' <span class="hidden-mb">votes</span>';
        
            } else {
                $vote->delete();
                $post->postUser->point -= 5;
                $html .= '<span class="vote" ><i class="fa fa-star"></i></span>';
                $html .= ' &nbsp;'. (count($post->postVotes) - 1) .' <span class="hidden-mb">votes</span>';
            }
            $post->postUser->save();
        }

        return $html;
    }

}
