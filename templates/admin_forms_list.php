<?php if ( ! defined( 'ABSPATH' ) ) exit ?>

<h1><?= __('Forms list', 'gs_form') ?>:</h1>
<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<td><?= __('Title', 'gs_form') ?></td>
					<td><?= __('Subtitle', 'gs_form') ?></td>
					<td><?= __('Shortcode', 'gs_form') ?></td>
					<td style="width: 25px"></td>
					<td style="width: 25px"></td>
				</tr>
			</thead>
			<tbody>

			<?php foreach ($data as $form): ?>
				<tr>
					<td>
                        <a href="<?= $edit_link.$form->id ?>">
                            <?= $form->title ?>
                        </a>
                    </td>
					<td><?= $form->subtitle ?></td>
					<td><?= $form->shortcode ?></td>
					<td>
						<a 
							class="gs_form_edit_item gs_form_table_item" 
							href="<?= $edit_link.$form->id ?>">
							<i class="fa fa-pencil"></i>
						</a>
					</td>
					<td>
						<a 
							class="gs_form_delete_item gs_form_table_item" 
							href="<?= $delete_link.$form->id ?>">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
</div>