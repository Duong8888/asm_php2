$(document).ready(function () {
    $('#search-table').keyup(function () {
        jQuery.ajax({
            url: "./models/env.php",
            method: "post",
            data: {
                search: $('#search-table').val()
            }
        });
        $('.table-main').load('./models/search-data.php');
        $("#search-table").keypress(function (ev) {
            if ((ev.which && ev.which === 13) ||
                (ev.keyCode && ev.keyCode === 13)) {
                return false;
            } else {
                return true;
            }
        });
    });
});