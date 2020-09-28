<h2>Viewing #<?php echo $stockcount->id; ?></h2>

<p>
	<strong>From:</strong>
	<?php echo $stockcount->from; ?></p>
<p>
	<strong>To:</strong>
	<?php echo $stockcount->to; ?></p>

<?php echo Html::anchor('stockcount/edit/'.$stockcount->id, 'Edit'); ?> |
<?php echo Html::anchor('stockcount', 'Back'); ?>