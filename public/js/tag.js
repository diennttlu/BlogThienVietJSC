$(document).ready(function() {
    $(document).on('keyup', '#tag_search', function () {
        var $data = $('#tag_search').val();
        var $url = $('#tag_search').data('url');
        var $tag = $('#TagList');
        if($data != ""){
            $.ajax({
                url: $url,
                type: 'GET',
                dataType: 'html',
                data: {'keyword': $data},
                success: function (data2) {
                    if (data2 != "") {
                        $('#TagList').fadeIn();
                        $('#TagList').html(data2);
                    }
                }
            });
        }else{
            $('#TagList').fadeOut();
        }
    });

    $(document).on('click','.tag-id',function(){
        console.log('123123');
        var $id= $(this).data('id');
        var $url = $(this).data('url');
        $('#TagList').fadeOut();
        $.ajax({
            type:"get",
            url: $url,
            data:{ id: $id },
            success: function(data){
                $('#tag-detail').html(data);
                $('#pills-contact-tab').tab('show');
            }
        });
    });
    $('#tag_search').focusout(function(){
        $('#TagList').fadeOut();
    });
});