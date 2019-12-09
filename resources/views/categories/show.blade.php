@extends('layouts.master')
@section('content')
    <div class="box-content-head">
        <h3>Categories Details</h3>
    </div>
    <div class="body-content-all ">
        <div class="list-questions" id="list-question">
            @if (session('posts'))
                <?php $posts = session('posts'); ?>
            @endif
            @foreach ( $posts as $post )

                <div class="item-question">
                    <div class="head-question">
                        <h4 class="question">
                            <span>Poll</span>
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}??</a>
                        </h4>
                    </div>
                    <p class="text">{!! $post->content !!}</p>
                    <div class="tag">
                        @foreach($post->postTags as $tag)
                            <span><a href="">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>
                    <div class="bottom-question">
                        <div class="bottom-question-l">
                            <div class="box-img">
                                <img src="https://cdn-images-1.medium.com/max/800/1*AMnUQmnmJ-NknvtTxQEYIw.jpeg" alt="">
                            </div>
                            <div class="box-info">
                                <h4><a href="">{{ $post->postUser->full_name }}</a> <span class="bg-primary">Train</span></h4>
                                <p>
                                    <span>Asked on {{ $post->created_at->format('d/m/Y') }} in</span>
                                    @foreach( $post->postCategories as $category)
                                        <span><a href="">{{ $category->name }}</a></span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="bottom-question-r">
                            <p>
                                <i class="fa fa-comment"></i>
                                {{ count($post->postComments) }} <span class="hidden-mb">answers</span>
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

            <div class="pag">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
@endsection