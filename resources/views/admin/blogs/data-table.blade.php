<div class="row">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead class="thead-dark">
            <tr align="center">
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th colspan="2">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = getSTTPage($blogs); ?>
            @foreach ($blogs as $blog)
                <tr class="odd gradeX" align="center">
                    <td>{{ $i++ }}</td>
                    <td><img src="https://imgcomfort.com/Userfiles/Upload/images/illustration-geiranger.jpg" alt="" width="180" height="130"></td>
                    <td>{!! $blog->title !!}</td>
                    <td>{!! $blog->content !!}</td>
                    <td>
                        <a href="{{ route('blogs.edit' , ['id' => $blog->id]) }}">
                            <i class="fa fa-edit btn-delete"></i>
                        </a>
                        <a data-toggle="modal" href="#myModal{{$blog->id}}">
                            <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                        </a>
                        <div class="modal" id="myModal{{$blog->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body text-center">
                                    You wan't to Delete it's
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">No!</button>
                                    <a href="{{ route('blogs.destroy' , ['id' => $blog->id]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Yes</a>
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
<div class="row">
    {{ $blogs->links() }}
</div>