<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<?php 
					$id = $this->HomeModel->decode($this->uri->segment(2)); 
					if(is_numeric($id) && $productId == "") {
						$row = $this->HomeModel->getProductDetails($id);
					} else if(is_numeric($productId)) {
						$row = $this->HomeModel->getProductDetails($productId);
					} else {
						redirect('profile');
					}
					

			?>
			<p class="product-form-title">Update Product</p><?php echo $status ?><hr>
			<?php echo form_open_multipart('product-update') ?>
			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-name') != '' ? "update-product-name" : "" ?>">
			        	<?php echo form_error('update-product-name') != '' ? form_error('update-product-name') : "Product" ?>
			        </label>
				    <select class="form-control" name="update-product-name" onchange="showInputFeild(this);">
				    	<option selected disabled=""><?php echo "Already Selected : ".$row->productName ?></option>
				        <option>New Jute Bag</option>
				        <option>Old Jute Bag</option>
				        <option>New Plastic Bag</option>
				        <option>Old Plastic Bag</option>
				        <option>Jute Twine</option>
				        <option>Thread/Yarn</option>
				        <option>Jute Roll</option>
				        <option>Plastic Roll</option>
				        <option>Hessian Clothe</option>
				        <option>Sewing/Stitching Machine</option>
				        <option>Others</option>
				    </select>
			    </div>

			    <div class="form-group">
			    	<input type="text" name="update-product-other" class="form-control" id="product-form-others" style="display: none;" placeholder="Product Type">
			    </div>

			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-price') != '' ? "update-product-price" : "" ?>">
			        	<?php echo form_error('update-product-price') != '' ? form_error('update-product-price') : "Price" ?>
			        </label>
			        <input type="text" class="form-control" name="update-product-price" id="inputPassword" placeholder="Price" value="<?php echo $row->price ?>">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-brand') != '' ? "update-product-brand" : "" ?>">
			        	<?php echo form_error('update-product-brand') != '' ? form_error('update-product-brand') : "Brand" ?>
			        </label>
			        <input type="text" class="form-control" name="update-product-brand" id="inputPassword" placeholder="Brand" value="<?php echo $row->brand ?>">
			    </div>
			    <div class="form-group">
			    	<label class="<?php echo $error != '' ? "update-product-image" : "" ?>">
			    		<?php echo $error != '' ? $error : "Select Product" ?>
			    	</label>
				    <div class="input-group">
		                <input type="file" name="update-product-image" class="form-control" placeholder="select product image">
		                <span class="input-group-btn">
		                    <button type="button" class="btn btn-default">Browse image</button>
		                </span>
		            </div>
		        </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-description') != '' ? "update-product-description" : "" ?>">
			        	<?php echo form_error('update-product-description') != '' ? form_error('update-product-description') : "Description" ?>
			        </label>
			        <textarea type="text" class="form-control" name="update-product-description" rows="3" placeholder="Enter product discription"><?php echo $row->productDescription ?></textarea>
			    </div>
			    <input type="hidden" name="update-product-productId" value="<?php echo $row->id ?>">
			    <button type="submit" class="btn btn-primary">Update</button>
			<?php echo form_close() ?>
		</div>
		<div class="col-sm-6"></div>
	</div>
</div>