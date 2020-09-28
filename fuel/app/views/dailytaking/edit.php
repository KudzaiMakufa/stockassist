<h2>Editing Dailytaking</h2>
<br>

<?php echo render('dailytaking/_form'); ?>
<p>
	<?php echo Html::anchor('dailytaking/view/'.$dailytaking->id, 'View'); ?> |
	<?php echo Html::anchor('dailytaking', 'Back'); ?></p>
