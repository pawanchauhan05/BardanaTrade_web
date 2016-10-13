<div class="container">
	<div class="row">
	<?php
	$sessionData = $this->HomeModel->readSessionData();
	$email = $sessionData['sessionData']['email'];
	$data = $this->HomeModel->getUserInfo($email); 
	?>
		<div class="col-sm-6">
			<p class="feedback-title">Feedback</p><p><?php echo $status ?></p><hr>
			<?php echo form_open('sendFeedback') ?>
			    <div class="form-group">
			        <label class="<?php echo form_error('feedback-subject') != '' ? "feedback-subject" : "" ?>">
			        	<?php echo form_error('feedback-subject') != '' ? form_error('feedback-subject') : "Subject" ?>
			        </label>
			        <input type="text" name="feedback-subject" class="form-control" id="inputSubject" placeholder="Subject">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('feedback-message') != '' ? "feedback-message" : "" ?>">
			        	<?php echo form_error('feedback-message') != '' ? form_error('feedback-message') : "Message" ?>
			        </label>
			        <textarea type="text" name="feedback-message" class="form-control" id="inputPassword" rows="3" placeholder="Message"></textarea> 
			    </div>
			    <input type="hidden" name="feedback-mobile" value="<?php echo $data->mobile ?>">
			    <input type="hidden" name="feedback-email" value="<?php echo $data->email ?>">
			    <input type="hidden" name="feedback-name" value="<?php echo $data->name ?>">
			    <button type="submit" class="btn btn-primary">Submit</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>