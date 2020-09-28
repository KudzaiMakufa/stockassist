<h2>Listing Stockcounts</h2>
<br>
<?php if ($stockcounts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>From</th>
			<th>To</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($stockcounts as $item): ?>		<tr>

			<td><?php echo $item->from; ?></td>
			<td><?php echo $item->to; ?></td>
			<td>
				<?php echo Html::anchor('stockcount/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('stockcount/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('stockcount/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stockcounts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('stockcount/create', 'Add new Stockcount', array('class' => 'btn btn-success')); ?>

</p>
