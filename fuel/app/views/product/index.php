<h2>Listing Products</h2>
<br>
<p align="center">
	<?php echo Html::anchor('product/create', 'Add new Product', array('class' => 'btn btn-success')); ?>

</p>

<?php if ($products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($products as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->price; ?></td>
			<td>
				<?php echo Html::anchor('product/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('product/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('product/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Products.</p>

<?php endif; ?>