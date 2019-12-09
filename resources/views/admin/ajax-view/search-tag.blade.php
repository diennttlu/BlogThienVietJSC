<div class="table_tags">
        <table class="table">
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
                            <a data-toggle="modal" href="#myModal{{ $tag['id'] }}">
                                <i class="fa fa-trash btn-delete" aria-hidden="true"></i>
                            </a>
                            <div class="modal" id="myModal{{ $tag['id'] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body text-center">
                                            Bạn có muốn xóa?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" style="width:80px; border-radius: 5px">Không</button>
                                            <a href="{{ route('admin.tag_detele' , ['id' =>$tag['id'] ]) }}" class="btn btn-danger" style="width:80px; border-radius: 5px">Có</a>
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