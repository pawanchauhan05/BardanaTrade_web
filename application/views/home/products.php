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
			    	if($category != null && !$category == '' && !is_numeric($category)) { 
			    		if($category == "Twine-and-Yarn") {
			    			$category = "Twine and Yarn";
			    		}
			    		$categories = $this->HomeModel->getProductSubCategory($category); 
			    	} else {
			    		$categories = $this->HomeModel->getProductCategory();
			    	}
			    	echo form_open('products');
			    	foreach ($categories as $row) { ?>
			    		<div class="checkbox">
						  <label>
						  	<input type="checkbox" name="subCategory[]" value='<?php echo $row->subCategory ?>' 
						  	<?php // 	echo in_array($row->subCategory, $people) ? "checked" : ""; ?> >
						  	<?php echo $row->subCategory ?>
						  </label>
						</div>
			    <?php } ?>
			    <input type="submit" name="submit">
			    <?php echo form_close(); ?>

			    </div>
			</div>
		</div>
		<div class="col-sm-9">
			<?php
				if($this->uri->segment(2) != null && $this->uri->segment(2) != '' && !is_numeric($this->uri->segment(2))) {
					$actionRoute = $this->uri->segment(1)."/".$this->uri->segment(2);
				} else {
					$actionRoute = $this->uri->segment(1);
				}
			?>
			<div class="row">
				<div class="col-xs-6 col-sm-2">
					<?php echo form_open($actionRoute) ?>
				    <input type="hidden" name="forWhich" value="Sell">
				    <button type="submit" class="btn btn-primary ">Suppliers Details</button>
				    <?php echo form_close() ?>
				</div>

				<div class="col-xs-6 col-sm-2">
					<?php echo form_open($actionRoute) ?>
				    <input type="hidden" name="forWhich" value="Buy">
				    <button type="submit" class="btn btn-info ">Buyers Details</button>
				    <?php echo form_close() ?>
				</div>
				<div class="col-sm-8">
				
				</div>
			</div>
			
					    
			<?php

					if(isset($_POST['forWhich'])) {
						$this->session->set_userdata('forWhich', $this->input->post('forWhich'));
						$forWhich = $_SESSION['forWhich'];
					} else {
						if(isset($_SESSION['forWhich'])) {
							$forWhich = $_SESSION['forWhich'];
						} else {
							$forWhich = "Sell";	
						}
					}

		        	if($category != null && !$category == '' && !is_numeric($category)) {
		        		$configUrl = base_url()."index.php/products/".$category;
		        		$sellData = $this->HomeModel->showProductsByCategory($category, $forWhich, $configUrl);
		        		$sellRows = $sellData->rows;
		        		$sellCount = $sellData->count;
		        	} else {
		        		$configUrl = base_url()."index.php/products";
		        		if(isset($_POST['subCategory'])) {
		        			$filter = $this->input->post('subCategory');
		        			$sellData = $this->HomeModel->showProducts($forWhich, $configUrl, $filter);
		        		} else {
		        			$filter = array();
		        			$sellData = $this->HomeModel->showProducts($forWhich, $configUrl, $filter);	
		        		}
		        		$sellRows = $sellData->rows;
		        		$sellCount = $sellData->count;
		        	}

		        	
		        	
		        	if($sellCount != 0) {
		        	echo "<div class='row'><br>";
		        	foreach ($sellRows as $row) { ?>
		        	
			        	<div class="col-sm-4">
			            	<div class="panel panel-default">
							    <div class="panel-body">
							    	<a href='<?php echo base_url()."index.php/product-details/".$this->HomeModel->encode($row->id); ?>'>
							    		<img src="<?php echo base_url() ."images/".$row->productPic ?>" class="img-responsive">
							    	</a>
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

		        <?php } echo "</div>"; } else { ?> 
       

		        Add Error Msg for products

		        <?php } 

		        	
		        ?>

		    <?php echo $this->pagination->create_links(); ?>

		</div>
	</div>
</div>