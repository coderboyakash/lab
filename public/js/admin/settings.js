  
(function($){

    "use strict";
    
    //active
    $('#settings').addClass('active');

    //select2
    $('.select2').select2();

    //Colorpicker for email header
    $('#header_color').colorpicker();
    
    $('#header_color').on('colorpickerChange', function(event) {
            $('.header_color .fa-square').css('color', event.color.toString());
    });


    //Colorpicker for email footer
    $('#footer_color').colorpicker();
    
    $('#footer_color').on('colorpickerChange', function(event) {
            $('.footer_color .fa-square').css('color', event.color.toString());
    });

    $('form').each(function () {
        if ($(this).data('validator'))
            $(this).data('validator').settings.ignore = ".note-editor *";
    });

    // Summernote
    $('.summernote').summernote({
        heigt:400,
        tooltip: false,
        dialogsFade: true,
        toolbar: []
    });

    $('#report_footer').summernote({
        heigt:400,
        tooltip: false,
        dialogsFade: true,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

})(jQuery);
 