<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
		        <li class="active"><a data-toggle="tab" href="#sectionA">Profile</a></li>
		        <li><a data-toggle="tab" href="#sectionB">Products</a></li>
		        <li><a data-toggle="tab" href="#sectionC">Change Password</a></li>
		    </ul>
		    <?php
		    	$sessionData = $this->HomeModel->readSessionData();
		    	$loggedUser = $sessionData['sessionData']['email'];
		    	$data = $this->HomeModel->getUserInfo($loggedUser);
		    ?>
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
		            				<?php echo $data->email ?>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Name</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-name" name="fullName" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-name' ?>" data-title="Enter full name"><?php echo $data->name ?></a>
		            			</div>
		            		</div>

			            	<div class="row">
		            			<div class="col-xs-4 col-sm-5">Mobile</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-mobile" name="mobile" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-mobile' ?>" data-title="Enter mobile no."><?php echo $data->mobile ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Organisation</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-organisation" name="organisation" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-organisation' ?>" data-title="Enter organisation name"><?php echo $data->organisation ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Designation</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-designation" name="designation" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-designation' ?>" data-title="Enter designation name"><?php echo $data->designation ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Location</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-location" name="location" data-type="textarea" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-address' ?>" data-title="Enter full address"><?php echo $data->address ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">City</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-city" name="city" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-city' ?>" data-title="Enter city"><?php echo $data->city ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">State</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-state" name="state" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-state' ?>" data-title="Enter state"><?php echo $data->state ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">Country</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-country" name="country" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-country' ?>" data-title="Enter country"><?php echo $data->country ?></a>
		            			</div>
		            		</div>

		            		<div class="row">
		            			<div class="col-xs-4 col-sm-5">PinCode</div>
		            			<div class="col-xs-2 col-sm-2">:</div>
		            			<div class="col-xs-6 col-sm-5">
		            				<a href="#" id="profile-item-pincode" name="pincode" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-pincode' ?>" data-title="Enter pincode"><?php echo $data->pincode ?></a>
		            			</div>
		            		</div>

		            	</div>
		            </div>
		            <div class="col-sm-3"></div>
		        </div>
		        <div id="sectionB" class="tab-pane fade">
		        <br>
		        <?php 
		        	$configUrl = PROFILE_URL;
	        		$data = $this->HomeModel->showOwnProducts($loggedUser, $configUrl);
	        		$rows = $data->rows;
	        		$count = $data->count;

	        		if($count != 0) {
		        	echo "<div class='row'>";
		        	foreach ($rows as $row) { ?>
		
		            	<div class="col-xs-6 col-sm-4 col-md-3">
			            	<div class="panel panel-default">
							    <div class="panel-body">
							    	<a href='<?php echo UPDATE_PRODUCT_URL.$this->HomeModel->encode($row->id); ?>'>
							    		<img src="<?php echo IMAGE_PATH.$row->productPic ?>" class="img-responsive">
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
		            <?php 
		        		} echo "</div>"; } else {
		        			echo "<div class='col-sm-12'>";
			                echo    "<img src='".IMAGE_PATH."no-magento-product-found.jpg' class='img-responsive center-block' />";
			                echo "</div>";
		             	}	        	
			        ?>
		        	<div class="row">
		        		<div class="col-sm-12"><?php echo $this->pagination->create_links(); ?></div>
		        	</div> 
		        </div>
		        <div id="sectionC" class="tab-pane fade">
		        <br>

		        <div class="col-sm-6">
		        <p class="change-password-title">Change Password</p><p><?php echo $status ?></p><hr>
		        	<?php echo form_open('change-password') ?>
		        	<div class="form-group">
				        <label class="<?php echo form_error('change-password-old') != '' ? "change-password-old" : "" ?>">
				        	<?php echo form_error('change-password-old') != '' ? form_error('change-password-old') : "Old Password" ?>
				        </label>
				        <input type="text" required="" class="form-control" name="change-password-old" id="inputPassword" placeholder="Old Password" value="">
			    	</div>
			    	<div class="form-group">
				        <label class="<?php echo form_error('change-password-new') != '' ? "change-password-new" : "" ?>">
				        	<?php echo form_error('change-password-new') != '' ? form_error('change-password-new') : "New Password" ?>
				        </label>
				        <input type="text" required="" class="form-control" name="change-password-new" id="inputPassword" placeholder="New Password" value="">
			    	</div>
			    	<div class="form-group">
				        <label class="<?php echo form_error('change-password-confirm') != '' ? "change-password-confirm" : "" ?>">
				        	<?php echo form_error('change-password-confirm') != '' ? form_error('change-password-confirm') : "Confirm Password" ?>
				        </label>
				        <input type="text" required="" class="form-control" name="change-password-confirm" id="inputPassword" placeholder="Confirm Password" value="">
			    	</div>
			    	<button type="submit" class="btn btn-primary">Change Password</button>
			    	<?php echo form_close() ?>
		        </div>


		        </div>
		    </div>
		</div>
	</div>
</div>