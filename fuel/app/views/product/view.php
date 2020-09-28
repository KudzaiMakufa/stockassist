<h2>Viewing #<?php echo $product->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $product->name; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $product->price; ?></p>

<?php echo Html::anchor('product/edit/'.$product->id, 'Edit'); ?> |
<?php echo Html::anchor('product', 'Back'); ?>