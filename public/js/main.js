$(document).ready(function () {

    $('.show-author').click(function () {
        $('#add-author').show();
    });

    $('.show-book').click(function () {
        $('#add-book').show();
    });

    $('.delete-author').click(function () {
        doAjax($(this).attr('author'), $(this).attr('token'), "/library/delete/author");
    });

    $('.delete-book').click(function () {
        doAjax($(this).attr('book'), $(this).attr('token'), "/library/delete/book");
    });

    function doAjax(subject, token, link) {
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                "_token": token,
                "deleteSubject": subject
            },
            success: function (data) {
                if (data.result) {
                    window.location.reload();
                } else {
                    alert("Sorry, something going wrong");
                }
            }, error: function (data) {
                alert("Sorry, something going wrong");
                console.log(data);
            }
        });
    }
});