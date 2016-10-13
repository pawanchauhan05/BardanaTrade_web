<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<p class="contact-us-title">Contact Us</p><p><?php echo $status ?></p><hr>
			<?php echo form_open('contactUs') ?>
			    <div class="form-group">
			        <label class="<?php echo form_error('contact-us-name') != '' ? "contact-us-name" : "" ?>">
			        	<?php echo form_error('contact-us-name') != '' ? form_error('contact-us-name') : "Name" ?>
			        </label>
			        <input type="text" name="contact-us-name" class="form-control" id="inputName" placeholder="Name">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('contact-us-email') != '' ? "contact-us-email" : "" ?>">
			        	<?php echo form_error('contact-us-email') != '' ? form_error('contact-us-email') : "Email" ?>
			        </label>
			        <input type="email" name="contact-us-email" class="form-control" id="inputEmail" placeholder="Email">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('contact-us-mobile') != '' ? "contact-us-mobile" : "" ?>">
			        	<?php echo form_error('contact-us-mobile') != '' ? form_error('contact-us-mobile') : "Mobile" ?>
			        </label>
			        <input type="number" name="contact-us-mobile" class="form-control" id="inputMobile" placeholder="Mobile">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('contact-us-subject') != '' ? "contact-us-subject" : "" ?>">
			        	<?php echo form_error('contact-us-subject') != '' ? form_error('contact-us-subject') : "subject" ?>
			        </label>
			        <input type="text" name="contact-us-subject" class="form-control" id="inputSubject" placeholder="Subject">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('contact-us-message') != '' ? "contact-us-message" : "" ?>">
			        	<?php echo form_error('contact-us-message') != '' ? form_error('contact-us-message') : "Mobile" ?>
			        </label>
			        <textarea type="text" name="contact-us-message" class="form-control" id="inputPassword" rows="3" placeholder="Message"></textarea> 
			    </div>
			    <button type="submit" class="btn btn-primary">Contact Us</button>
			<?php echo form_close() ?>
		</div>
	</div>
</div>