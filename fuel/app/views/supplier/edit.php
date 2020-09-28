<h2>Editing Supplier</h2>
<br>

<?php echo render('supplier/_form'); ?>
<p>
	<?php echo Html::anchor('supplier/view/'.$supplier->id, 'View'); ?> |
	<?php echo Html::anchor('supplier', 'Back'); ?></p>
