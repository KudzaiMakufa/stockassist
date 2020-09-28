<h2>Stock Value </h2>
<br>
<?php if ($stocks): ?>

	<div class="col-md-12	 grid-margin stretch-card">
    <div class="card">
                  <div class="card-body">

				 
                    <h4 class="card-title">Stock Value</h4>
                    <p class="card-description"><?php  ?></p>
                    <ul class="list-ticked">
                     
					  <li><b>Stock Value at Selling Price: </b><?php echo 'USD	$'.number_format(($stockval), 2, '.', ',').' ---equiv---- RTGS '.number_format(($stockval*90), 2, '.', ','); ?></li>
					
					</ul>
				</div>

                </div>
              </div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Product id</th>
			<th>Quantity</th>

			<th>Action</th>
		
			<th></th>
		</tr>
	</thead>
	<tbody>
	

<?php foreach ($stocks as $item): ?>		<tr>
	
			<td>
			<?php echo Custom::getProductName($item['product_id']); ?></td>
			<td><?php echo $item['quantity']; ?></td>

			
			<?php if($item['quantity'] < 1 ) : ?>
				<td><button class="btn-danger btn-rounded">Low stock level</button></td>
			<?php endif ; ?>
			
		
		
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Stocks.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('opening/create', 'Add new Opening', array('class' => 'btn btn-success')); ?>

</p>
