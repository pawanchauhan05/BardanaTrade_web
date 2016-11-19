<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		        <!-- Carousel indicators -->
		        <ol class="carousel-indicators">
		            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		            <li data-target="#myCarousel" data-slide-to="1"></li>
		            <li data-target="#myCarousel" data-slide-to="2"></li>
		            <li data-target="#myCarousel" data-slide-to="3"></li>
		        </ol>   
		        <!-- Wrapper for carousel items -->
		        <div class="carousel-inner">
		            <div class="item active">
		                <img src="<?php echo IMAGE_PATH ?>slider/slider2.jpg" alt="First Slide">
		            </div>
		            <div class="item">
		                <img src="<?php echo IMAGE_PATH ?>slider/slider3.jpg" alt="Second Slide">
		            </div>
		            <div class="item">
		                <img src="<?php echo IMAGE_PATH ?>slider/slider6.jpg" alt="Third Slide">
		            </div>
		            <div class="item">
		                <img src="<?php echo IMAGE_PATH ?>slider/slider8.jpg" alt="Third Slide">
		            </div>
		        </div>
		        <!-- Carousel controls -->
		        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		        </a>
		        <a class="carousel-control right" href="#myCarousel" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		        </a>
		    </div>
		</div>
		<div class="col-sm-4">
			<p class="main-top-buyer-head">Top Buyer</p>
			<p>Person one</p>
			<p>Person two</p>
			<p>Person three</p>
			<p class="main-top-seller-head">Top Seller</p>
			<p>Person one</p>
			<p>Person two</p>
			<p>Person three</p>
			<p class="main-top-special-services-head">Special Service</p>
			<p>Person one</p>
			<p>Person two</p>
			<p>Person three</p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<h1>Welcome To Bardana Trade</h1>
			<p>Our aim is to bring Mandis, Traders, Farmers, and Manufacturers etc. on single platform to ease their activities related to packaging of agro commodities. It will enable traders to buy or sell Jute bags / sacks, Plastic bags / Hessian bags / HDPE bags, Jute Twine / Rope, Thread / Yarn, Machinery used in manufacturing of such bags and packing of agri commodities etc. from any geographic location.</p>
			<p>Currently Bardana trading is highly unorganized. Here is an effort to organize this business. bardanatrade.com will provide platform for buyers and sellers to interact and negotiate with each other similar to physical market. Sellers will deliver physically at negotiated terms to buyers.
			<b>Bardana means Jute bags / Sacks / Gunny bags, Plastic bags, Hessian bags / HDPE bags etc.</b>
			bardanatrade.com is a new venture to provide the best market place for all agri packaging material.
			</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-default">
			    <div class="panel-heading"><a href="<?php echo ALL_PRODUCT_URL ?>">Categories</a></div>
			    <div class="panel-body">
			    	<a href="<?php echo BAGS_URL ?>">Bags</a><br>
			    	<a href="<?php echo TWINE_URL ?>">Twine & Yarn</a><br>
			    	<a href="<?php echo MACHINES_URL ?>">Machines</a><br>
			    	<a href="<?php echo OTHERS_URL ?>">Others</a>
			    </div>
			</div>
			<div class="panel panel-default">
			    <div class="panel-heading">Information</div>
			    <div class="panel-body">
			    	<p>Privacy Policy</p>
			    	<p>Terms & Conditions</p>
			    	<p>About Us</p>
			    	<p>Contact Us</p>
			    	<p>Site Map</p>
			    </div>
			</div>
		</div>
		<div class="col-sm-9">
			<p class="latest-product-title">Latest Products</p>
			<p class="product-title">Bags</p>
			<div class="owl-carousel owl-theme">
			  <?php
			  	$rows = $this->AdminModel->showLatestProducts('Bags');
			  	foreach ($rows as $row) {
			  		$bagsImagePath = IMAGE_PATH.$row->productPic;
			  		echo "<div> <img src='".$bagsImagePath."' class='img-responsive'> </div>";
			  	}
			  ?>
			</div>
			<br>
			<p class="product-title">Thread & Yarn</p>
			<div class="owl-carousel owl-theme">
			  <?php
			  	$rows = $this->AdminModel->showLatestProducts('TwineAndYarn');
			  	foreach ($rows as $row) {
			  		$yarnImagePath = IMAGE_PATH.$row->productPic;
			  		echo "<div> <img src='".$yarnImagePath."' class='img-responsive'> </div>";
			  	}
			  ?>
			</div>

			<p class="product-title">Machines</p>
			<div class="owl-carousel owl-theme">
			  <?php
			  	$rows = $this->AdminModel->showLatestProducts('Machines');
			  	foreach ($rows as $row) {
			  		$machineImagePath = IMAGE_PATH.$row->productPic;
			  		echo "<div> <img src='".$machineImagePath."' class='img-responsive'> </div>";
			  	}
			  ?>
			</div>

		</div>
	</div>
</div>

