<h2>Viewing #<?php echo $closing->id; ?></h2>

<p>
	<strong>Product id:</strong>
	<?php echo $closing->product_id; ?></p>
<p>
	<strong>Quantity:</strong>
	<?php echo $closing->quantity; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $closing->date; ?></p>
<p>
	<strong>Stock id:</strong>
	<?php echo $closing->stock_id; ?></p>
<p>
	<strong>Closeprise:</strong>
	<?php echo $closing->closeprise; ?></p>

<?php echo Html::anchor('closing/edit/'.$closing->id, 'Edit'); ?> |
<?php echo Html::anchor('closing', 'Back'); ?>