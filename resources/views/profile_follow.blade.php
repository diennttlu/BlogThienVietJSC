@extends('layouts.master')
@section('content')
    <div class="box-content-head">
        <h3><span>{{ $users->full_name }}</span> Profile</h3>
    </div>
    <div class="box-profile">
        <div class="box-info-head">
            <div class="box-img">
                <img src="<?php __DIR__?>./images/icon/{{ $users->image }}" height="256" width="256" alt="">
            </div>
            <div class="box-name-address">
                <h3>{{ $users->full_name }}</h3>
                <p><i class="fa fa-map-marker"></i> <span>{{ $users->location }}</span></p>
                @if( $users->email_public==1 )
                    <p><i class="fa fa-envelope-o"></i> <span>{{ $users->email }}</span></p>
                @endif
            </div>
            <div class="accumulation">
                <p class="position bg-warning">
                    @if( $users->point >0 && $users->point<1300 )
                        newbie
                    @else
                        professor
                    @endif
                </p>
                <p class="number-star">{{ $users->point }} <span><i class="fa fa-star"></i></span></p>
                <p>Points</p>
            </div>
            <div class="box-btn">
                @if( Auth::check() )
                    @if( Auth::user()->id == $users->id )
                        <button data-toggle="modal" data-target="#edit-info"><i class="fa fa-pencil"></i> Edit</button>
                    @endif
                @endif
            </div>
        </div>
        <div class="detail-profile">
            <ul class="nav-links">
                <li ><a href="{{ route('customer.profile',$users->id) }}" id="question">Questions <span>{{ count($users->userPosts) }}</span></a></li>
                <li><a href="{{ route('Customer.follow',$users->id) }}" class="active" id="follow" >Following <span></span></a></li>
            </ul>
            <div class="list-questions" id="list">
                @foreach($users->follows as $user)
                    @if($user->role==1)
                        <div class="item-question">
                            <div class="bottom-question">
                                <div class="bottom-question-l">
                                    <div class="box-img">
                                        <img src="<?php __DIR__?>{{ config('image.imgUser') . $user->image }}" height="40px" width="40px" alt="">
                                    </div>
                                    <div class="box-info">
                                        <h4><a href="{{ route('customer.detaiprofile',$user->id) }}">{{ $user->full_name }} </a> <span class="bg-primary">Train</span></h4>
                                        <p>
                                            <span>{{ $user->created_at->format('d/m/y') }}</span>
                                            <span><a href="">Business</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection