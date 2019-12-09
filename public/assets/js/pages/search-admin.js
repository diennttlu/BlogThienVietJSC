$(document).ready(function(){
    var timeout = null;
    $("#myInput").on("keyup", function() {
        clearTimeout(timeout);
        var search = $(this).val();
        var url = $(this).data('url');
        timeout = setTimeout(function () {
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    search: search
                },
                success: function (data) {
                    $("#myTable").html(data);
                }
            });
        }, 1000);
    })
    $(document).ajaxComplete(function() {
        $('.pagination li a').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success: function(data) {
                    $("#myTable").html(data);
                }
            });
        });
    });
});
