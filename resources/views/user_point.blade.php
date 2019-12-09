@extends('layouts.master')
@section('title')User point@endsection
@section('content')
    <div class="body-content-all ">
        <div class="box-users">
            <ul class="nav-links">
                <li ><a href="{{ route('customer.getlistuser') }}">Name</a></li>
                <li ><a href="{{ route('customer.getlistuserpoint') }}" class="active">Points</a></li>
            </ul>
            <div class="list-users-all">
                <ul>
                    @foreach( $users as $user )
                    <li class="item-user">
                        <div class="box-img">
                            <img src="{{ config('image.imgUser') . $user->image }}" alt="">
                        </div>
                        <div class="info-r">
                            <h4 class="name">
                                <a href="{{ route('customer.detaiprofile',$user->id )}}">{{ $user->full_name }}</a>
                            </h4>
                            <p class="location"><i class="fa fa-map-marker"></i>  {{ $user->location }}</p>
                            <p class="position bg-warning">
                             @if( $user->point >0 && $user->point< 1300 )
                                 newbie
                             @else
                                professor
                             @endif
                            </p>
                            <p class="points">{{ $user->point }}</p>
                        </div>
                    </li>
                     @endforeach
                </ul>
            </div>
            <div class="text-center">{{ $users->links() }}</div>
        </div>
    </div>

@endsection