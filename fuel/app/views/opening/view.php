<h2>Viewing #<?php echo $opening->id; ?></h2>

<p>
	<strong>Product id:</strong>
	<?php echo $opening->product_id; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $opening->quantity; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $opening->date; ?></p>
<p>
	<strong>Stock id:</strong>
	<?php echo $opening->stock_id; ?></p>

<?php echo Html::anchor('opening/edit/'.$opening->id, 'Edit'); ?> |
<?php echo Html::anchor('opening', 'Back'); ?>