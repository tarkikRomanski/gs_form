<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<div class="container-fluid">
    <div class="row col-xs-12">
        <h1><?= __('Edit form', 'gs_form') ?> "<?= $old_data->title ?>"</h1>
            <hr>

		<form id="gs_form_edit_form_form" action="" method="post">
            <div class="form-group mt-3">
                <label for="gs_form_title"><?= __('Title', 'gs_form') ?>:</label>
                <input type="text" name="gs_form_title" class="form-control" id="gs_form_title" value="<?= $old_data->title ?>">
            </div>

            <div class="form-group mt-3">
                <label for="gs_form_subtitle"><?= __('Subtitle', 'gs_form') ?>:</label>
                <input type="text"
                       name="gs_form_subtitle"
                       class="form-control"
                       id="gs_form_subtitle"
                       value="<?= $old_data->subtitle ?>">
            </div>
            <div class="checkbox">
                <label for="gs_form_navigation">
                    <input type="checkbox"
                           <?= strpos( $old_data->shortcode, 'navigation' )===false?'checked="checked"':'' ?>
                           id="gs_form_navigation"
                           name="gs_form_navigation"> <?= __( 'Display navigation menu in form sections', 'gs_form' ) ?>
                </label>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <button type="button"
                            class="btn btn-block btn-primary"
                            id="gs_form_show_modal_insert_block"
                            data-toggle="modal"
                            data-target="#gs_form_shortcode_modal_insert_block"
                            data-whatever="@getbootstrap">
                        <?= __('Add question', 'gs_form') ?>
                    </button>
                </div>
            </div>

            <hr>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <?php require_once "admin_forms_shortcode_insert.php" ?>
                </div>
            </div>
            <hr>
            <h3><?= __('Content', 'gs_form') ?></h3>
            <section class="row mb-3"
                     id="gs_form_content_block"
                     style="display: flex; flex-flow: row wrap;">
                <?php foreach ($forms_content_array as $k=>$item): ?>
                <div class="col-lg-4 col-md-6 gs_form_block">
                    <div class="card-block card card-outline-primary">
                    <div class="form-group mt-3">
                        <label><?= __('Question', 'gs_form') ?>:</label>
                        <input class="form-control gs_form_block_question" value="<?= $item[1] ?>" type="text">
                    </div>

                    <div class="form-group mt-3">
                        <label for="gs_form_question_subtitle"><?= __('Question subtitle', 'gs_form') ?>:</label>
                        <input class="form-control gs_form_block_subtitlequestion" value="<?= $item[2] ?>" type="text">
                    </div>
                    <div class="form-group mt-3">
                        <label for="gs_form_section_type"><?= __('Question type', 'gs_form') ?>:</label>
                        <select class="form-control gs_form_block_type">
                            <option value="radio-block"
                                    <?= ($item[0]=='radio-block'?'selected="selected"':'') ?>
                                    ><?= __('Anceta', 'gs_form') ?></option>
                            <option value="text"
                                    <?= ($item[0]=='text'?'selected="selected"':'') ?>
                                    ><?= __('Text field', 'gs_form') ?></option>
                            <option value="plz"
                                <?= ($item[0]=='plz'?'selected="selected"':'') ?>
                            ><?= __('Zip field', 'gs_form') ?></option>
                            <option value="select"
                                    <?= ($item[0]=='select'?'selected="selected"':'') ?>
                                    > <?= __('Select', 'gs_form') ?></option>
                            <option value="short_date"
                                    <?= ($item[0]=='short_date'?'selected="selected"':'') ?>
                                    ><?= __('Month & Day', 'gs_form') ?></option>
                            <option value="short_date_year"
                                <?= ($item[0]=='short_date_year'?'selected="selected"':'') ?>
                            ><?= __('Month & Year', 'gs_form') ?></option>
                            <option value="date"
                                    <?= ($item[0]=='date'?'selected="selected"':'') ?>
                                    ><?= __('Month, Day & Year', 'gs_form') ?></option>
                            <option value="ptext"
                                    <?= ($item[0]=='ptext'?'selected="selected"':'') ?>
                                    ><?= __('Postsection field', 'gs_form') ?></option>
                        </select>
                    </div>

                    <section class="gs_form_block_mult"
                        <?=($item[0]=='radio-block' || $item[0]=='select')
                                ?'style="display:block"'
                                :'style="display:none"' ?>>
                        <div class="form-group mt-3">
                            <label><?= __('Enter answers', 'gs_form') ?>:</label>
                            <?php if($item[0]=='radio-block' || $item[0]=='select'): ?>
                                <?php $answers = explode('/',$item[4]); ?>
                                <?php foreach ($answers as $k=>$answer): ?>

                                    <?php if ($k == 0): ?>
                                    <input class="form-control gs_form_answer" value="<?=$answer?>" type="text">
                                   <?php else: ?>
                                   <div class="input-group">
                                      <span class="input-group-btn">
                                        <button class="btn btn-danger gs_form_remove_answer_input" type="button"><i class="fa fa-minus"></i></button>
                                      </span>
                                        <input type="text" class="form-control gs_form_answer" placeholder="New answer" value="<?=$answer?>">
                                    </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                        <button type="button" class="btn btn-info mt-1 gs_form_block_add_new_answer"><?= __('Add new answer', 'gs_form') ?>  <i class="fa fa-plus"></i></button>
                    </section>

                    <section class="gs_form_block_once"
                        <?=($item[0]=='text')?'style="display:block"':'style="display:none"' ?>>
                        <div class="form-group mt-3">
                            <label><?= __('Enter placeholder', 'gs_form') ?>:</label>
                            <?php if($item[0]=='text'): ?>
                                <input class="form-control gs_form_answer" value="<?=$item[4]?>"  type="text">
                            <?php else: ?>
                                <input class="form-control gs_form_answer" type="text">
                            <?php endif; ?>
                        </div>
                    </section>

                    <div class="form-group mt-3">
                        <label for="gs_form_button"><?= __('Button title', 'gs_form') ?>:</label>
                        <input class="form-control gs_form_block_button"  value="<?= $item[3] ?>" type="text">
                    </div>
                    <button type="button" class="btn btn-block btn-danger gs_form_remove_question"><?= __('Delete', 'gs_form') ?> <i class="fa fa-trash"></i></button>
                    </div>
                    </div>
                <?php endforeach; ?>

            </section>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <button type="button"
                            class="btn btn-block btn-primary mb-3"
                            id="gs_form_show_modal_insert_block_2"
                            data-toggle="modal"
                            data-target="#gs_form_shortcode_modal_insert_block"
                            data-whatever="@getbootstrap">
                        <?= __('Add question', 'gs_form') ?>
                    </button>
                </div>
            </div>
            <hr>
            <button class="btn btn-success btn-block mt-3 fixed-bottom"><?= __('Edit this form', 'gs_form') ?> <i class="fa fa-pencil"></i></button>
            <input type="hidden" id="gs_form_content" name="gs_form_content">
        </form>
    </div>
</div>
<?php require_once "admin_forms_script_section_shortcode.php" ?>