<h2>Viewing #<?php echo $supplier->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $supplier->name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $supplier->address; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $supplier->phone; ?></p>

<?php echo Html::anchor('supplier/edit/'.$supplier->id, 'Edit'); ?> |
<?php echo Html::anchor('supplier', 'Back'); ?>