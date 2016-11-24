<!-- top header -->
<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<p class="top-left">
					<span class="top-head-title">Hi,</span> 
					<?php
						$sessionData = $this->HomeModel->readSessionData();
        				if(isset($sessionData['sessionData'])) { ?>
        					<a href="<?php echo base_url() ?>index.php/profile" class='top-head-title'><?php echo $sessionData['sessionData']['name'] ?></a>
        			<?php
        				} else { ?>
        					<a href="" class='top-head-title'>My BardanaTrade</a>
        			<?php	}
					 ?>
					
				</p>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<p class="top-right">
					<a href="<?php echo CONTACT_URL ?>" class="top-head-title">Contact</a> 
					<span class="top-head-title">|</span>
					<?php
						$sessionData = $this->HomeModel->readSessionData();
        				if(isset($sessionData['sessionData'])) { ?>
						<a href="<?php echo USER_LOGOUT_URL ?>" class='top-head-title'><?php echo "Logout" ?></a>
        				<?php } else { ?>
        					<a href="<?php echo LOGIN_URL ?> ?>" class="top-head-title">Create Account</a> 
					<span class="top-head-title">|</span> 
					<a href="<?php echo LOGIN_URL ?>" class="top-head-title">Login</a>
        				<?php } ?>
				</p>
			</div>
		</div>
	</div>
</div>

<div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<img src="<?php echo base_url() ?>images/logo.jpg" alt="" class="logo img-responsive"/>
			</div>
			<div class="col-sm-6">
				<div class="head-button">
					<a href="<?php echo PRODUCT_SELL_FORM_URL ?>" class="btn btn-success head-post-sell-button">Post Sell Request</a>
					<a href="<?php echo PRODUCT_BUY_FORM_URL ?>" class="btn btn-warning head-post-buy-button">Post Buy Request</a>
				</div>
			</div>
		</div>
	</div>
</div>