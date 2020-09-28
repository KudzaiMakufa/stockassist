<h2>Listing Closings</h2>
<br>
<?php if ($closings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Product id</th>
			<th>Quantity</th>
			<th>Date</th>
			<th>Stock id</th>
			<th>Closing Prise</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($closings as $item): ?>		<tr>

	<td><?php echo Custom::getProductName($item->product_id); ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->stock_id; ?></td>
			<td><?php echo $item->closeprise; ?></td>
			<td>
				<?php echo Html::anchor('closing/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('closing/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('closing/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Closings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('closing/create', 'Add new Closing', array('class' => 'btn btn-success')); ?>

</p>
