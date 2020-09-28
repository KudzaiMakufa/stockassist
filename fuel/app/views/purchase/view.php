<h2>Viewing #<?php echo $purchase->id; ?></h2>

<p>
	<strong>Product id:</strong>
	<?php echo $purchase->product_id; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $purchase->quantity; ?></p>
<p>
	<strong>Cost:</strong>
	<?php echo $purchase->cost; ?></p>
<p>
	<strong>Supplier:</strong>
	<?php echo $purchase->supplier; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $purchase->date; ?></p>
<p>
	<strong>Stock id:</strong>
	<?php echo $purchase->stock_id; ?></p>

<?php echo Html::anchor('purchase/edit/'.$purchase->id, 'Edit'); ?> |
<?php echo Html::anchor('purchase', 'Back'); ?>