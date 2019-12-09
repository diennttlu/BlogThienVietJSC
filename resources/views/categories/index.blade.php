@extends('layouts.master')
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
        <ul class="nav nav-tabs nav-pills" role="tablist">
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
        <div class="tab-content mt-lg-2" >
            <div role="tabpanel" class="tab-pane {{ $categories_details != null ?  '' : 'active' }} categories_name" id="profile">
                @foreach($categories as $key => $category)
                    <h4>{{$key}}</h4>
                    <div class="row form-group">
                        @foreach($category as $category_child)
                        <div class="col-lg-3 form-group">
                            <a href="{{ route('categories.detail', ['id' => $category_child['id']])  }}">{{$category_child['name']}}</a>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div role="tabpanel" class="tab-pane categories_name" id="references">
                <div class="row form-group">
                    @foreach($categories_populars as $category )
                    <div class="col-lg-3 form-group">
                        <a href="{{ route('categories.detail', ['id' => $category->id])  }}">{{ $category->name }} </a>
                    </div>
                    @endforeach
                </div>

            </div>
            @if ($categories_details != null)
                <div role="tabpanel" class="tab-pane active categories_name" id="buzz">
                    <div class="row form-group">
                        @foreach ($categories_details as $category)
                            <div class="col-lg-3 form-group">
                                <a href="{{ route('categories.detail', ['id' => $category->id])  }}">
                                    {{ $category->name  }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection