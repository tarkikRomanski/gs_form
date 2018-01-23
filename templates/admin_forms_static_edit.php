<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="col-xs-12" id="gs_form_tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#form1"
               aria-controls="form1"
               role="tab"
               data-toggle="tab">
                Static form 1
            </a>
        </li>
        <li role="presentation">
            <a href="#form2"
               aria-controls="form2"
               role="tab"
               data-toggle="tab">
                Static form 2
            </a>
        </li>
    </ul>

    <div class="row">
        <div class="col-sm-8">
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="form1">

                    <?php require_once 'admin_forms_1_edit.php' ?>

                </div>
                <div role="tabpanel" class="tab-pane" id="form2">

                    <?php require_once 'admin_forms_2_edit.php' ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div id="gs_form_preview_form"></div>
        </div>
    </div>
</div>