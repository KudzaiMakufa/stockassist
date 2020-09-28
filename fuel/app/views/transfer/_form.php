<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Product Name', 'product_id', array('class'=>'control-label')); ?>
			<?php 
                	$product  = Model_Product::find(array('order_by'=>array('name'=>'asc')));
                	$arr=array('0'=>'--Select Product Name--');
					if(is_null($product)){
						$arr=array('0'=>'--Save Products First--');
					}else{
						foreach ($product as $item) {
							$arr[$item->id] = $item->name;
						}

					}
					
					
			?>
				<?php echo Form::select('product_id', Input::post('product_id', isset($transfer) ? $transfer->product_id : ''), $arr,array('class' => 'col-md-4 form-control', 'placeholder'=>'Product id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Quantity', 'quantity', array('class'=>'control-label')); ?>

				<?php echo Form::input('quantity', Input::post('quantity', isset($transfer) ? $transfer->quantity : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Quantity')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Reason', 'reason', array('class'=>'control-label')); ?>

				<?php echo Form::input('reason', Input::post('reason', isset($transfer) ? $transfer->reason : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Reason')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($transfer) ? $transfer->date : ''), array('class' => 'col-md-4 form-control', 'type'=>'date')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>