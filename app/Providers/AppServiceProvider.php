<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Notification;
use App\User;
use App\Post;
use App\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['admin.layouts.header'], function ($view)
        {
            $notifications = Notification::where([
                ['type', 'App\Notifications\CreatePost'],
                ['read_at', null]
            ])->orderBy('created_at', 'DESC')->get();

            $view->with('notifications', $notifications);
        });

        view()->composer(['layouts.rightBar'], function ($view){
             $user =User::where('role', 0)->get();

             $post=Post::whereHas('postUser', function ($query) {
                    $query->where('role',  '=' , 0);
                })->where('status', 1)->get();

             $postsort=Post::whereHas('postUser', function ($query) {
                    $query->where('role',  '=' , 0);
                })->where('status', 1)->orderBy('view', 'DESC')->take(5)->get();

             $userpoint=User::orderBy('point', 'DESC')->where('role', 0)->take(5)->get();

             $listtag= tag::withCount('tagPosts')->orderBy('tag_posts_count', 'DESC')->take(5)->get();

             $userpost = User::withCount('userPosts')->with('userPosts')->orderBy('user_posts_count', 'DESC')->where('role', 0)->take(5)->get();

             $usercomment = User::withCount('userComments')->with('userComments')->orderBy('user_comments_count', 'DESC')->where('role', 0)->take(5)->get();
             
             $view->with('user', $user);
             $view->with('post', $post);
             $view->with('postsort', $postsort);
             $view->with('listtag', $listtag);
             $view->with('userpoint', $userpoint);
             $view->with('userpost', $userpost);
             $view->with('usercomment', $usercomment);
        });

        view()->composer(['layouts.header'], function ($view) 
        {
            if (Auth::check()) {
                $user = Auth::user();
                $notifications = $user->unreadNotifications()
                ->where(function($query) {
                    $query->where('type', 'App\Notifications\CreateVote')
                        ->orWhere('type', 'App\Notifications\CreateFollow')
                        ->orWhere('type', 'App\Notifications\CreateComment')
                        ->orWhere('type', 'App\Notifications\ActivePost');
                })->get();
                
                $view->with('notifications', $notifications);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
