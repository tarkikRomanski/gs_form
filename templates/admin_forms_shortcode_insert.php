<?php if ( ! defined( 'ABSPATH' ) ) exit ?>

<div id="gs_form_shortcode_modal_insert_block" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gs_form_shortcode_modal_insert_block" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2><?= __('Insert new section', 'gs_form') ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="gs_form_shortcode_insert_block">
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="gs_form_question"
                               data-toggle="tooltip"
                               title="<img src='<?= plugins_url( 'img/Question_full.png', __FILE__ ) ?>' >">
                            <?= __('Question', 'gs_form') ?>:
                        </label>
                        <input class="form-control" type="text" name="gs_form_question" id="gs_form_question">
                    </div>

                    <div class="form-group mt-3">
                        <label for="gs_form_question_subtitle"
                               data-toggle="tooltip"
                               title="<img src='<?= plugins_url( 'img/Question_subtitle.png', __FILE__ ) ?>' >">
                            <?= __('Question subtitle', 'gs_form') ?>:
                        </label>
                        <input class="form-control" type="text" name="gs_form_question_subtitle" id="gs_form_question_subtitle">
                    </div>

                    <div class="form-group mt-3">
                        <label for="gs_form_section_type"><?= __('Question type', 'gs_form') ?>:</label>
                        <select class="form-control" name="gs_form_section_type" id="gs_form_section_type">
                            <option value="radio-block" selected="selected"><?= __('Anceta', 'gs_form') ?></option>
                            <option value="text"><?= __('Text field', 'gs_form') ?></option>
                            <option value="plz"><?= __('Zip field', 'gs_form') ?></option>
                            <option value="select"><?= __('Select', 'gs_form') ?></option>
                            <option value="short_date"><?= __('Month & Day', 'gs_form') ?></option>
                            <option value="date"><?= __('Month, Day & Year', 'gs_form') ?></option>
                            <option value="short_date_year"><?= __('Month & Year', 'gs_form') ?></option>
                            <option value="ptext"><?= __('Postsection field', 'gs_form') ?></option>
                        </select>
                    </div>
                        <section id="gs_form_ansers_block_mult">
                            <div class="form-group mt-3">
                                <label data-toggle="tooltip"
                                       title="<img src='<?= plugins_url( 'img/Answer.png', __FILE__ ) ?>' >">
                                    <?= __('Enter answers', 'gs_form') ?>':
                                </label>
                                <input class="form-control gs_form_answer" type="text">
                            </div>
                            <button type="button" id="gs_form_add_new_answer_input" class="btn btn-info mt-1"><?= __('Add new answer', 'gs_form' ) ?>  <i class="fa fa-plus"></i></button>
                        </section>

                        <section id="gs_form_ansers_block_once">
                            <div class="form-group mt-3">
                                <label data-toggle="tooltip"
                                       title="<img src='<?= plugins_url( 'img/Placeholder.png', __FILE__ ) ?>' >">
                                    <?= __('Enter placeholder', 'gs_form') ?>:
                                </label>
                                <input class="form-control gs_form_answer" type="text">
                            </div>
                        </section>

                    <div class="form-group mt-3">
                        <label for="gs_form_button"
                               data-toggle="tooltip"
                               title="<img src='<?= plugins_url( 'img/Button_label.png', __FILE__ ) ?>' >">
                            <?= __('Button title', 'gs_form') ?>:
                        </label>
                        <input class="form-control" type="text" name="gs_form_button" id="gs_form_button">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="gs_form_insert_shortcode"
                            type="button"
                            class="btn btn-block btn-outline-primary"
                            data-dismiss="modal">
                        <?= __('Add question', 'gs_form') ?> <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>