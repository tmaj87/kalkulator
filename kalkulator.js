$(function () {

    $('#form_tabs a').click(function (e) {
        e.preventDefault()
        $('#form_tabs li').removeClass('active');
        $(this).offsetParent().toggleClass('active');
        $('.form-group').hide();
        $('.form-group.' + $(this).attr('data-typ')).show();
    })

    $('[data-toggle="popover"]').popover()
})
