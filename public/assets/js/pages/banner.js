$(document).ready(function() {
    $(document).on('click', '.status-banner', function() {
        var $id  = $(this).data('id');
        var self = $(this);
        var url  = $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'Json',
            data: {
                'id': $id,
            },
            success: function (response) {
                if (response == 'active') {
                    self.removeClass('badge-danger').addClass('badge-success').text('active');
                    toastr.success('update status success!!');
                } else {
                    self.removeClass('badge-success').addClass('badge-danger').text('unactive');
                    toastr.success('update status success!!');
                }
            }
        })
    });

    $(document).ready(function() {
        $(document).on('click', '.btn_notificaiton_read', function() {
            var id = $(this).data('id');
            var url = $(this).data('url');

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
            });
        });
    });

    setTimeout(function(){
        $('.alert').slideToggle(1000);
    }, 2000);
});