<h4 align="center"><strong> <span class='muted'>Select Stock to reconcile</span></strong></h4>
<p align="center">
	

</p>
<form method="post" class="form-horizontal" action="<?php echo Uri::create('predict/choose'); ?>">
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php 
				
					$arr=array(0=>'--Please Select A Stock date--');
					foreach ($items as $item) {
						$arr[$item->id] = $item->from.' to '.$item->to;
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

<script>
	function setProject(){
		//disease 


		var target = document.getElementById('inputurl');
		//alert(target.value);
		document.getElementById("btn-project").onclick = function() {
    	this.href = '<?php echo Uri::base(false) ;?>'+"reconciliation/calculate/"+target.value;
   		};

   	


		
		//alert(target.value);
	}
</script>