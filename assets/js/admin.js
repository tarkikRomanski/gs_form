(function( $ ){

    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',
        html: true
    });

    $('#gs_form_tabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $('.gspvi').focus(function() {
        console.log('dd');
        $( '#gs_form_preview_form' ).html( '<img style="max-width:100%;" src="'+$(this).attr('data-img')+'" >' );
    });

    $('#gs_form_main_color').colorpicker({
        horizontal: true
    });

    $('#gs_form_accent_color').colorpicker({
        horizontal: true
    });

})(jQuery);