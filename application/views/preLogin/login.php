<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<p class="sign-up-title">New User? Create An Account</p><?php echo $signUpStatus ?><hr>
			<?php echo form_open('user-signUp') ?>
			    <div class="form-group">
			        <label class="<?php echo form_error('signup-fullName') != '' ? "signup-fullName" : "" ?>">
			        	<?php echo form_error('signup-fullName') != '' ? form_error('signup-fullName') : "Full Name" ?>
			        </label>
			        <input type="text" name="signup-fullName" class="form-control" id="inputEmail" placeholder="Full Name" required="">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('signup-email') != '' ? "signup-email" : "" ?>">
			        	<?php echo form_error('signup-email') != '' ? form_error('signup-email') : "Email" ?>
			        </label>
			        <input type="email" name="signup-email" class="form-control" id="inputPassword" placeholder="Email" required="">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('signup-password') != '' ? "signup-password" : "" ?>">
			        	<?php echo form_error('signup-password') != '' ? form_error('signup-password') : "Password" ?>
			        </label>
			        <input type="password" name="signup-password" class="form-control" id="inputPassword" placeholder="Password" required="">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('signup-mobile') != '' ? "signup-mobile" : "" ?>">
			        	<?php echo form_error('signup-mobile') != '' ? form_error('signup-mobile') : "Mobile" ?>
			        </label>
			        <input type="number" name="signup-mobile" class="form-control" id="inputPassword" placeholder="Mobile" required="">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('signup-mobile') != '' ? "signup-mobile" : "" ?>">
			        	<?php echo form_error('signup-dob') != '' ? form_error('signup-dob') : "DOB" ?>
			        </label>
			        <input type="date" name="signup-dob" class="form-control" id="inputPassword" placeholder="DOB" required="">
			    </div>
			    <div class="checkbox">
			        <label>
			        	<input type="checkbox" name="signup-tnc" required=""> I Agree To Bardanatrade.com Terms Of Service
			        </label>
			    </div>
			    <button type="submit" class="btn btn-primary">Sign Up</button>
			<?php echo form_close() ?>
		</div>
		<div class="col-sm-6">
			<p class="login-title">Existing User Sign In</p>
			<?php $message = $this->session->flashdata('message');
					if(isset($message)) {
						echo $message;
					}
			?>
			<?php echo $status  ?><hr>
                        <a href="<?php echo $this->facebook->login_url() ?>">
                        <img src="<?php echo IMAGE_PATH.'login-with-fb.png' ?>" class="img-responsive center-block" />
                        </a>
                        <div class="row loginOr">
                            <div class="col-lg-12">
                              <hr class="hrOr">
                              <span class="spanOr">or</span>
                            </div>
                        </div>
                        
			<?php echo form_open('user-login') ?>
			    <div class="form-group">
			        <label for="inputEmail" class="<?php echo form_error('login-email') != '' ? "login-email" : "" ?>">
			        <?php echo form_error('login-email') != '' ? form_error('login-email') : "Email" ?>
			        </label>
			        <input type="email" name="login-email" class="form-control" id="inputEmail" placeholder="Email" required="">
			    </div>
			    <div class="form-group">
			        <label for="inputPassword" class="<?php echo form_error('login-password') != '' ? "login-password" : "" ?>">
			        <?php echo form_error('login-password') != '' ? form_error('login-password') : "Password" ?>	
			        </label>
			        <input type="password" name="login-password" class="form-control" id="inputPassword" placeholder="Password" required="">
			    </div>
			    <button type="submit" class="btn btn-primary">Sign In</button> <a href="" class="pull-right">Forgot Your Password ?</a>
			<?php echo form_close() ?>

		</div>
	</div>
</div>
