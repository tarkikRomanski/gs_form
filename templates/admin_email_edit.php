<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<form method="post">
    <h2><?= __('Change your email text:', 'gs_form') ?></h2>

    <div class="form-group">
        <label for="gs_form_mail_text"><?= __('Your email text:', 'gs_form') ?></label>
    <textarea rows="15"
              id="gs_form_mail_text"
              name="gs_form_mail_text"
              class="form-control">
        <?= get_option('gs_form_email_message') ?>
    </textarea>
    </div>
    <button class="btn btn-outline-success" id="gs_form_send_mail_text_btn">
        <?= __('Change Email text', 'gs_form') ?>
    </button>
</form>