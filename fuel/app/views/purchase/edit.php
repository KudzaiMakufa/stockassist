<h2>Editing Purchase</h2>
<br>

<?php echo render('purchase/_form'); ?>
<p>
	<?php echo Html::anchor('purchase/view/'.$purchase->id, 'View'); ?> |
	<?php echo Html::anchor('purchase', 'Back'); ?></p>
