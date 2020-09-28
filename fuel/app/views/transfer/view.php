<h2>Viewing #<?php echo $transfer->id; ?></h2>

<p>
	<strong>Product id:</strong>
	<?php echo $transfer->product_id; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $transfer->quantity; ?></p>
<p>
	<strong>Reason:</strong>
	<?php echo $transfer->reason; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $transfer->date; ?></p>
<p>
	<strong>Stock id:</strong>
	<?php echo $transfer->stock_id; ?></p>

<?php echo Html::anchor('transfer/edit/'.$transfer->id, 'Edit'); ?> |
<?php echo Html::anchor('transfer', 'Back'); ?>