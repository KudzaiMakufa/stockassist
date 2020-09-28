<h2>Listing Suppliers</h2>
<br>
<?php if ($suppliers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($suppliers as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td>
				<?php echo Html::anchor('supplier/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('supplier/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('supplier/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Suppliers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('supplier/create', 'Add new Supplier', array('class' => 'btn btn-success')); ?>

</p>
