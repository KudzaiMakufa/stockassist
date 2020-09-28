
<html>
<head>
<style>
		input[type="date"] {
    width: 200px;
    display: inline-block;
}
</style>
</head>
<body>

<h2 align="center">Stock Take</h2>
<br>

<div class="se-pre-con"></div>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>	

<div align="center">
<?php echo Form::label('From ', 'from', array('class'=>'control-label')); ?>
 <?php echo Form::input('from', Input::post('from'), array('class' => 'col-md-4 form-control', 'type'=>'date')); ?>

			
 <?php echo Form::label('To', 'to', array('class'=>'control-label')); ?>

 <?php echo Form::input('to', Input::post('to'), array('class' => 'col-md-4 form-control', 'type'=>'date')); ?>

</div>
<br>
<br>
		
			
		
	
	

<?php  
if ($products): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Price name</th>
			<th>Previouse Closing</th>
			
			<th>Closing Stock</th>
		
			
		</tr>
	</thead>	
	<tbody>






<?php $due = 0 ; $quantity = 0 ; ?>
<?php foreach ($products as $item): ?>		
	<tr>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->price.' USD'; ?></td>
			<td><?php
			//checking previous closing to note down discrepancy
			$opening = Model_Opening::find(array('where'=>array('product_id'=>$item->id ,'stock_id'=>0)));
			if(is_null($opening)){
				$quantity = 0 ;
			}else{
				$quantity =  $opening[0]->quantity;
			}
			
			
			echo $quantity; ?></td>
			
			
			<td><?php 
			echo Form::input($item->id, Input::post($item->id), array('class' => 'col-md-12 form-control', 'placeholder'=>'enter closing stock')); 
			//echo Form::input('project', Input::post('project'), array('class' => 'col-md-12 form-control', 'type'=>'hidden'));

			?></td> 	
	</tr>
<?php endforeach; ?>








</tbody>
</table>


<div align="center ">
		<?php echo Form::submit('submit', 'Complete', array('class' => 'btn btn-primary')); ?>
		
	</div>

</fieldset>
	<?php echo Form::close(); ?>

<?php else: ?>
<p>No Products.</p>

<?php endif; ?><p>

</body>
</html>

	