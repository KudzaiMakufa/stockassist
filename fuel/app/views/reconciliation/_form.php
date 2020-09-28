<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Opening', 'opening', array('class'=>'control-label')); ?>

				<?php echo Form::input('opening', Input::post('opening', isset($reconciliation) ? $reconciliation->opening : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Opening')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Purchases', 'purchases', array('class'=>'control-label')); ?>

				<?php echo Form::input('purchases', Input::post('purchases', isset($reconciliation) ? $reconciliation->purchases : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Purchases')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Transfers', 'transfers', array('class'=>'control-label')); ?>

				<?php echo Form::input('transfers', Input::post('transfers', isset($reconciliation) ? $reconciliation->transfers : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Transfers')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Total', 'total', array('class'=>'control-label')); ?>

				<?php echo Form::input('total', Input::post('total', isset($reconciliation) ? $reconciliation->total : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Total')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Closing', 'closing', array('class'=>'control-label')); ?>

				<?php echo Form::input('closing', Input::post('closing', isset($reconciliation) ? $reconciliation->closing : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Closing')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Sales units', 'sales_units', array('class'=>'control-label')); ?>

				<?php echo Form::input('sales_units', Input::post('sales_units', isset($reconciliation) ? $reconciliation->sales_units : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sales units')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Unit price', 'unit_price', array('class'=>'control-label')); ?>

				<?php echo Form::input('unit_price', Input::post('unit_price', isset($reconciliation) ? $reconciliation->unit_price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Unit price')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Total sales', 'total_sales', array('class'=>'control-label')); ?>

				<?php echo Form::input('total_sales', Input::post('total_sales', isset($reconciliation) ? $reconciliation->total_sales : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Total sales')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Profit', 'profit', array('class'=>'control-label')); ?>

				<?php echo Form::input('profit', Input::post('profit', isset($reconciliation) ? $reconciliation->profit : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Profit')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>