$(function () {

    // $('#form_tabs').find('a').click(function (e) {
    //     e.preventDefault()
    //     $('#form_tabs').find('li').removeClass('active');
    //     $(this).offsetParent().toggleClass('active');
    //     $('.form-group').hide();
    //     $('.form-group.' + $(this).attr('data-typ')).show();
    // })

    $('[data-toggle="popover"]').popover()


    $('#form').find('.buttons input').click(function () {
            $('#form').find('.buttons input').removeClass('btn-primary');
            this.classList.add('btn-primary');
        }
    )
})
