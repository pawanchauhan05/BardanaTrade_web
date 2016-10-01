<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-default">
			    <div class="panel-heading">All</div>
			    <div class="panel-body">
			    	<a href="<?php echo base_url() ?>index.php/products/Bags">Bags</a><br>
			    	<a href="<?php echo base_url() ?>index.php/products/Twine-and-Yarn">Twine & Yarn</a><br>
			    	<a href="<?php echo base_url() ?>index.php/products/Machines">Machines</a><br>
			    	<a href="<?php echo base_url() ?>index.php/products/Others">Others</a>
			    </div>
			</div>
			<div class="panel panel-default">
			    <div class="panel-heading">Categories</div>
			    <div class="panel-body">
			    <?php
			    	if($category != null && !$category == '') { 
			    		if($category == "Twine-and-Yarn") {
			    			$category = "Twine and Yarn";
			    		}
			    		$categories = $this->HomeModel->getProductSubCategory($category); 
			    	} else {
			    		$categories = $this->HomeModel->getProductCategory();
			    	}
			    	foreach ($categories as $row) { ?>
			    		<div class="checkbox">
						  <label><input type="checkbox" value=""><?php echo $row->subCategory ?></label>
						</div>
			    <?php } ?>
			    </div>
			</div>
		</div>
		<div class="col-sm-9">
			<ul class="nav nav-tabs">
		        <li class="active"><a data-toggle="tab" href="#sectionA">SUPLLIER DETAILS </a></li>
		        <li><a data-toggle="tab" href="#sectionB">BUYER DETAILS</a></li>
		    </ul>


		    <div class="tab-content">
		        <div id="sectionA" class="tab-pane fade in active">
		        <br>
		        <?php

		        	if($category != null && !$category == '') {
		        		$data = $this->HomeModel->showProductsByCategory($category, "Sell");
		        		$rows = $data->rows;
		        		$count = $data->count;
		        	} else {
		        		$data = $this->HomeModel->showProducts("Sell");
		        		$rows = $data->rows;
		        		$count = $data->count;
		        	}
		        	
		        	if($count != 0) {
		        	foreach ($rows as $row) { ?>

		        	<div class="col-sm-4">
		            	<div class="panel panel-default">
						    <div class="panel-body">
						    	<img src="<?php echo base_url() ."images/".$row->productPic ?>" class="img-responsive">
						    	<h3 class="text-center"><?php echo $row->productName ?></h3>
						    	<p><?php echo $row->productDescription ?></p>
						    	<div class="">
						    		<p class="pull-left"><?php echo $row->price ." INR" ?></p>
						    		<p class="pull-right">Posted <?php echo date("d F", $row->postedOn) ?></p>
						    	</div>
						    	<div class="text-center">
						    		<a href="#" class="btn btn-primary">Contact</a>
						    	</div>
						    </div>
						</div>
		            </div>

		        <?php } } else { ?> 
       

		        Add Error Msg for products

		        <?php } ?>

		            
		        </div>
		        <div id="sectionB" class="tab-pane fade">
		            <br>
			        <?php

			        	if($category != null && !$category == '') {
			        		$data = $this->HomeModel->showProductsByCategory($category, "Buy");
			        		$rows = $data->rows;
			        		$count = $data->count;
			        	} else {
			        		$data = $this->HomeModel->showProducts("Buy");
			        		$rows = $data->rows;
			        		$count = $data->count;
			        	}
			        	
			        	if($count != 0) {
			        	foreach ($rows as $row) { ?>

			        	<div class="col-sm-4">
			            	<div class="panel panel-default">
							    <div class="panel-body">
							    	<img src="<?php echo base_url() ."images/".$row->productPic ?>" class="img-responsive">
							    	<h3 class="text-center"><?php echo $row->productName ?></h3>
							    	<p><?php echo $row->productDescription ?></p>
							    	<div class="">
							    		<p class="pull-left"><?php echo $row->price ." INR" ?></p>
							    		<p class="pull-right">Posted <?php echo date("d F", $row->postedOn) ?></p>
							    	</div>
							    	<div class="text-center">
							    		<a href="#" class="btn btn-primary">Contact</a>
							    	</div>
							    </div>
							</div>
			            </div>

			        <?php } } else { ?> 
	       

			        Add Error Msg for products

			        <?php } ?>
		        </div>		        
		    </div>
		</div>
	</div>
</div>