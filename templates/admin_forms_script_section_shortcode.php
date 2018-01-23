<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<script>
	(function ( $ ) {

	    $('#gs_form_show_modal_insert_block').click(function () {
	        /**/
        });



        $('#gs_form_edit_form_form').submit(function (e) {

            var title = $('#gs_form_title').val();
            var subtitle = $('#gs_form_subtitle').val();
            var content = '';

            $('.gs_form_block').each(function () {

                var answears = '';
                if ($(this).find('.gs_form_block_mult').css('display') == 'block') {
                    $(this).find('.gs_form_block_mult').find('.gs_form_answer').each(function (index, element) {
                        console.log(index);
                        if (index == 0) {
                            answears += $(this).val();
                        } else {
                            answears = answears + '/' + $(this).val();
                        }
                    });
                } else {
                    answears = $(this).find('.gs_form_block_once')
                        .find('.gs_form_answer').val();
                }

                content += '[GS_FORM_SECTION type="'
                    + $(this).find('.gs_form_block_type').val()
                    + '" question="'
                    + $(this).find('.gs_form_block_question').val()
                    + '" subtitle="'
                    + $(this).find('.gs_form_block_subtitlequestion').val()
                    + '" button="'
                    + $(this).find('.gs_form_block_button').val()
                    + '" answears="'
                    + answears
                    + '"] ';
            });

            $('#gs_form_content').val(content);

            console.log(data);

        });
	    $('#gs_form_new_form_form').submit(function (e) {

            var title = $('#gs_form_title').val();
            var subtitle = $('#gs_form_subtitle').val();
            var content = '';

            $('.gs_form_block').each(function () {

                var answears = '';
                if ( $(this).find('.gs_form_block_mult').css('display') == 'block' ) {
                    $(this).find('.gs_form_block_mult').find('.gs_form_answer').each(function (index, element) {
                        console.log(index);
                        if (index == 0) {
                            answears += $(this).val();
                        } else {
                            answears = answears + '/' + $(this).val();
                        }
                    });
                } else if( $(this).find('.gs_form_block_once').css('display') == 'block' ) {
                    answears = $(this).find('.gs_form_block_once')
                        .find('.gs_form_answer').val();
                } else {
                    answears = '/';
                }

                content += '[GS_FORM_SECTION type="'
                    + $(this).find('.gs_form_block_type').val()
                    + '" question="'
                    + $(this).find('.gs_form_block_question').val()
                    + '" subtitle="'
                    + $(this).find('.gs_form_block_subtitlequestion').val()
                    + '" button="'
                    + $(this).find('.gs_form_block_button').val()
                    + '" answears="'
                    + answears
                    + '"] ';
            });

            $('#gs_form_content').val(content);

            console.log(data);

        });

        $('.gs_form_block_type').change(function(){
            parentBlock = $(this).parents('.gs_form_block');
            console.log( parentBlock );
            shwitcherOtherHolders( $( this ).val(), parentBlock );
        });

        $('.gs_form_block_add_new_answer').click(function(event) {
            parentBlock = $(this).parents('.gs_form_block');
            parentBlock.find('.gs_form_block_mult')
                .find('.form-group')
                .append(newAnswerInput);

            $('.gs_form_remove_answer_input').click(function(){
                $(this).parents('.input-group').remove();
            });
        });

        $('.gs_form_remove_answer_input').click(function(){
            $(this).parents('.input-group').remove();
        });

        $('.gs_form_remove_question').click(function(){
            $(this).parents('.gs_form_block').remove();
        });

        $('#gs_form_shortcode_insert_block').find('.input-group').each(function(){
            $(this).remove();
        });

        $('#gs_form_shortcode_insert_block').find('input').each(function(){
            $(this).val('');
        });

		$('#gs_form_ansers_block_once').hide('fast', function() {});

		$('#gs_form_section_type').change(function(){
			switch ($(this).val()) {
				case 'radio-block': case 'select':
					$('#gs_form_ansers_block_once').hide('400', function() {});
					$('#gs_form_ansers_block_mult').show('400', function() {});
					break;
                case 'short_date': case 'short_date_year': case 'date':
                    $('#gs_form_ansers_block_once').hide('400', function() {});
                    $('#gs_form_ansers_block_mult').hide('400', function() {});
                    break;
				default:
					$('#gs_form_ansers_block_once').show('400', function() {});
					$('#gs_form_ansers_block_mult').hide('400', function() {});
					break;
			}
		});

		var newAnswerInput = `
			<div class="input-group">
		      <span class="input-group-btn">
		        <button class="btn btn-danger gs_form_remove_answer_input" type="button"><i class="fa fa-minus"></i></button>
		      </span>
		      <input type="text" class="form-control gs_form_answer" placeholder="New answer">
		    </div>
		`;

			$('#gs_form_add_new_answer_input').click(function(){
				$('#gs_form_ansers_block_mult').find('.form-group')
					.append(newAnswerInput);

					$('.gs_form_remove_answer_input').click(function(){
						$(this).parents('.input-group').remove();
					});
			});

			$('#gs_form_insert_shortcode').click(function(){
				console.log('insert shortcode');
				var type = $('#gs_form_section_type').val(),
					question = $('#gs_form_question').val(),
					button = $('#gs_form_button').val(),
					subtitle = $('#gs_form_question_subtitle').val();

				console.log($('#gs_form_ansers_block_mult').css('display'));

				if ($('#gs_form_ansers_block_mult').css('display') == 'block') {
					var atribute = new Array();
					var atributeType = 1;
					$('#gs_form_ansers_block_mult').find('input').each(function(index, el) {
						atribute.push($(this).val());
					});

					console.log(atribute);
				} else if ($('#gs_form_ansers_block_once').css('display') == 'block') {
					var atributeType = 0;
					var atribute = $('#gs_form_ansers_block_once').find('input').val();
				} else {
				    var atributeType = 3;
                }

				var newBlock = questionBlock(question, subtitle, type, atribute, atributeType, button);

                $('#gs_form_content_block').append(newBlock);

                var newElement = $('#gs_form_content_block').find('.gs_form_block').last();

                newElement.find('.gs_form_block_type').change(function(){
					parentBlock = $( this ).parents('.gs_form_block');
                    shwitcherOtherHolders( $( this ).val(), parentBlock );
				});

                newElement.find('.gs_form_block_add_new_answer').click(function(event) {
					parentBlock = $(this).parents('.gs_form_block');
					parentBlock.find('.gs_form_block_mult')
						.find('.form-group')
						.append(newAnswerInput);

                    parentBlock.find('.gs_form_remove_answer_input').click(function(){
                        $(this).parents('.input-group').remove();
                    });
				});

                newElement.find('.gs_form_remove_answer_input').click(function(){
                    $(this).parents('.input-group').remove();
                });

                newElement.find('.gs_form_remove_question').click(function(){
					$(this).parents('.gs_form_block').remove();
				});

                $('#gs_form_shortcode_insert_block').find('.input-group').each(function(){
                    $(this).remove();
                });

                $('#gs_form_shortcode_insert_block').find('input').each(function(){
                    $(this).val('');
                });

			});


		var questionBlock = function (title, subtitle, type, atribute, atributeType, button){
				var answerInput = ``;
				if (atributeType == 0) {
					answerInput = `<input class="form-control gs_form_answer" value="`+atribute+`" type="text">`;	
				} else if ( atributeType == 1 ) {
					answerInput = ``;
					atribute.forEach( function(element, index) {
						if (index == 0) {
							answerInput += `<input class="form-control gs_form_answer" value="`+element+`" type="text">`;
						} else {
							answerInput += `<div class="input-group">
										      <span class="input-group-btn">
										        <button class="btn btn-danger gs_form_remove_answer_input" type="button"><i class="fa fa-minus"></i></button>
										      </span>
										      <input type="text" class="form-control gs_form_answer" placeholder="New answer" value="`+element+`">
										    </div>`;
						}
					});
				}

			return `
				<div class="col-lg-4 col-md-6 gs_form_block">
				<div class="card-block card card-outline-primary">
					<div class="form-group mt-3">
					<label><?= __('Question', 'gs_form') ?>:</label>
					<input class="form-control gs_form_block_question" value="`+title+`" type="text">
				</div>

				<div class="form-group mt-3">
					<label ><?= __('Question subtitle', 'gs_form') ?>:</label>
					<input class="form-control gs_form_block_subtitlequestion" value="`+subtitle+`" type="text">
				</div>
				<div class="form-group mt-3">
					<label ><?= __('Question type','gs_form') ?>:</label>
					<select class="form-control gs_form_block_type">
						<option value="radio-block" `
							+ ((type=='radio-block')?`selected="selected"`:``) +
						`><?= __('Anceta','gs_form') ?></option>
						<option value="text" `
							+ ((type=='text')?`selected="selected"`:``) +
						`><?= __('Text field','gs_form') ?></option>
						<option value="plz" `
                            + ((type=='plz')?`selected="selected"`:``) +
                        `><?= __('Zip field','gs_form') ?></option>
						<option value="select" `
							+ ((type=='select')?`selected="selected"`:``) +
						`><?= __('Select','gs_form') ?></option>
						<option value="short_date" `
                        + ((type=='short_date')?`selected="selected"`:``) +
                        `><?= __('Month & Day','gs_form') ?></option>
                        <option value="short_date_year" `
                        + ((type=='short_date_year')?`selected="selected"`:``) +
                        `><?= __('Month & Year','gs_form') ?></option>
                        <option value="date" `
                        + ((type=='date')?`selected="selected"`:``) +
                        `><?= __('Month, Day & Year','gs_form') ?></option>
                        <option value="ptext" `
                        + ((type=='ptext')?`selected="selected"`:``) +
                        `><?= __('Postsection field','gs_form') ?></option>
					</select>
				</div>

					<section class="gs_form_block_mult" `+(atributeType==1?`style="display:block"`:`style="display:none"`)+`>		
						<div class="form-group mt-3">
							<label><?= __('Enter answers','gs_form') ?>:</label>
							`+answerInput+`		
						</div>
						<button type="button" class="btn btn-info mt-1 gs_form_block_add_new_answer"><?= __('Add new answer','gs_form') ?> <i class="fa fa-plus"></i></button>
					</section>

					<section class="gs_form_block_once" `+(atributeType==0?`style="display:block"`:`style="display:none"`)+`>		
						<div class="form-group mt-3">
							<label><?= __('Enter placeholder','gs_form') ?>:</label>
							`+(atributeType==0?answerInput:`<input class="form-control gs_form_answer" type="text">`)+`	
						</div>
					</section>

				<div class="form-group mt-3">
					<label><?= __('Button title','gs_form') ?>:</label>
					<input class="form-control gs_form_block_button"  value="`+button+`" type="text">
				</div>
				<button type="button" class="btn btn-block btn-danger gs_form_remove_question"><?= __('Delete','gs_form') ?> <i class="fa fa-trash"></i></button>
				</div>
				</div>
			`;
		}

		var shwitcherOtherHolders = function ( value, parent ) {
            switch ( value ) {
                case 'radio-block': case 'select':
                    parent.find('.gs_form_block_once').hide('400', function() {});
                    parent.find('.gs_form_block_mult').show('400', function() {});
                    break;
                case 'short_date': case 'short_date_year': case 'date':
                    parent.find('.gs_form_block_once').hide('400', function() {});
                    parent.find('.gs_form_block_mult').hide('400', function() {});
                    break;
                default:
                    parent.find('.gs_form_block_once').show('400', function() {});
                    parent.find('.gs_form_block_mult').hide('400', function() {});
                    break;
            }
        }

	})(jQuery);
</script>