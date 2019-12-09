$(document).ready(function() {
    $(document).on('click', '.btn_notificaiton_read', function() {
        var id = $(this).data('id');
        var url = $('.btn_notification_read').data('url');
        $.ajax({
            url: url,
            type: 'GET',
            data: {id: id}
        });
    });

    setTimeout(function(){
        $('.alert').slideToggle(1000);
    }, 2000);
});