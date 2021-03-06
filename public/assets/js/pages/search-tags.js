$(document).ready(function() {
    var timeout = null;

    $(document).on('keyup', '#myInput', function() {
        clearTimeout(timeout);
        var search = $(this).val();
        var url = $(this).data('url');

        timeout = setTimeout(function() {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    keyword: search
                },
                success: function(data) {
                    $('.table_tags').html(data);
                }
            });
        }, 1000);
    });

    $(document).ajaxComplete(function() {
        $('.pagination li a').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function(data) {
                    $('.table_tags').html(data);
                }
            });
        });
    });
});