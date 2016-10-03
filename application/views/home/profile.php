<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
		        <li class="active"><a data-toggle="tab" href="#sectionA">Profile</a></li>
		        <li><a data-toggle="tab" href="#sectionB">Buy Product</a></li>
		        <li><a data-toggle="tab" href="#sectionC">Sell Product</a></li>
		        <li><a data-toggle="tab" href="#sectionD">Change Password</a></li>
		        
		    </ul>
		    <div class="tab-content">
		        <div id="sectionA" class="tab-pane fade in active">
		            <div class="col-sm-3"></div>
		            <div class="col-sm-6">
		            	<p class="profile-title">Personal Information</p>
		            	<div class="profile-items">

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Email</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				demo@gmail.com
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Name</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-name">Pawan Singh Chauhan</a>
		            			</div>
		            		</div>

			            	<div class="row">
		            			<div class="col-xs-4 col-sm-5">Mobile</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-mobile">9772217799</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Organisation</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-organisation">Fitterfox</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Designation</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-designation">Developer</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Location</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-location">E-702</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">City</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-city">Kota</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">State</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-state">Rajasthan</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Country</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-country">India</a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">PinCode</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-pincode">324008</a>
		            			</div>
		            		</div>

		            	</div>
		            </div>
		            <div class="col-sm-3"></div>
		        </div>
		        <div id="sectionB" class="tab-pane fade">
		        <br>
		        <?php 
		        	$configUrl = base_url()."index.php/profile";
	        		$data = $this->HomeModel->showProducts("Sell", $configUrl);
	        		$rows = $data->rows;
	        		$count = $data->count;

	        		if($count != 0) {
		        	echo "<div class='row'>";
		        	foreach ($rows as $row) { ?>
		
		            	<div class="col-xs-6 col-sm-4 col-md-3">
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
							    		<a href="#" class="btn btn-primary pull-left">Update</a>
							    		<a href="#" class="btn btn-danger pull-right">Delete</a>
							    	</div>
							    </div>
							</div>
			            </div>
		            <?php } echo "</div>"; } else { ?> 
       

			        Add Error Msg for products

			        <?php } 

			        	
			        ?>
		        	<div class="row">
		        		<div class="col-sm-12"><?php echo $this->pagination->create_links(); ?></div>
		        	</div> 
		        </div>
		        <div id="sectionC" class="tab-pane fade">
		        <br>
		        <?php 
		        	$configUrl = base_url()."index.php/profile";
	        		$data = $this->HomeModel->showProducts("Buy", $configUrl);
	        		$rows = $data->rows;
	        		$count = $data->count;

	        		if($count != 0) {
		        	echo "<div class='row'>";
		        	foreach ($rows as $row) { ?>
		
		            	<div class="col-xs-6 col-sm-4 col-md-3">
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
							    		<a href='<?php echo base_url()."index.php/update-product/".$this->HomeModel->encode($row->id); ?>' class="btn btn-primary pull-left">Update</a>
							    		<a href="#" class="btn btn-danger pull-right">Delete</a>
							    	</div>
							    </div>
							</div>
			            </div>
		            <?php } echo "</div>"; } else { ?> 
       

			        Add Error Msg for products

			        <?php } 

			        	
			        ?>
		        	<div class="row">
		        		<div class="col-sm-12"><?php echo $this->pagination->create_links(); ?></div>
		        	</div> 
		        </div>
		        <div id="sectionD" class="tab-pane fade">
		        	<p>Change Password</p>
		        </div>
		    </div>
		</div>
	</div>
</div>