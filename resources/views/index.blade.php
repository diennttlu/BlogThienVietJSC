@extends('layouts.master')
@section('title') Index @endsection
@section('content')
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
    <div class="box-content-head">
        <h3>All Questions</h3>
        <div class="box-filter">
            <p>Filter by  </p>
            <select class="select-ctgr" id="categories">
                <option value="0">---select---</option>}
                @foreach ( $categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="links-head">
        <nav>
            <div class="nav nav-tabs nav-pills" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Latest</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Vote</a>
            </div>
        </nav>
        <div class="per-page">
            <p class="hidden-mb">Question per page</p>
            @csrf
            <select name="page" id="element-page">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
        </div>
    </div>
    
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
            <div class="list-questions" id="list-question">
                @if (session('posts')) 
                    <?php $posts = session('posts'); ?> 
                @endif
                @foreach ( $posts as $post )
                    <div class="item-question">
                        <div class="head-question">
                            <h4 class="question">
                                <span>Poll</span>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h4>
                        </div>
                        <p class="text">{!! $post->content !!}</p>
                        <div class="tag">
                            @foreach($post->postTags as $tag)
                            <span><a href="{{ route('tag.detail', ['id' => $tag->id]) }}">{{ $tag->name }}</a></span>
                            @endforeach
                        </div>
                        <div class="bottom-question">
                            <div class="bottom-question-l">
                                <div class="box-img">
                                    <a href="{{ route('customer.detaiprofile', ['id' => $post->user_id]) }}">
                                        <img src="{{ config('image.imgUser') . $post->postUser->image }}" alt="">
                                    </a>
                                </div>
                                <div class="box-info">
                                    <h4><a href="{{ route('customer.detaiprofile', ['id' => $post->user_id]) }}">{{ $post->postUser->full_name }}</a> <span class="bg-primary">Train</span></h4>
                                    <p>
                                        <span>Asked on {{ formatDate($post) }} in</span>
                                        @foreach( $post->postCategories as $category)
                                            <span>
                                                <a href="{{ route('categories.detail', ['id' => $category->id]) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </span>
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
        <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">  
            <div class="list-questions">
                @foreach ( $posts_vote as $post_vote )
                <div class="item-question">
                    <div class="head-question">
                        <h4 class="question">
                            <span>Poll</span>
                            <a href="{{ route('posts.show', ['id' => $post_vote->id]) }}">{{ $post_vote->title }}??</a>
                        </h4>
                    </div>
                    <p class="text">{{ $post_vote->content }}</p>
                    <div class="tag">
                        @foreach($post_vote->postTags as $tag)
                        <span><a href="">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>
                    <div class="bottom-question">
                        <div class="bottom-question-l">
                            <div class="box-img">
                                <a href="{{ route('customer.detaiprofile', ['id' => $post_vote->user_id]) }}"><img src="{{ config('image.imgUser') . $post_vote->postUser->image }}" alt=""></a>
                            </div>
                            <div class="box-info">
                                <h4><a href="{{ route('customer.detaiprofile', ['id' => $post_vote->user_id]) }}">{{ $post_vote->postUser->full_name }}</a> <span class="bg-primary">Train</span></h4>
                                <p>
                                    <span>Asked on {{ formatDate($post_vote) }} in</span>
                                    @foreach( $post_vote->postCategories as $category)
                                        <span>
                                            <a href="{{ route('categories.detail', ['id' => $category->id]) }}">
                                                {{ $category->name }}
                                            </a>
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="bottom-question-r">
                            <p>
                                <i class="fa fa-comment"></i> 
                                {{ count($post_vote->postComments) }} <span class="hidden-mb">answers</span>
                            </p>
                            <p>
                                <i class="fa fa-eye"></i>
                                {{ $post_vote->view }} <span class="hidden-mb">views</span>
                            </p>
                            <p>
                                <i class="fa fa-star"></i> 
                                {{ count($post_vote->postVotes) }} <span class="hidden-mb">votes</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (params) {
            $(document).on('change', '#categories, #element-page', function() {
                var category_id = $('#categories').val();
                var element_page = $('#element-page').val();
                $.ajax({
                    url: "{{ route('posts.index') }}",
                    method: "GET",
                    data: { 
                        category_id : category_id,
                        element_page: element_page
                    },
                    success: function(res) {
                        $('#list-question').html(res);
                    }
                });
            });

            $(document).ajaxComplete(function() {
                $('.pagination li a').click(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.ajax({
                        url: url,
                        success: function(data) {
                            $('#list-question').html(data);
                        }
                    });
                });
            });
        });
    </script>
@endsection