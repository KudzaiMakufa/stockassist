	<h2>Listing Transfers</h2>
<br>


<form method="post" class="form-horizontal" action="<?php echo Uri::create('predict/choose'); ?>">
		<div class="form-group">
		<h4 class="card-title">Stock</h4>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
				
					$arr=array(0=>'--Please Select stock name to view past purchases --');
					if(is_null($items)){

					}else{
						foreach ($items as $item) {
							$arr[$item->id] = $item->from.' to '.$item->to;
						}	
					}
					
                    
					
					echo Form::select('project_id', Input::post('project_id' ),$arr ,		
					 array('class' => 'form-control','onchange'=>"setProject()",'id'=>'inputurl')); 
				?>
				
			</div>

		</div>

	

		<div align="left">
				<a class="glyphicon glyphicon-asterisk btn btn-info " id="btn-project" href="#">View</a>

				</div>

</form>

<br>
<p>
	<?php echo Html::anchor('transfer/create', 'Add new Transfer', array('class' => 'btn btn-success')); ?>

</p>

<?php if ($transfers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Product id</th>
			<th>Quantity</th>
			<th>Reason</th>
			<th>Date</th>
			<th>Stock id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($transfers as $item): ?>		<tr>

			<td><?php echo Custom::getProductName($item->product_id); ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td><?php echo $item->reason; ?></td>
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->stock_id; ?></td>
			<td>
				<?php echo Html::anchor('transfer/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('transfer/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('transfer/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Transfers.</p>

<?php endif; ?>

<script>
	function setProject(){
		//disease 


		var target = document.getElementById('inputurl');
		//alert(target.value);
		document.getElementById("btn-project").onclick = function() {
    	this.href = '<?php echo Uri::base(false) ;?>'+"transfer/index/"+target.value;
   		};

   	


		
		//alert(target.value);
	}
</script>

<script>
	function setProject(){
		//disease 


		var target = document.getElementById('inputurl');
		//alert(target.value);
		document.getElementById("btn-project").onclick = function() {
    	this.href = '<?php echo Uri::base(false) ;?>'+"transfer/index/"+target.value;
   		};

   	


		
		//alert(target.value);
	}
</script>