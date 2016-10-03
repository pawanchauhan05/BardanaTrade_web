<div class="container">
	<div class="row">
		<div class="col-sm-4 col-xs-12">
			<img src="<?php echo base_url() ?>images/t7.jpg" class="img-responsive">
		</div>
		<div class="col-sm-8 col-xs-12">
			<div class="row">
				<?php 
					$id = $this->HomeModel->decode($this->uri->segment(2)); 
					if(!is_numeric($id)) {
						redirect('products');
					}
					$row = $this->HomeModel->getProductDetails($id);
					$data = $this->HomeModel->getContactDetails($row->email);

				?>
				<div class="col-sm-5 col-xs-6 product-details">Product Name</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-6 product-details"><?php echo $row->productName ?></div>

				<div class="col-sm-5 col-xs-6 product-details">Price</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-6 product-details"><?php echo $row->price. " INR" ?></div>

				<div class="col-sm-5 col-xs-6 product-details">Category</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-6 product-details"><?php echo $row->productCategory ?></div>

				<div class="col-sm-5 col-xs-6 product-details">Brand</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-6 product-details"><?php echo $row->brand ?></div>

				<div class="col-sm-5 col-xs-6 product-details">Posted On</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-6 product-details"><?php echo date("d F Y", $row->postedOn) ?></div>

				<div class="col-sm-5 col-xs-12 product-details">Description</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-5 col-xs-12 product-details">
					<div class="form-group">
				        <textarea type="date" class="form-control" rows="3" readonly="readonly" placeholder="Enter product discription"><?php echo $row->productDescription ?>
				        </textarea>
				    </div>
				</div>

				<div class="col-sm-12">
					<p class="product-details-contact">Contact Details</p>
				</div>

				<div class="col-sm-5 col-xs-12 product-details">Name</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-4 col-xs-12 product-details"><?php echo $data->name ?></div>

				<div class="col-sm-5 col-xs-12 product-details">Company</div>
				<div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
				<div class="col-sm-4 col-xs-12 product-details"><?php echo $data->organisation ?></div>

				<div class="col-sm-12">
					<br>
					<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Contact Here</button>
				</div>

			</div>
		</div>
	</div>
</div>