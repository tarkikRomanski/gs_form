<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<h1><?= __('Questionnaires list', 'gs_form') ?>:</h1>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <td><?= __('Name', 'gs_form') ?></td>
            <td><?= __('Lastname', 'gs_form') ?></td>
            <td><?= __('Email', 'gs_form') ?></td>
            <td><?= __('Phone', 'gs_form') ?></td>
            <td style="width: 80px;"><?= __('Index', 'gs_form') ?></td>
            <td style="width: 25px;"></td>
            <td style="width: 25px;"></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $user): ?>
            <tr>
                <td><?= $user->name ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->phone_number ?></td>
                <td><?= $user->plz ?></td>
                    <td>
                        <?php if($user->anceta!="false"): ?>
                            <a class="gs_form_table_item gs_form_show_item"
                               target="_blank"
                               href="<?= $show_link.$user->id ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="gs_form_table_item gs_form_delete_item"
                           href="<?=$delete_link.$user->id?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
            </tr>
       <?php endforeach; ?>
        </tbody>
    </table>
</div>