@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    Category List
                </div>
                <div class="kt-subheader__toolbar">
                    <input type="text" name="search" class="search_categories form-control" data-url="{{ route('admin.category.search') }}" placeholder="search ...">
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
                    <div class="table_categories">
                        <table class="table text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = getSTTPage($categories) ?>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit' , ['id' => $category->id]) }}">
                                                <i class="fa fa-edit btn-delete"></i>
                                            </a>
                                            <a data-toggle="modal" href="#myModal{{$category->id}}">
                                                <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                                            </a>
                                            <div class="modal" id="myModal{{$category->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        You wan't to Delete it's
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">No!</button>
                                                        <a href="{{ route('admin.category.delete' , ['id' => $category->id]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Yes</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pag pag_banner">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/js/pages/search-categories.js') }}" type="text/javascript"></script>
@endpush