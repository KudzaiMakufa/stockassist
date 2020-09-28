<h2>Listing Supplies</h2>
<br>
<?php if ($supplies): ?>
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
<?php foreach ($supplies as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->phone; ?></td>
			<td>
				<?php echo Html::anchor('supplie/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('supplie/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('supplie/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Supplies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('supplie/create', 'Add new Supplie', array('class' => 'btn btn-success')); ?>

</p>
