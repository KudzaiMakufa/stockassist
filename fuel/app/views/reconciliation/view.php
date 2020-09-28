<h2>Viewing #<?php echo  $reconciliation->id; ?></h2>

<p>
	<strong>Opening:</strong>
	<?php echo $reconciliation->opening; ?></p>
<p>
	<strong>Purchases:</strong>
	<?php echo $reconciliation->purchases; ?></p>
<p>
	<strong>Transfers:</strong>
	<?php echo $reconciliation->transfers; ?></p>
<p>
	<strong>Total:</strong>
	<?php echo $reconciliation->total; ?></p>
<p>
	<strong>Closing:</strong>
	<?php echo $reconciliation->closing; ?></p>
<p>
	<strong>Sales units:</strong>
	<?php echo $reconciliation->sales_units; ?></p>
<p>
	<strong>Unit price:</strong>
	<?php echo $reconciliation->unit_price; ?></p>
<p>
	<strong>Total sales:</strong>
	<?php echo $reconciliation->total_sales; ?></p>
<p>
	<strong>Profit:</strong>
	<?php echo $reconciliation->profit; ?></p>

<?php echo Html::anchor('reconciliation/edit/'.$reconciliation->id, 'Edit'); ?> |
<?php echo Html::anchor('reconciliation', 'Back'); ?>