(function( $ ){

$('.gs_form').submit(function(event) {
    event.preventDefault();
});

$('.gs_form_min5').keyup(function() {
    formId = $(this).parents('.gs_form').attr('data-form-id');
    formIteration = $(this).parents('.gs_form').attr('data-form-iteration');
    if ($(this).val().length >= 5) {
        console.log( $('.gs_form[data-form-id="'+formId+'"]')
            .find('[data-step="'+formIteration+'"]')
            .find('.gs_form_button').html());
        $('.gs_form[data-form-id="'+formId+'"]')
            .find('[data-step="'+formIteration+'"]')
            .find('.gs_form_button')
            .removeAttr('disabled');
    } else {
        attr =  $('.gs_form[data-form-id="'+formId+'"]')
                    .find('[data-step="'+formIteration+'"]')
                    .find('.gs_form_button')
                    .attr('disabled');
        if (attr != 'disabled') {
            $('.gs_form[data-form-id="'+formId+'"]')
                .find('[data-step="'+formIteration+'"]')
                .find('.gs_form_button')
                .attr('disabled', 'disabled');
        }
    }
});

$('.gs_form_input_number').keypress(function (e) {
    e = e || event;

    if (e.ctrlKey || e.altKey || e.metaKey) return;

    var chr = getChar(e);

    if (chr == null) return;

    if (chr < '0' || chr > '9') {
        return false;
    }
});
$('.gs_form_input_string').keypress(function (e) {
        e = e || event;

        if (e.ctrlKey || e.altKey || e.metaKey) return;

        var chr = getChar(e);

        if (chr == null) return;

        if (chr >= '0' && chr <= '9') {
            return false;
        }
    });
    function getChar(event) {
        if (event.which == null) {
            if (event.keyCode < 32) return null;
            return String.fromCharCode(event.keyCode) // IE
        }

        if (event.which != 0 && event.charCode != 0) {
            if (event.which < 32) return null;
            return String.fromCharCode(event.which) // остальные
        }

        return null; // специальная клавиша
    }

$('[type="radio"]').change(function(){
    $(this).parents('.gs_form_section').find('.gs_form_button').removeAttr('disabled');
});

$('select').change(function(){
    $(this).parents('.gs_form_section').find('.gs_form_button').removeAttr('disabled');
});

$('.gs_form').each(function(formindex, form) {
        $(this).attr('data-form-id', formindex + 1)
            .attr('data-form-iteration', 1)
            .find('.gs_form_section')
            .each(function (index, el) {
                if (index === 0) {
                    $(this).addClass('gs_form_show');
                }
                $(this).attr('data-step', index + 1);
            });
    });

$( '.gs_form_type_3' ).each( function(){
    var sectionCount = $( this ).find( '.gs_form_section' ).length;
    if( sectionCount > 3 ) {
        $(this).find('.gs_form_section')
            .each(function (index, el) {
                var gs_form = $(this).parents('.gs_form');
                var gs_form_section_nav_item = '<div class="gs_form_section_navigation_item" data-nav="' + ( index + 1 ) + '"></div>';
                if (( index + 1 ) < sectionCount - 1)
                    gs_form.find('.gs_form_section_navigation')
                        .append(gs_form_section_nav_item);

                if (index === 0) {
                    gs_form.find('.gs_form_section_navigation_item')
                        .addClass('active');
                }
            });

        $('.gs_form_section_navigation_item').click(function () {
            var gs_form = $(this).parents('.gs_form');
            var position = $(this).attr('data-nav') * 1;
            gs_form.attr('data-form-iteration', position)
            gs_form.find('.gs_form_section_navigation_item')
                .each(function (index, el) {
                    if (index < position) {
                        $(this).addClass('active');
                        gs_form.find('.gs_form_show')
                            .removeClass('gs_form_show');
                        gs_form.find('[data-step="' + position + '"]')
                            .addClass('gs_form_show');
                    } else {
                        $(this).removeClass('active');
                    }
                });
        });
    }
} );

$('.gs_form_next_step').click(function () {
    var formContainer = $(this).parents('.gs_form');
    var formSection = $(this).parents('.gs_form_section');
    var gs_valid = true;
    formSection.find('.gs_form_input_email')
        .each(function(){
            if( !validateEmail( $(this).val() ) ){
                $( this ).focus();
                gs_valid = false;
            }
    });

    if ( !gs_valid )
        return false;

    var gs_form_step = formContainer.attr( 'data-form-iteration' );
    formContainer.find( '.gs_form_section_navigation_item' )
        .each( function( index, el ){
            if ( index <= gs_form_step) {
                console.log(index <= gs_form_step)
                console.log('Index: '+index);
                console.log('Step:'+gs_form_step);
                $( this ).addClass('active');
            } else {
                $( this ).removeClass('active');
            }
        } );

        if($(this).hasClass('gs_form_end') ){
            // Если обрабативается форма 3го типа
            if (formContainer.hasClass('gs_form_type_3')) {
                //Обработка анкеты
                anceta = '[';
                formContainer
                    .find('.gs_form_anceta_input')
                    .each(function(){
                        if(typeof $(this).val() !== typeof undefined)
                        {
                            anceta += '{"title":"'
                                + $(this).parents( '.gs_form_section' ).find('h2').html()
                                + '", "answear":"'
                                + $(this).val()
                                + '"},';
                        }
                    });
                anceta += '{}]';

                console.log('anceta:');
                console.log(anceta);

                var gs_form_data = {
                    action: 'gs_form_action',
                    gs_name: formContainer.find('.gs_form_input_name').val(),
                    gs_lastname: formContainer.find('.gs_form_input_lastname').val(),
                    gs_number: formContainer.find('.gs_form_input_number').val(),
                    gs_email: formContainer.find('.gs_form_input_email').val(),
                    gs_plz: '',
                    gs_anceta: anceta
                }
            }
            // Если обрабативается форма 1го типа
            if (formContainer.hasClass('gs_form_type_1')){
                var gs_form_data = {
                    action: 'gs_form_action',
                    gs_name: formContainer.find('.gs_form_input_name').val(),
                    gs_lastname: formContainer.find('.gs_form_input_lastname').val(),
                    gs_number: formContainer.find('.gs_form_input_number').val(),
                    gs_email: formContainer.find('.gs_form_input_email').val(),
                    gs_plz: $('#gs_form_plz_num').val(),
                    gs_anceta: 'false'
                }
            }
            //Если обрабативается форма 2го типа
            if (formContainer.hasClass('gs_form_type_2')){
                var anceta = '[{ "title":"'+$('[for="beschreibe"]').html()+'", "answear":"'+$('#beschreibe').val()+'" }]';
                console.log($('#gs_form_plz_num').val());
                var gs_form_data = {
                    action: 'gs_form_action',
                    gs_name: formContainer.find('.gs_form_input_name').val(),
                    gs_lastname: formContainer.find('.gs_form_input_lastname').val(),
                    gs_number: formContainer.find('.gs_form_input_number').val(),
                    gs_email: formContainer.find('.gs_form_input_email').val(),
                    gs_plz: '',
                    gs_anceta: anceta
                }
            }
            $.ajax({
                url: gsajax.url,
                data: gs_form_data,
                method: 'post',
                success: function(data){
                    console.log(data);
                }
            });
        }

        gs_form_goToNextStep(formContainer);

        if(formContainer.find('[data-step="'+(gs_form_step*1+1)+'"]').hasClass('gs_form_randomaider')){
            gs_form_startLawyercounter($('#gs_form_rand_time').val(), $('#gs_form_rand_proc').val(), formContainer);
        }
    });

var gs_form_goToNextStep = function(form){
        form.attr('data-form-iteration', form.attr('data-form-iteration')*1 + 1);
        gs_form_step = form.attr('data-form-iteration');

        if(form.hasClass('gs_form_type_2')){
            form.find('.gs_form_steps_progress__line.line-'+gs_form_step).addClass('gs_form_steps_active');
            form.find('.gs_form_progress-circle-'+gs_form_step).addClass('gs_form_steps_active');
            form.find('.gs_form_steps_progress__label.label-'+gs_form_step).addClass('gs_form_steps_active');
        }

        form.find('.gs_form_show').removeClass('gs_form_show');
        form.find('[data-step="'+gs_form_step+'"]').addClass('gs_form_show');
        if( $( '.gs_form_show' ).hasClass( 'gs_static' ) )
            form.find( '.gs_form_section_navigation' ).hide();


        form.find('.gs_form_show').find('.gs_form_required')
            .keyup(function() {
                gs_form_required = true;

                form.find('.gs_form_show')
                    .find('.gs_form_required')
                    .each(function() {
                        if($(this).val().length == 0){
                            attr = form.find('.gs_form_show').find('.gs_form_button').attr('disabled');
                            if (attr != 'disabled') {
                                form.find('.gs_form_show').find('.gs_form_button').attr('disabled', 'disabled');
                            }
                            gs_form_required = false;
                        }
                    });
                if(gs_form_required)
                    form.find('.gs_form_show').find('.gs_form_button').removeAttr('disabled');
            });
    };

var gs_form_startLawyercounter = function(time, proc, form){
        var gs_form_interval = setInterval(function(){
            var rand = Math.random();
            if (rand <= (proc/100)) {
                $('#gs_form_lawyercounter').html($('#gs_form_lawyercounter').html()*1 + 1);
            }
        }, 50);

        setTimeout(function(){
            clearInterval(gs_form_interval);
            $('#gs_form_lawyercount').html($('#gs_form_lawyercounter').html());
            gs_form_goToNextStep(form);
        }, time);
    };

$('textarea.gs_form_required').keyup(function(event) {
    var formContainer = $(this).parents('.gs_form');
    var gs_form_step = formContainer.attr('data-form-iteration');
    if ($(this).html == ''){
        attr = formContainer.find('[data-step="'+gs_form_step+'"]')
            .find('.gs_form_button')
            .attr('disabled');
        if (attr != 'disabled') {
            formContainer.find('[data-step="'+gs_form_step+'"]')
                .find('.gs_form_button')
                .attr('disabled', 'disabled');
        }
    } else {
        formContainer.find('[data-step="'+gs_form_step+'"]')
            .find('.gs_form_button')
            .removeAttr('disabled');
    }
});

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

})(jQuery);