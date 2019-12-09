@extends('layouts.master')
@section('title') Blog @endsection
@section('content')
    <div class="main_info_repeat">
        <div class="box-content-head">
            <h3>Blog</h3>
        </div>
        <div class="list_blog">
            @foreach ($blogs as $blog)
                <div class="box_blog">
                    <div class="images">
                        <a href=""><img src="images/upload/{{ $blog->image }}" alt=""></a>
                    </div>
                    <div class="title">
                        <h4><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h4>
                        <p>{!! $blog->content  !!}</p>
                        <div class="more">
                            <div class="left">
                                <span class="author_post">{{ $blog->postUser->full_name }}</span>
                                <span class="date">{{ $blog->created_at->format('d/m/Y') }} | {{ $blog->created_at->format('H:i:s') }}</span>
                            </div>
                            <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i> {{ count($blog->postComments) }} comment</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pag">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
@endsection