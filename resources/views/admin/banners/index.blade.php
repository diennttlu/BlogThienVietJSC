@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Banner List
                </div>
                <div class="kt-subheader__toolbar">
                    <a href="{{ route('admin.banner.create') }}" title="Create banner" class="btn btn-success btn-lg">Create banner</a>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session('success') }}
                        </div>
                    @endif
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = getSTTPage($banners) ?>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $banner->content }}</td>
                                    <td><img src="{{ asset('images/banners/' . $banner->image) }}" alt="image banner" style="max-width: 100%; max-height: 60px;"></td>
                                    <td> 
                                        @if($banner->status)
                                            <span class="badge badge-success status-banner" type="button" data-id="{{ $banner->id }}" data-url="{{ route('admin.banner.ajax') }}">active</span>
                                        @else
                                            <span class="badge badge-danger status-banner" type="button" data-id="{{ $banner->id }}" data-url="{{ route('admin.banner.ajax') }}">unactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banner.edit' , ['id' => $banner->id]) }}">
                                            <i class="fa fa-edit btn-delete"></i>
                                        </a>
                                        <a data-toggle="modal" href="#myModal{{$banner->id}}">
                                            <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                                        </a>
                                            <div class="modal" id="myModal{{$banner->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    Bạn có muốn xóa?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">Không</button>
                                                    <a href="{{ route('admin.banner.delete' , ['id' => $banner->id]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Có</a>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pag">
                        {{ $banners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection