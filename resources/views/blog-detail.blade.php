@extends('layouts.master')
@section('title') Blog detail: {{$post->title}} @endsection
@section('content')
    <div class="box-content-mid">
        <div class="main_info_repeat">
            <div class="box-content-head">
            <h3>Blog details</h3>
            <div class="form-search">
                <form>
                    <input type="text" name="search" placeholder="Enter keywords...">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
            </div>
            
            <div class="content">
            <p><img src="assets/images/upload/{{ $post->image }}" alt=""></p>
            <h4>{!! $post->title !!}</h4>
            {!! $post->content !!}
            </div>
            
            <div class="comment_chat">
                <span id="count_comment" class="number">{{ count($post->postComments) }} comments</span>
                <div class="list_comment">
                    @foreach ($post->postComments as $comment)
                        <div class="media">
                            <img src="{{ config('image.imgUser').$comment->commentUser->image }}" alt="" class="align-self-start mr-3 rounded-circle" style="width:50px;">
                            <div class="media-body">
                                @if (Auth::check() && Auth::user()->id == $comment->user_id)
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
    });
</script>
@endsection