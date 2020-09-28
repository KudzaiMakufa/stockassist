<h2>Viewing #<?php echo $supplie->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $supplie->name; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $supplie->address; ?></p>
<p>
	<strong>Phone:</strong>
	<?php echo $supplie->phone; ?></p>

<?php echo Html::anchor('supplie/edit/'.$supplie->id, 'Edit'); ?> |
<?php echo Html::anchor('supplie', 'Back'); ?>