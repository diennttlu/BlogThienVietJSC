@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3>Post Detail</h3>
                </div>
                <div id="btn-active-post">
                    @if ($post->status == 0)
                        <span id="active_post" class="btn btn-outline-success">Activated</span>
                    @else 
                        <span id="active_post" class="btn btn-outline-danger">Deactivated</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-9" style="padding-bottom:120px">
                    @include('layouts.error')
                    @if( session('message_success') )
                        <div class="alert alert-success">
                            {{ session('message_success') }}
                        </div>
                    @endif
                    @if( session('message_error') )
                        <div class="alert alert-success">
                            {{ session('message_error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label style="font-weight:bold">Categories</label>
                        <div class="tag">
                            @foreach($post->postCategories as $category)
                                <span>{{ $category->name }}</span> &nbsp; &nbsp;
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Tags</label>
                        <div class="tag">
                            @foreach($post->postTags as $tag)
                                <span>{{ $tag->name }}</span> &nbsp; &nbsp;
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Title</label>
                       <p>{{ $post->title }}</p>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Content</label>
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#active_post', function() {
                $.ajax({
                    url: "{{ route('admin_posts.active_post') }}",
                    method: "POST",
                    data: { post_id:"{{ $post->id }}"
                    },
                    success: function(data) {
                        $('#btn-active-post').html(data);
                    }
                });
            });
        });
    </script>
@endsection