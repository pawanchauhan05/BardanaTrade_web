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
				        <option>Stitching Machine</option>
				        <option>Sewing Machine</option>
				        <option>Others</option>
				    </select>
			    </div>

			    <div class="form-group">
			    	<input type="text" name="update-product-other" class="form-control tooltip-others" id="product-form-others" data-tooltip-content="#tooltip_content_for_others" id="product-form-others" style="display: none;" placeholder="Product Type">
			    </div>

			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-price') != '' ? "update-product-price" : "" ?>">
			        	<?php echo form_error('update-product-price') != '' ? form_error('update-product-price') : "Price" ?>
			        </label>
			        <input type="text" required="" class="form-control tooltip-price" name="update-product-price" data-tooltip-content="#tooltip_content_for_price" id="inputPassword" placeholder="Price" value="<?php echo $row->price ?>">
			    </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-brand') != '' ? "update-product-brand" : "" ?>">
			        	<?php echo form_error('update-product-brand') != '' ? form_error('update-product-brand') : "Brand" ?>
			        </label>
			        <input type="text" required="" class="form-control tooltip-brand" data-tooltip-content="#tooltip_content_for_brand" name="update-product-brand" placeholder="Brand" value="<?php echo $row->brand ?>">
			    </div>
			    <div class="form-group">
			    	<label class="<?php echo $error != '' ? "update-product-image" : "" ?>">
			    		<?php echo $error != '' ? $error : "Select Product" ?>
			    	</label>
				    <div class="input-group">
		                <input type="file" name="update-product-image" class="form-control tooltip-image" data-tooltip-content="#tooltip_content_for_image" placeholder="select product image">
		                <span class="input-group-btn">
		                    <button type="button" class="btn btn-default">Browse image</button>
		                </span>
		            </div>
		        </div>
			    <div class="form-group">
			        <label class="<?php echo form_error('update-product-description') != '' ? "update-product-description" : "" ?>">
			        	<?php echo form_error('update-product-description') != '' ? form_error('update-product-description') : "Description" ?>
			        </label>
			        <textarea type="text" required="" class="form-control tooltip-description" data-tooltip-content="#tooltip_content_for_description" name="update-product-description" rows="3" placeholder="Enter product discription"><?php echo $row->productDescription ?></textarea>
			    </div>
			    <input type="hidden" name="update-product-productId" value="<?php echo $row->id ?>">
			    <button type="submit" class="btn btn-primary">Update</button>
			<?php echo form_close() ?>

				<div class="tooltip_templates">
				    <span id="tooltip_content_for_price">
				        <ul>
				        	<li>This field is required.</li>
				        	<li>Please enter price in which you want to Sell/Buy your product.</li>
				        </ul>
				    </span>
				</div>
				<div class="tooltip_templates">
				    <span id="tooltip_content_for_brand">
				        <ul>
				        	<li>This field is required.</li>
				        	<li>Please enter brand name which you want to Sell/Buy.</li>
				        </ul>
				    </span>
				</div>
				<div class="tooltip_templates">
				    <span id="tooltip_content_for_image">
				        <ul>
				        	<li>This field is required.</li>
				        	<li>Please upload product image which you want to Sell/Buy.</li>
				        	<li>Product image may be different compare to original product.</li>
				        	<li>Product image should be 500x500 px to get visitors.</li>
				        </ul>
				    </span>
				</div>
				<div class="tooltip_templates">
				    <span id="tooltip_content_for_description">
				        <ul>
				        	<li>This field is required.</li>
				        	<li>Please provide sufficient discription about product which you want to Sell/Buy.</li>
				        	<li>Include the features, model, weight and any included accessories.</li>
				        	<li>Remember, a good description needs at least 2-3 sentences.</li>
				        </ul>
				    </span>
				</div>
				<div class="tooltip_templates">
				    <span id="tooltip_content_for_others">
				        <ul>
				        	<li>This field is required.</li>
				        	<li>Please provide product name which you want to Sell/Buy.</li>
				        </ul>
				    </span>
				</div>
		</div>
		<div class="col-sm-6"></div>
	</div>
</div>
<style type="text/css">
.tooltip_templates { display: none; }
</style>