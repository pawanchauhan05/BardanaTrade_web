<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<p class="sign-up-title">Please update your remaining profile</p><hr>
			<?php echo form_open('user-profile-complete') ?>
			    <div class="form-group">
			        <label class="<?php echo form_error('check-profile-organisation') != '' ? "check-profile-organisation" : "" ?>">
			        	<?php echo form_error('check-profile-organisation') != '' ? form_error('check-profile-organisation') : "Organization" ?>
			        </label>
			        <input type="text" name="check-profile-organisation" class="form-control" id="inputEmail" placeholder="Organization">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('check-profile-designation') != '' ? "check-profile-designation" : "" ?>">
			        	<?php echo form_error('check-profile-designation') != '' ? form_error('check-profile-designation') : "Designation" ?>
			        </label>
			        <input type="text" name="check-profile-designation" class="form-control" id="inputPassword" placeholder="Designation">
			    </div>
			    <div class="row">
				    <div class="form-group">
					    <div class="col-sm-6">
					        <label class="<?php echo form_error('check-profile-country') != '' ? "check-profile-country" : "" ?>">
					        	<?php echo form_error('check-profile-country') != '' ? form_error('check-profile-country') : "Country" ?>
					        </label>
					        <input type="text" name="check-profile-country" class="form-control" id="inputPassword" placeholder="Country">
					    </div>
					    <div class="col-sm-6">
					        <label class="<?php echo form_error('check-profile-state') != '' ? "check-profile-state" : "" ?>">
					        	<?php echo form_error('check-profile-state') != '' ? form_error('check-profile-state') : "State" ?>
					        </label>
					        <input type="text" name="check-profile-state" class="form-control" id="inputPassword" placeholder="State">
					    </div>
				    </div>
			    </div><br>
			    <div class="row">
				    <div class="form-group">
					    <div class="col-sm-6">
					        <label class="<?php echo form_error('check-profile-city') != '' ? "check-profile-city" : "" ?>">
					        	<?php echo form_error('check-profile-city') != '' ? form_error('check-profile-city') : "City" ?>
					        </label>
					        <input type="text" name="check-profile-city" class="form-control" id="inputPassword" placeholder="City">
					    </div>
					    <div class="col-sm-6">
					        <label class="<?php echo form_error('check-profile-pincode') != '' ? "check-profile-pincode" : "" ?>">
					        	<?php echo form_error('check-profile-pincode') != '' ? form_error('check-profile-pincode') : "Pincode" ?>
					        </label>
					        <input type="number" name="check-profile-pincode" class="form-control" id="inputPassword" placeholder="Pincode">
					    </div>
				    </div>
			    </div>
			    <br>
			    <div class="form-group">
			        <label class="<?php echo form_error('check-profile-address') != '' ? "check-profile-address" : "" ?>">
			        	<?php echo form_error('check-profile-address') != '' ? form_error('check-profile-address') : "Address" ?>
			        </label>
			        <textarea type="text" name="check-profile-address" class="form-control" rows="3" placeholder="Address"></textarea>
			    </div>
			    
			    <button type="submit" class="btn btn-primary">Update</button>
			<?php echo form_close() ?>
		</div>
	</div>
</div>