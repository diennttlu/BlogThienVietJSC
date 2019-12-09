@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3>Welcome to ThienVietjsc'Blog Admin</h3>
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                        <a href="{{ route('admin.tag_get') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">Tags</h5>
                                    <p class="card-text">Quantity: {{ $tags->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                        <a href="{{ route('posts.list_post') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">Posts</h5>
                                    <p class="card-text">Quantity: {{ $posts->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                        <a href="{{ route('blogs.list_blog') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">Blogs</h5>
                                    <p class="card-text">Quantity: {{ $blogs->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                        <a href="{{ route('admin.category') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">Category</h5>
                                    <p class="card-text">Quantity: {{ $categories->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                        <a href="{{ route('admin.contact_show') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">Contacts</h5>
                                    <p class="card-text">Quantity: {{ $contacts->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
                <div class="col-lg-3 item">
                    <div class="card">
                        <img src="{{ asset('images/img/background-dashboard.jpg') }}" alt="">
                    <a href="{{ route('admin.account_list') }}">
                            <span>
                                <div class="card-body">
                                    <h5 class="card-title">User</h5>
                                    <p class="card-text">Quantity: {{ $users->count() }}</p>
                                </div>
                            </span>
                        </a>
                        <div class="cover"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection