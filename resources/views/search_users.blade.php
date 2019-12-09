@extends('layouts.master')
@section('content')
    <div class="box-content-head">
        <h3>Users</h3>
        <div class="form-search">
            <form action="{{ route('customer.search.user') }}" method="get" enctype="multipart/form-data">
                <input type="text" id="myInput" name="search" placeholder="Enter keywords...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="body-content-all ">
        <div class="box-users">
            <ul class="nav-links">
                <li ><a href="{{ route('customer.getlistuser') }}" class="active">Name</a></li>
                <li><a href="{{ route('customer.getlistuserpoint') }}">Points</a></li>
            </ul>
            <div class="list-users-sort-ab" id="showlist">
                <div class="group-users">
                    <ul>
                            @foreach( $users as $user)
                                <li class="item-user">
                                    <div class="box-img">
                                        <img src="{{ config('image.imgUser') . $user->image }}" alt="">
                                    </div>
                                    <div class="info-r">
                                        <h4 class="name">
                                            <a href="{{ route('customer.detaiprofile',$user->id) }}">{{$user->full_name }}</a>
                                        </h4>
                                        <p class="location"><i class="fa fa-map-marker"></i>  {{ $user->location }}</p>
                                        <p class="position bg-warning">
                                            @if( $user->point >0 && $user->point<1300 )
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

            </div>
        </div>
    </div>
@endsection