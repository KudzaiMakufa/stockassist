<h2>Editing Reconciliation</h2>
<br>

<?php echo render('reconciliation/_form'); ?>
<p>
	<?php echo Html::anchor('reconciliation/view/'.$reconciliation->id, 'View'); ?> |
	<?php echo Html::anchor('reconciliation', 'Back'); ?></p>
