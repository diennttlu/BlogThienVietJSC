<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CreateFollow;
use App\Notification;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function following(Request $request)
    {
        $html = '';
        if (Auth::check()) {
            $id = $request->user_id;
            $user = Auth::user();
            if ($user->isFollowing($id)) {
                $user->unfollow($id);
                $html = '<span class="follow">+ Follow</span>';
            } else {
                $user->follow($id);
                $notification = checkNotificaiton('App\Notifications\CreateFollow', $user->id);
                if (!$notification) {
                    User::find($id)->notify(new CreateFollow($user));
                }
                $html = '<span class="follow active">Following</span>';
            }
        }
        return $html;
    }
}
