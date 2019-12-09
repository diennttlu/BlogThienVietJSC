@extends('admin.layouts.master')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3>Edit Blog</h3>
                </div>
            </div>
        </div>
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-lg-9" style="padding-bottom:50px">
                    @include('layouts.error')
                    @if( session('message_success') )
                        <div class="alert alert-success">
                            {{ session('message_success') }}
                        </div>
                    @endif
                    @if( session('message_error') )
                        <div class="alert alert-success">
                            {{ session('message_error') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="categories" class="form-control" data-role="tagsinput" value="
                            <?php 
                                foreach ( $blog->postCategories as $category ) {
                                    echo $category->name.",";
                                }
                            ?>
                            ">
                        </div>
                        <div class="form-group">
                            <label >Tag (max 5 tag)</label>
                            <input type="text" name="tags" class="form-control" data-role="tagsinput" value="
                                <?php 
                                    foreach ( $blog->postTags as $tag) {
                                        echo $tag->name.",";
                                    }
                                ?>
                            ">
                        </div>
                        
                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="title" rows="3" class="form-control">{{ $blog->title }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="content" name="content"  class="form-control ckeditor" rows="10" >{!! $blog->content !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" value="{{ $blog->image }}">
                        </div>
                       
                        <input type="submit" class="btn btn-default" value="Edit">
                        <input type="reset" class="btn btn-default" value="Refesh">
                    <form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <h3>Comments</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>ID</th>
                                <th>Content</th>
                                <th>User comment</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = getSTTPage($comments) ?>
                            @foreach ($comments as $comment)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $i++ }}</td>
                                    <td>{!! $comment->content !!}</td>
                                    <td>{!! $comment->commentUser->full_name !!}</td>
                                    <td>
                                        <a data-toggle="modal" href="#myModal{{$comment->id}}">
                                            <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                                        </a>
                                        <div class="modal" id="myModal{{$comment->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                </div>
                                                <div class="modal-body text-center">
                                                    You wan't to Delete it's
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">No!</button>
                                                    <a href="{{ route('admin.comments.destroy', ['id' => $comment->id]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Yes</a>
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
            </div>
            <div class="row">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection