<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-default">
			    <div class="panel-heading"><a href="<?php echo base_url() ?>index.php/products">All</a></div>
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
						  	<input type="checkbox" name="subCategory[]" onclick="check()" value='<?php echo $row->subCategory ?>' 
						  	<?php // 	echo in_array($row->subCategory, $people) ? "checked" : ""; ?> >
						  	<?php echo $row->subCategory ?>
						  </label>
						</div>
			    <?php } ?>
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
					?>
				</div>
			</div>
			<br>

		    <div class="row" id="results"></div>

		</div>
	</div>
</div>