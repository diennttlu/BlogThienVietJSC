 @extends('layouts.master')
 @section('title') Tag @endsection
@section('content')
<div class="box-content-mid">
    <div class="box-content-head">
        <h3><a href="{{ route('tag.show') }}">Tags</a></h3>
        <div class="form-search">
            <form class="form-group" action="{{ route('tag.show') }}" method="get">
                @csrf
                <input id="tag_search" type="text" name="search" data-url="{{ route('tag.search') }}" placeholder="Enter keywords..." autocomplete="off">
                <div id="TagList"></div>
                <button class="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="body-content-all ">
        <div class="box-tags">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Name</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Popular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tag-Post</a>
                </li>
                </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="list-tags-sort-ab">
                        <div class="item-tag">
                            @if(isset($tags))
                                @foreach ($tags as $tag)
                                    <ul>
                                        <li>
                                        <a href="javacript:void(0)" class="tag-id" data-id="{{ $tag['id'] }}" data-url="{{ route('tag.detail') }}">{{ $tag['name'] }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                            @if(isset($alltags))
                                @foreach($alltags as $key => $tags)
                                    <h4>{{ $key }}</h4>
                                    <ul>
                                        @foreach($tags as $tag)
                                            <li>
                                                <a href="javacript:void(0)" class="tag-id" data-id="{{ $tag['id'] }}" data-url="{{ route('tag.detail') }}">{{ $tag['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="list-tags-all">
                        <ul>
                            @foreach ($tags_popular as $tag_popular)
                                <li>
                                <a href="javacript:void(0)" data-id="{{ $tag_popular->id }}" data-url="{{ route('tag.detail') }}"class="tag-id">{{ $tag_popular->name }}</a>
                                    <span>x {{ $tag_popular->tag_posts_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div id="tag-detail"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/tag.js') }}"></script>
@endsection
