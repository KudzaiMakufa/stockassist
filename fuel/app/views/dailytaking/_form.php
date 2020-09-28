<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Stockname', 'stockname', array('class'=>'control-label')); ?>
			<?php 
					$items = Model_Stockcount::find(array('where'=>array('reconciled'=>0)));
                	$arr=array(0=>'--Please Cash staking stock name--');
					if(is_null($items)){

					}else{
						foreach ($items as $item) {
							$arr[$item->id] =  $item->id.' '.$item->from.' to '.$item->to;
						}	
					}
					
					
					
			?>
				<?php echo Form::select('stockname', Input::post('stockname', isset($dailytaking) ? $dailytaking->stockname : ''), $arr , array('class' => 'col-md-4 form-control', 'placeholder'=>'Stockname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($dailytaking) ? $dailytaking->date : ''), array('class' => 'col-md-4 form-control', 'type'=>'date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($dailytaking) ? $dailytaking->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Cashier', 'cashier', array('class'=>'control-label')); ?>

				<?php echo Form::input('cashier', Input::post('cashier', isset($dailytaking) ? $dailytaking->cashier : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Cashier')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>