<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'PostController@index')->name('index');

Route::post('Register', 'CustomerController@CreateAccount')->name('customer.register');

Route::get('Logout', 'CustomerController@logout')->name('customer.logout');

Route::post('login', 'CustomerController@Login')->name('customer.login');

Route::get('Profile', 'CustomerController@GetProfile')->name('customer.profile');

Route::post('EditProfile', 'CustomerController@UpdateProfile')->name('customer.editprofile');

Route::post('ChangePasword', 'CustomerController@ChangePassword')->name('customer.changepassword');

Route::get('ListUser', 'CustomerController@GetListUser')->name('customer.getlistuser');

Route::get('ListUserPoint', 'CustomerController@getListUserPoint')->name('customer.getlistuserpoint');

Route::get('DetailProfile/{id}', 'CustomerController@DetailProfile')->name('customer.detaiprofile');

Route::post('ForgetPassword', 'CustomerController@SendEmail')->name('customer.send.email');

Route::get('GetCodeEmail/{id}', 'CustomerController@CheckCodeForget')->name('customer.check.code');

Route::post('GetCodeEmail/{id}', 'CustomerController@VerifyCode')->name('customer.verify.code');

Route::get('Follow/{id}', 'CustomerController@getFollowUser')->name('Customer.follow');

Route::get('searchUsers', 'CustomerController@searchUser')->name('customer.search.user');

Route::group(['prefix' => 'posts'], function () {
    Route::get('index', 'PostController@index')->name('posts.index');

    Route::get('create', 'PostController@create')->name('posts.create');

    Route::post('store', 'PostController@store')->name('posts.store');

    Route::get('show/{id}', 'PostController@show')->name('posts.show');

    Route::get('edit/{id}', 'PostController@edit')->name('posts.edit');

    Route::post('update/{id}', 'PostController@update')->name('posts.update');

    Route::get('destroy/{id}', 'PostController@delete')->name('posts.destroy');

    Route::get('getpostbycategory/{id}', 'PostController@getPostByCategory');

    Route::post('search', 'PostController@postSearch')->name('posts.search');
});

Route::group(['prefix' => 'comments'], function () {
    Route::get('index', 'CommentController@index')->name('comments.index');

    Route::get('create', 'CommentController@create')->name('comments.create');

    Route::post('store', 'CommentController@store')->name('comments.store');

    Route::get('show/{id}', 'CommentController@show')->name('comments.show');

    Route::post('edit', 'CommentController@edit')->name('comments.edit');

    Route::post('update', 'CommentController@update')->name('comments.update');

    Route::post('destroy', 'CommentController@destroy')->name('comments.destroy');
});

Route::group(['prefix' => 'votes'], function () {
    Route::post('rating', 'VoteController@rating')->name('votes.rating');

    Route::post('check/vote', 'VoteController@checkVote')->name('votes.check_vote');
});

Route::group(['prefix' => 'follows'], function () {
    Route::post('following', 'FollowController@following')->name('follows.following');

    Route::post('check/follow', 'FollowController@checkFollow')->name('follows.check_follow');
});

Route::get('admin/login', 'Admin\AuthController@login')->name('admin.login_create');

Route::post('admin/login', 'Admin\AuthController@postLogin')->name('admin.login_post');

Route::get('admin/logout', 'Admin\AuthController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashbroadController@index')->name('admin.dashbroad');

    Route::get('/accounts/profile', 'UserController@profile')->name('admin.account_profile');

    Route::get('/accounts/list', 'UserController@index')->name('admin.account_list');

    Route::get('/accounts/change-password/{id}', 'UserController@createChangePassword')->name('admin.account_createChangepassword');

    Route::post('/accounts/change-password/{id}', 'UserController@postChangePassword')->name('admin.account_postChangepassword');

    Route::get('/accounts/create', 'UserController@create')->name('admin.account_create');

    Route::get('banner', 'BannerController@index')->name('admin.banner');

    Route::get('banner/create', 'BannerController@create')->name('admin.banner.create');

    Route::post('banner/create', 'BannerController@store')->name('admin.banner.store');

    Route::get('banner/edit/{id}', 'BannerController@edit')->name('admin.banner.edit');

    Route::post('banner/edit/{id}', 'BannerController@update')->name('admin.banner.update');

    Route::get('banner/delete/{id}', 'BannerController@delete')->name('admin.banner.delete');

    Route::get('banner/status', 'BannerController@ajax')->name('admin.banner.ajax');

    Route::get('accounts/profile', 'UserController@profile')->name('admin.account_profile');

    Route::get('accounts/list', 'UserController@index')->name('admin.account_list');

    Route::get('accounts/change-password/{id}', 'UserController@createChangePassword')->name('admin.account_createChangepassword');

    Route::post('accounts/change-password/{id}', 'UserController@postChangePassword')->name('admin.account_postChangepassword');

    Route::get('accounts/create', 'UserController@create')->name('admin.account_create');

    Route::post('accounts/create', 'UserController@postCreate')->name('admin.account_postCreate');

    Route::post('accounts/search', 'UserController@getSearchaACC')->name('admin.account.search');

    Route::get('accounts/search/admin', 'UserController@AjaxSearchAdmin')->name('admin.account.ajax_name');

    Route::get('accounts/Edit/{id}', 'UserController@editAdmin')->name('admin.account_editAdmin');

    Route::post('accounts/Edit/{id}', 'UserController@postEditAdmin')->name('admin.account_posteditAdmin');

    Route::get('account/EditMyprofile/{id}', 'UserController@editmyprofile')->name('admin.account_editmyprofile');

    Route::post('account/EditMyprofile/{id}', 'UserController@editPostMyProfile')->name('admin.account_postEditMyProfile');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.category');

        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');

        Route::post('/edit/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');

        Route::get('/search', 'CategoryController@search')->name('admin.category.search');
    });

    Route::get('notifications/read', 'NotificationController@read')->name('admin.notification.read');

    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', 'BlogController@index')->name('blogs.list_blog');

        Route::get('create', 'BlogController@create')->name('blogs.create');

        Route::post('search', 'BlogController@search')->name('blogs.search');

        Route::post('store', 'BlogController@store')->name('blogs.store');

        Route::get('edit/{id}', 'BlogController@edit')->name('blogs.edit');

        Route::post('update/{id}', 'BlogController@update')->name('blogs.update');

        Route::get('destroy/{id}', 'BlogController@destroy')->name('blogs.destroy');
    });

    Route::group(['prefix' => 'badges'], function () {
        Route::get('/', 'BadgeController@index')->name('admin.badge');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'TagController@gettag')->name('admin.tag_get');

        Route::get('delete/{id?}', 'TagController@delete')->name('admin.tag_detele');

        Route::get('edit/{id}', 'TagController@edit')->name('admin.tag_edit');

        Route::post('update/{id}', 'Tagcontroller@update')->name('admin.tag_update');
        Route::get('search/{keyword?}', 'TagController@search')->name('admin.tag_search');
    });
    
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', 'ContactController@show')->name('admin.contact_show');
        Route::get('new', 'ContactController@new')->name('admin.contact_new');
        Route::post('add', 'ContactController@add')->name('admin.contact_add');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index')->name('posts.list_post');

        Route::get('show/{id}', 'PostController@show')->name('admin_posts.show');

        Route::post('search', 'PostController@search')->name('admin_posts.search');

        Route::get('edit/{id}', 'PostController@edit')->name('admin_posts.edit');

        Route::post('update/{id}', 'PostController@update')->name('admin_posts.update');

        Route::get('destroy/{id}', 'PostController@destroy')->name('admin_posts.destroy');

        Route::post('post/active', 'PostController@activePost')->name('admin_posts.active_post');
    });
    
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index')->name('posts.list_post');

        Route::get('show/{id}', 'PostController@show')->name('admin_posts.show');

        Route::post('search', 'PostController@search')->name('admin_posts.search');

        Route::get('edit/{id}', 'PostController@edit')->name('admin_posts.edit');

        Route::post('update/{id}', 'PostController@update')->name('admin_posts.update');

        Route::get('destroy/{id}', 'PostController@destroy')->name('admin_posts.destroy');

        Route::post('post/active', 'PostController@activePost')->name('admin_posts.active_post');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('destroy/{id}', 'CommentController@destroy')->name('admin.comments.destroy');
    });
});

Route::group(['prefix' => 'contacts'], function () {
    Route::get('/', 'ContactController@new')->name('contact.new');
    Route::post('contact', 'ContactController@add')->name('contact.add');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('tag/{search?}', 'TagController@show')->name('tag.show');
    Route::get('tagdetail/{id?}', 'TagController@detail')->name('tag.detail');
    Route::get('tagsearch/{keyword?}', 'TagController@search')->name('tag.search');
});

Route::group(['prefix' => 'blogs'], function () {
    Route::get('index', 'BlogController@index')->name('blogs.index');

    Route::get('show/{id}', 'BlogController@show')->name('blogs.show');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    
    Route::get('show/{id}', 'CategoryController@show')->name('categories.detail');
    Route::get('point', 'CategoryController@point')->name('categories.point');
});

Route::get('notifications/read', 'NotificationController@read')->name('notification.read');
