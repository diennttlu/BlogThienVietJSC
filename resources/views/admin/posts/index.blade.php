@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3>Post List</h3>
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="form-group" style="width: 100%">
                        <input type="text" id="search_user" name="search_user" placeholder="enter user search...." class="form-control"/>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
        </div>
        <div id="data-table" class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-row">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = getSTTPage($posts) ?>
                        @foreach ($posts as $post)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $i++ }}</td>
                                <td><a href="{{ route('admin_posts.show', ['id' => $post->id]) }}">{!! $post->title !!}</a></td>
                                <td>{!! $post->content !!}</td>
                                <td>
                                    <a href="{{ route('admin_posts.edit' , ['id' => $post->id]) }}">
                                        <i class="fa fa-edit btn-delete"></i>
                                    </a>
                                    <a data-toggle="modal" href="#myModal{{$post->id}}">
                                        <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                                    </a>
                                    <div class="modal" id="myModal{{$post->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body text-center">
                                                You wan't to Delete it's
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">No!</button>
                                                <a href="{{ route('admin_posts.destroy' , ['id' => $post->id]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Yes</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
            <div class="kt-row">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready (function() {
        $('#search_user').on('change', function() {
            var search_data = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('admin_posts.search') }}",
                method: "POST",
                data:{
                    search_data:search_data,
                    _token:_token
                },
                success: function(res) {
                    $('#data-table').html(res);
                }
            });
        });
    });
</script>
@endsection
