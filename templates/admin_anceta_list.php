<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<h1><?= __('Questionnaire', 'gs_form') ?>:</h1>
<table class="table">
    <thead>
    <tr>
        <td><?= __('Question', 'gs_form') ?></td>
        <td><?= __('Answer', 'gs_form') ?></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($anceta as $value): ?>
    <tr>
        <td><?= $value->title ?></td>
        <td><?= $value->answear ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>