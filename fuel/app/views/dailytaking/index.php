<h2>Listing Cashier Handovers </h2>
<br>
<?php if ($dailytakings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Stockname</th>
			<th>Date</th>
			<th>Amount</th>
			<th>Cashier</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($dailytakings as $item): ?>		<tr>

		<td><?php echo Custom::getStockTakeName($item->stockname); ?></td>
			
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->amount; ?></td>
			<td><?php echo $item->cashier; ?></td>
			<!-- <td>
				<?php //echo Html::anchor('dailytaking/view/'.$item->id, 'View'); ?> |
				<?php //echo Html::anchor('dailytaking/edit/'.$item->id, 'Edit'); ?> |
				<?php //echo Html::anchor('dailytaking/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td> -->
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Dailytakings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('dailytaking/create', 'Add new Dailytaking', array('class' => 'btn btn-success')); ?>

</p>
