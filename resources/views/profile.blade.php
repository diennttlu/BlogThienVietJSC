@extends('layouts.master')
@section('title') Profile: {{ $user->full_name }} @endsection
@section('content')
    <div class="box-content-head">
        <h3><span>{{ $user->full_name }}</span> Profile</h3>
    </div>
    <div class="box-profile">
        <div class="box-info-head">
            <div class="box-img">
                <img src="{{ config('image.imgUser') . $user->image }}" height="256" width="256" alt="">
            </div>
            <div class="box-name-address">
                <h3>{{ $user->full_name }}</h3>
                <p><i class="fa fa-map-marker"></i> <span>{{ $user->location }}</span></p>
                @if( $user->email_public==1 )
                <p><i class="fa fa-envelope-o"></i> <span>{{ $user->email }}</span></p>
                @endif
            </div>
            <div class="accumulation">
                <p class="position bg-warning">
                    @if( $user->point >0 && $user->point<1300 )
                        newbie
                    @else
                        professor
                    @endif
                </p>
                <p class="number-star">{{ $user->point }} <span><i class="fa fa-star"></i></span></p>
                <p>Points</p>
            </div>
            <div class="box-btn">
                @if( Auth::check() )
                    @if( Auth::user()->id == $user->id )
                <button data-toggle="modal" data-target="#edit-info"><i class="fa fa-pencil"></i> Edit</button>
                    @endif
                 @endif
            </div>
        </div>
        @if (session()->has('message_success'))
            <div class="alert alert-info">
                {{ session('message_success') }}
            </div>
        @endif
        @if (session()->has('message_error'))
            <div class="alert alert-danger">
                {{ session('message_error') }}
            </div>
        @endif
        <div class="detail-profile">
            <ul class="nav-links">
                <li ><a href="{{ route('customer.detaiprofile',$user->id) }}" class="active" id="question">Questions <span>{{ count($posts) }}</span></a></li>
                <li><a href="{{ route('Customer.follow', $user->id) }}" id="follow" >Following <span></span></a></li>
            </ul>
            <div class="list-questions" id="list">
                @foreach( $posts as $post)
                <div class="item-question">
                    <div class="head-question">
                        <h4 class="question">
                            <!--  <span>Poll</span> -->
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                        </h4>
                    </div>
                    <p class="text">{!!  $post->content !!}</p>
                    <div class="tag">
                        @foreach( $post->postTags as $tag )
                        <span><a href="">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>
                    <div class="modal fade" id="edit_question_{{ $post->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#menu1">Edit a Question</a>
                                        </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="menu1">
                                            <div class="main_info">
                                                <form action="{{ route('posts.update', ['id' => $post->id ]) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Your question</label>
                                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Category</label>
                                                        <input type="text" name="categories" data-role="tagsinput" class="form-control" value="
                                                            <?php 
                                                                foreach ( $post->postCategories as $category ) {
                                                                    echo $category->name.',';
                                                                }
                                                            ?>
                                                        ">
                                                    </div>
                                                    <div>
                                                        <textarea name="content" class="ck_editor">{{ $post->content }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Tag (max 5 tag)</label>
                                                        <input type="text" name="tags" data-role="tagsinput" class="form-control" value="
                                                            <?php 
                                                                foreach ( $post->postTags as $tag) {
                                                                    echo $tag->name.",";
                                                                }
                                                            ?>
                                                        ">
                                                    </div>
                                                    <div class="form-sent">
                                                        <button type="submit">Update question</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right;" class="box-btn">
                            @if(Auth::check() and $user->id == Auth::user()->id)
                            <a href="#" id="edit_form" class="client" data-toggle="modal" data-target="#edit_question_{{ $post->id }}">
                                <i class="fa fa-pencil"></i>Edit
                            </a>
                            @endif
                    </div>
                    <div class="bottom-question">
                        <div class="bottom-question-l">
                            <div class="box-img">
                                <img src="{{ config('image.imgUser'). $user->image }}" height="40px" width="40px" alt="">
                            </div>
                            <div class="box-info">
                                <h4><a href="{{ route('customer.detaiprofile',$user->id) }}">{{ $user->full_name }} </a> <span class="bg-primary">Train</span></h4>
                                <p>
                                    <span>{{ $post->created_at->format('d/m/y') }}</span>
                                    <span><a href="">Business</a></span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-question-r">
                            <p>
                                <i class="fa fa-comment"></i> 
                                {{ count($post->postcomments) }} <span class="hidden-mb">answers</span>
                            </p>
                            <p>
                                <i class="fa fa-eye"></i>
                                {{ $post->view }} <span class="hidden-mb">views</span>
                            </p>
                            <p>
                                <i class="fa fa-star"></i> 
                                {{ count($post->postVotes) }} <span class="hidden-mb">votes</span>
                            </p>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
            <div class="text-center">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection