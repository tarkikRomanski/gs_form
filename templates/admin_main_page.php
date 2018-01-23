<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="row col-xs-12">
<h1><?= __('Settings', 'gs_form') ?></h1>
<hr>
<form action="" method="post">
    <div class="form-group">
        <label for="gs_form_phone"><?= __('Your phone number', 'gs_form') ?>:</label>
        <input  class="form-control"
                type="text"
                id="gs_form_phone"
                name="gs_form_phone"
                value="<?= get_option('gs_form_phone') ?>">
    </div>
    <div class="form-group">
        <label for="gs_form_email"><?= __('Your Email', 'gs_form') ?>:</label>
        <input type="text"
               class="form-control"
               id="gs_form_email"
               name="gs_form_email"
               value="<?= get_option('gs_form_admin_email') ?>">
    </div>
    
    <div class="form-group">
        <label for="gs_form_language"><?= __( 'Choice interface language', 'gs_form' ) ?></label>
        <select name="gs_form_language" 
                id="gs_form_language"
                class="form-control">

            <option <?= ( get_option( 'gs_form_admin_locale' )=='de'?'selected="selected"':'' ) ?>
                    value="de">Deutsch</option>
            <option <?= ( get_option( 'gs_form_admin_locale' )=='ua'?'selected="selected"':'' ) ?>
                    value="ua">Українська</option>
            <option <?= ( get_option( 'gs_form_admin_locale' )=='ru'?'selected="selected"':'' ) ?>
                    value="ru">Русский</option>
            <option <?= ( get_option( 'gs_form_admin_locale' )=='en'?'selected="selected"':'' ) ?>
                    value="en">English</option>
            
        </select>
    </div>

    <hr>
    <h2><?= __('Customize color', 'gs_form') ?></h2>
    <div class="form-group">
        <lable for="gs_form_main_color"><?= __('Main color', 'gs_form') ?>:</lable>
        <input type="text" class="form-control" value="<?= get_option('gs_form_main_color') ?>" id="gs_form_main_color" name="gs_form_main_color">
    </div>
    <div class="form-group">
        <lable for="gs_form_accent_color"><?= __('Accent color', 'gs_form') ?>:</lable>
        <input type="text" class="form-control" value="<?= get_option('gs_form_accent_color') ?>" id="gs_form_accent_color" name="gs_form_accent_color">
    </div>
    <hr>
    <h2><?= __('Randomizer setting', 'gs_form') ?></h2>
    <div class="form-group">
        <label for="gs_form_rand_time"><?= __('Randomizer work time(ms)', 'gs_form') ?>:</label>
        <input class="form-control"
               type="number"
               id="gs_form_rand_time"
               name="gs_form_rand_time"
               value="<?= get_option('gs_form_rand_time') ?>">
    </div>
    <div class="form-group">
        <label for="gs_form_rand_time"><?= __('Randomizer selecting procent(%)', 'gs_form') ?>:</label>
        <input class="form-control"
               type="number"
               id="gs_form_rand_proc"
               name="gs_form_rand_proc"
               value="<?= get_option('gs_form_rand_proc') ?>">
    </div>
    <button type="submit" class="btn btn-success"><?= __('Edit', 'gs_form') ?></button>
</form>
</div>