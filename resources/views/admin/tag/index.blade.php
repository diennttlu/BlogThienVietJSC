@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h4>All Tag</h4>
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session('success') }}
                </div>
            @endif
            <div class="row">
                <input class="form-group" id="myInput" type="text" placeholder="Search.." data-url="{{ route('admin.tag_search') }}">
                <div class="table_tags col-lg-12">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = getSTTPage($tags); ?>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $tag['name'] }}</td>
                                    <td>
                                        <a href="{{ route('admin.tag_edit' , ['id' => $tag['id']]) }}">
                                                <i class="fa fa-edit btn-delete"></i>
                                        </a>
                                        <a data-toggle="modal"  data-target="#myModalTag">
                                            <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                                        </a>
                                        <div class="modal" id="myModalTag">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        You wan't to Delete it's
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">No!</button>
                                                        <a href="{{ route('admin.tag_detele' , ['id' =>$tag['id'] ]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="position:fixed;bottom:35px;">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/pages/search-tags.js') }}" type="text/javascript"></script>
@endpush