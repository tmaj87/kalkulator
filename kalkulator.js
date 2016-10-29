$(function () {
    $('#form').find('.buttons input').click(function () {
            $('#form').find('.buttons input').removeClass('btn-primary');
            this.classList.add('btn-primary');
        }
    );

    $('[data-toggle="popover"]').popover();

    $('a[data-toggle="popover"]').on("show.bs.popover", function () {
        $('.overlay').show();
    }).on("hide.bs.popover", function () {
        $('.overlay').hide();
    });
});
