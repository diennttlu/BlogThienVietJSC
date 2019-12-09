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
            <?php $i = ($posts->currentPage() - 1) * $posts->perPage() ?>
            @foreach ($posts as $post)
                <tr class="odd gradeX" align="center">
                    <td>{{ ++$i }}</td>
                    <td>{!! $post->title !!}</td>
                    <td>{!! $post->content !!}</td>
                    <td>
                        <a href="{{ route('admin_posts.edit', ['id' => $post->id]) }}" style="font-size: 18px;">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin_posts.destroy', ['id' => $post->id]) }}" style="font-size: 18px; color: red;">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach                        
        </tbody>
    </table>
</div>
<div class="row">
    {{ $posts->links() }}
</div>