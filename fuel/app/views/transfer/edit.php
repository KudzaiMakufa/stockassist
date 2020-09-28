<h2>Editing Transfer</h2>
<br>

<?php echo render('transfer/_form'); ?>
<p>
	<?php echo Html::anchor('transfer/view/'.$transfer->id, 'View'); ?> |
	<?php echo Html::anchor('transfer', 'Back'); ?></p>
