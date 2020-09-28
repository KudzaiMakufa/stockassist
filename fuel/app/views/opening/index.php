<h2>Listing Openings</h2>
<br>
<?php if ($openings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Product id</th>
			<th>Quantity</th>
			<th>Date</th>
			<th>Stock id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($openings as $item): ?>		<tr>

			<td><?php echo $item->product_id; ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->stock_id; ?></td>
			<td>
				<?php echo Html::anchor('opening/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('opening/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('opening/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Openings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('opening/create', 'Add new Opening', array('class' => 'btn btn-success')); ?>

</p>
