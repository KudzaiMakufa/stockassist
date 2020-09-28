<h4 align="center"><strong> <span class='muted'>Select Reconciled stock to View</span></strong></h4>
<p align="center">
	

</p>
<form method="post" class="form-horizontal" action="<?php echo Uri::create('predict/choose'); ?>">
		<div class="form-group">
		<h4 class="card-title">Stock</h4>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
				
					$arr=array(0=>'--Please Select Reconciled stock --');
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
				<a class="glyphicon glyphicon-asterisk btn btn-info " id="btn-project" href="#">Proceed</a>

				</div>

</form>



<br>


<?php if ($reconciliations): ?>

	<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-menu"></i>
        </span> Financial Peformance </h3>
            <nav aria-label="breadcrumb">
        	    <ul class="breadcrumb">
        	      <li class="breadcrumb-item active" aria-current="page">
        	        <span></span>Chifamba Bottle Store <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
    	          </li>
                </ul>
              </nav>
			</div>


<div class="col-md-12	 grid-margin stretch-card">
    <div class="card">
                  <div class="card-body">

				 
                    <h4 class="card-title"><?php echo Custom::getStockTakeName($stockname); ?></h4>
                    <p class="card-description"><?php  ?></p>
                    <ul class="list-ticked">
                      <li><b>Expected Cash:</b> <?php echo 'USD	$'.number_format($expectedcash, 2, '.', ',').' ---equiv---- RTGS $'.number_format(($expectedcash*90), 2, '.', ',');  ?> </li>
                      <li><b>Actual Cash: </b><?php echo 'USD	$'.number_format(($actualcash), 2, '.', ',').' ---equiv---- RTGS '.number_format(($actualcash*90), 2, '.', ','); ?></li>
					  <?php if($expectedcash > $actualcash) : ?>
						
						<li><b class="alert-sm alert-warning	" role="alert">Variance Short: </b><?php echo 'USD	$'.number_format($expectedcash - $actualcash, 2, '.', ',').' ---equiv---- RTGS	$'.number_format(($expectedcash - $actualcash)*90, 2, '.', ','); ?></li>
					<?php elseif($expectedcash < $actualcash) : ?>
					  <li><b>Variance Excess: </b><?php echo 'USD	$'.number_format($expectedcash - $actualcash, 2, '.', ','); ?></li>
					  <?php else : ?>
					  <li><b class="alert-sm alert-success	" role="alert"> Net: </b><?php echo 'USD	$'.number_format($expectedcash - $actualcash, 2, '.', ','); ?></li>
					<?php endif ; ?>
					<li><b>Cashier:</b> <?php echo  $cashier;  ?> </li>
					</ul>
				</div>

                </div>
              </div>





<table class="table table-striped">
	<thead>
		<tr>
		<th>Product</th>
		
			<th>Opening</th>
			<th>Purchases</th>
			<th>Transfers</th>
			<th>Total</th>
			<th>Closing</th>
			<th>Sales units</th>
			<th>Unit price</th>
			<th>Total sales</th>
		
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($reconciliations as $item): ?>		<tr>
			<td><?php echo  substr(Custom::getProductName($item->product_id), 0, 15)."..."; ?></td>
			<td><?php echo $item->opening; ?></td>
			<td><?php echo $item->purchases; ?></td>
			<td><?php echo $item->transfers; ?></td>
			<td><?php echo $item->total; ?></td>
			<td><?php echo $item->closing; ?></td>
			<td><?php echo $item->sales_units; ?></td>
			<td><?php echo $item->unit_price; ?></td>
			<td><?php echo number_format($item->total_sales, 2, '.', ','); ?></td>
			
			
		




		
			<td>
				<?php echo Html::anchor('reconciliation/view/'.$item->id, 'View',array('class'=>'btn btn-sm btn-primary')); ?> 
				<?php //echo Html::anchor('reconciliation/edit/'.$item->id, 'Edit'); ?> 
				<?php //echo Html::anchor('reconciliation/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Reconciliations.</p>

<?php endif; ?><p>
	<?php //	echo Html::anchor('reconciliation/create', 'Add new Reconciliation', array('class' => 'btn btn-success')); ?>

</p>


<script>
	function setProject(){
		//disease 


		var target = document.getElementById('inputurl');
		//alert(target.value);
		document.getElementById("btn-project").onclick = function() {
    	this.href = '<?php echo Uri::base(false) ;?>'+"reconciliation/index/"+target.value;
   		};

   	


		
		//alert(target.value);
	}
</script>