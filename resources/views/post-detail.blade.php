@extends('layouts.master')
@section('title') Post-detail: {{ $post->title }} @endsection
@section('content')
<div class="box-content-head frm-search">
    
</div>
<div class="body-content-all">
    <div class="media">
            <img src="https://cdn-images-1.medium.com/max/800/1*AMnUQmnmJ-NknvtTxQEYIw.jpeg" alt="" class="align-self-start mr-3" style="width:50px;">
        <div style="width: 400px;">
            <h4 class="user_name">{{ $post->postUser->full_name }}</h4>
            <span id="follow">
                {{ checkFollow($post) }}
            </span>	
        </div>
    </div>
    <div class="list-questions detail-question">
        <div class="item-question">
            <div class="head-question">
                <h4 class="question">{{ $post->title }}</h4>
            </div>
            <p class="text">{!! $post->content !!}</p>
            <div class="date-time-comment">
                <span class="date">Date {{ $post->created_at->format('d/m/Y') }}</span>
                <span class="time">Time {{ $post->created_at->format('H:i:s') }}</span>
            </div>
            <div class="bottom-question-r">
                <p style="padding-top: 15px; text-align: right;">
                    <i class="fa fa-eye"></i>
                    &nbsp;{{ $post->view }} <span class="hidden-mb" style="padding-right: 10px;">views</span>
                    <span id="rating">
                        @if (Auth::check() && Auth::user()->isVotePost($post->id))
                            <span class="vote active" ><i class="fa fa-star"></i></span>
                        @else
                            <span class="vote" ><i class="fa fa-star"></i></span>
                        @endif
                        &nbsp;{{ count($post->postVotes) }} <span class="hidden-mb">votes</span>
                    </span>
                   
                </p>
            </div>
        </div>
        <div class="comment_chat">
            <span id="count_comment" class="number">{{ count($post->postComments) }} comments</span>
            <div class="list_comment">
                @foreach ($post->postComments as $comment)
                    <div class="media">
                        <img src="https://cdn-images-1.medium.com/max/800/1*AMnUQmnmJ-NknvtTxQEYIw.jpeg" alt="" class="align-self-start mr-3 rounded-circle" style="width:50px;">
                        <div class="media-body">
                            @if ((Auth::check() && Auth::user()->id == $comment->user_id) || (Auth::check() && Auth::user()->id == $post->user_id))
                                <span class="btn_edit_chat" data-id="{{ $comment->id }}"><i class="fa fa-edit" aria-hidden="true"></i></span>
                                <span class="btn_delete_chat" data-id="{{ $comment->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                            @endif
                            <h4>{{ $comment->commentUser->full_name }}<small><i>&nbsp&nbsp&nbsp{{ $comment->created_at->format('d/m/Y') }}</i></small></h4>
                            <p class="content_comment_{{ $comment->id }}">{{ $comment->content }}</p>   
                        </div>
                    </div>
                    <div class="post_message message_comment_edit">
                    </div>
                    <div id="form-edit_{{ $comment->id }}" class="form-group form-edit-comment">
                        <textarea class="form-control form-group" rows="3" name="content">{{ $comment->content }}</textarea>
                        <input type="submit" class="ajax_comment_edit btn btn-primary" data-id="{{ $comment->id }}" value="Edit comment">
                    </div>
                @endforeach
            </div>
            <div id="message_comment" class="post_message">
            </div>
            <div id="form_comment" class="post_message">
                <span class="number">Add your comment</span>
                <div class="form-group">
                    <textarea id="comment_content" class="form-control" name="content"></textarea>
                </div>
                <div class="form_sent">
                    @if (Auth::check())
                        <input id="sent_comment" type="submit" class="sent_btn ajax_comment" value="Post comment">
                    @else
                        <a href="#" id="login_form" class="sent_btn" data-toggle="modal" data-target="#signin">
                            Post comment
                        </a>
                    @endif
                    <span>By posting your answer, you agree to the privacy policy and terms of service.</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn_edit_chat', function() {
            var id = $(this).data('id');
            $('.form-edit-comment').fadeOut();
            $('#form-edit_' + id).fadeIn();
        });

        $(document).on('click', '.ajax_comment', function() {
            var content = $('#comment_content').val();
            $.ajax({
                url: "{{ route('comments.store') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    post_id: '{{ $post->id }}',
                    content: content,
                },
                success: function (res) {
                    $('#comment_content').val('');
                    $('.list_comment').prepend(res.view);
                    $('#count_comment').html(res.count_comment);
                    $('#message_comment').html('');
                },
                error: function (res) {
                    var errors = res.responseJSON;
                    $('#message_comment').html(`<div class="alert alert-danger">
                        <span>` + errors.errors["content"] + `</span></div>`);
                }
            });
        });

        $(document).on('click', '.ajax_comment_edit', function() {
            var self = $(this);
            var content = $(this).prev('textarea').val();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('comments.update') }}",
                method: 'POST',
                data: {
                    id: id,
                    content: content,
                },
                success: function (res) {
                    $(this).prev('textarea').val(res);
                    self.parent().css('display', 'none');
                    self.parent().prevAll().find('.content_comment_' + id).html(res);
                    self.parent().prev('.message_comment_edit').html('');
                },
                error: function (res) {
                    var errors = res.responseJSON;
                    self.parent().prev('.message_comment_edit').html(`<div class="alert alert-danger">
                        <span>` + errors.errors["content"] + `</span></div>`);
                }
            });
            
        });

        $(document).on('click', '.btn_delete_chat', function() {
            var id = $(this).data('id');
            var self = $(this);
            $.ajax({
                url: "{{ route('comments.destroy') }}",
                method: 'POST',
                data: {
                    id: id,
                    post_id: '{{ $post->id }}',
                },
                success: function (res) {
                    self.closest('.media').remove();
                    $('#count_comment').html(res.count_comment);
                }
            }); 
        });

        $(document).on('click', '.vote', function() {
            $(this).toggleClass("active");
            var self = $(this);
            $.ajax({
                url: '{{ route("votes.rating") }}',
                method: 'POST',
                data: {
                    post_id: '{{ $post->id }}',
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data == '') {
                        $("#signin").modal("show");
                        self.toggleClass("active");
                    } else {
                        $('#rating').html(data);

                    }
                }
            });
        });

        $(document).on('click', '.follow', function() {
            $(this).toggleClass("active");
            var self = $(this);
            $.ajax({
                url: '{{ route("follows.following") }}',
                method: 'POST',
                data: {
                    user_id: '{{ $post->user_id }}'
                },
                success: function(data) {
                    if (data == '') {
                        $("#signin").modal("show");
                        self.toggleClass("active");
                    } else {
                        $('#follow').html(data);
                    }
                }
            });
        });
    });
</script>
@endsection