@extends('layouts.master')
@section('title') Categories @endsection
@section('content')
    <div class="box-content-head">
        <h3>All Categories</h3>
        <div class="form-search">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Enter keywords...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="body-content-all ">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $categories_details != null ?  '' : 'active' }}" href="#profile" role="tab" data-toggle="tab">Name</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#references" role="tab" data-toggle="tab">Popular</a>
            </li>
            @if ($categories_details != null)
                <li class="nav-item">
                    <a class="nav-link active" href="#buzz"  role="tab" data-toggle="tab">Detail</a>
                </li>
            @endif
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane {{ $categories_details != null ?  '' : 'active' }}" id="profile">
                @foreach($categories as $key => $category)
                    <h4>{{$key}}</h4>
                    @foreach($category as $category_child)
                        <li>
                            <a href="#">{{$category_child['name']}}</a>
                        </li>
                    @endforeach
                @endforeach
            </div>
            <div role="tabpanel" class="tab-pane" id="references">
                @foreach($categories_populars as $category )
                    {{ $category->name }}
                @endforeach
            </div>
            @if ($categories_details != null)
                <div role="tabpanel" class="tab-pane active" id="buzz">
                    @foreach ($categories_details as $category)
                        {{ $category->name  }}
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection