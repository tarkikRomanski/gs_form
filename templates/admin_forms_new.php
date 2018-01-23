<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<div class="container-fluid">
<div class="row col-xs-12">

<h1><?= __('Add new form', 'gs_form') ?></h1>
    <hr>
<form id="gs_form_new_form_form" class="col-12" action="" method="post">
	<div class="form-group mt-3">
		<label for="gs_form_title"
               data-toggle="tooltip"
               title="<img src='<?= plugins_url( '/img/Title.png', __FILE__ ) ?>' >">
            <?= __('Title', 'gs_form') ?>:
        </label>
		<input type="text" name="gs_form_title" class="form-control" id="gs_form_title">
	</div>

	<div class="form-group mt-3">
		<label for="gs_form_subtitle"
               data-toggle="tooltip"
               title="<img src='<?= plugins_url( 'img/Subtitle.png', __FILE__ ) ?>' >">
            <?= __('Subtitle', 'gs_form') ?>:
        </label>
		<input type="text" name="gs_form_subtitle" class="form-control" id="gs_form_subtitle">
	</div>

    <div class="checkbox">
        <label for="gs_form_navigation">
            <input type="checkbox"
                   checked="checked"
                   id="gs_form_navigation"
                   name="gs_form_navigation"> <?= __( 'Display navigation menu in form sections', 'gs_form' ) ?>
        </label>
    </div>

	<div class="row mb-3">
		<div class="col-sm-6">
			<?php require_once "admin_forms_shortcode_insert.php" ?>
		</div>
	</div>
    <hr>
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
	<h3><?= __('Content', 'gs_form') ?></h3>
	<section class="row mb-3"
             id="gs_form_content_block"
             style="display: flex; flex-flow: row wrap;">
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
	<button class="btn btn-success btn-block mt-3 fixed-bottom"><?= __('Add new form', 'gs_form') ?> <i class="fa fa-check"></i></button>
    <input type="hidden" id="gs_form_content" name="gs_form_content">
</form>
</div>
</div>
<?php require_once "admin_forms_script_section_shortcode.php" ?>
