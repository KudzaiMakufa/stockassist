<h2>Editing Opening</h2>
<br>

<?php echo render('opening/_form'); ?>
<p>
	<?php echo Html::anchor('opening/view/'.$opening->id, 'View'); ?> |
	<?php echo Html::anchor('opening', 'Back'); ?></p>
