<h2>Viewing #<?php echo $dailytaking->id; ?></h2>

<p>
	<strong>Stockname:</strong>
	<?php echo $dailytaking->stockname; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $dailytaking->date; ?></p>
<p>
	<strong>Amount:</strong>
	<?php echo $dailytaking->amount; ?></p>
<p>
	<strong>Cashier:</strong>
	<?php echo $dailytaking->cashier; ?></p>

<?php echo Html::anchor('dailytaking/edit/'.$dailytaking->id, 'Edit'); ?> |
<?php echo Html::anchor('dailytaking', 'Back'); ?>