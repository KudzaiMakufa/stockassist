<h2>Editing Stockcount</h2>
<br>

<?php echo render('stockcount/_form'); ?>
<p>
	<?php echo Html::anchor('stockcount/view/'.$stockcount->id, 'View'); ?> |
	<?php echo Html::anchor('stockcount', 'Back'); ?></p>
