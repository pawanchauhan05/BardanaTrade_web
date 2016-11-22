<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<p class="product-form-title"><?php echo $forWhich ?> Product  </p><?php echo $status ?><hr>
		<?php echo form_open_multipart('post-product') ?>
		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-name') != '' ? "product-form-name" : "" ?>">
		        	<?php echo form_error('product-form-name') != '' ? form_error('product-form-name') : "Product" ?>
		        </label>
			    <select class="form-control" name="product-form-name" onchange="showInputFeild(this);">
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
		    	<input type="text" name="product-form-other" class="form-control tooltip-others" id="product-form-others" data-tooltip-content="#tooltip_content_for_others" style="display: none;" placeholder="Product Type">
		    </div>

		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-price') != '' ? "product-form-price" : "" ?>">
		        	<?php echo form_error('product-form-price') != '' ? form_error('product-form-price') : "Price" ?>
		        </label>
		        <input type="number" required="" name="product-form-price" class="form-control tooltip-price" data-tooltip-content="#tooltip_content_for_price" id="inputPassword" placeholder="Price">
		    </div>
		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-brand') != '' ? "product-form-brand" : "" ?>">
		        	<?php echo form_error('product-form-brand') != '' ? form_error('product-form-brand') : "Brand" ?>
		        </label>
		        <input type="text" required="" name="product-form-brand" class="form-control tooltip-brand" data-tooltip-content="#tooltip_content_for_brand" placeholder="Brand">
		    </div>
		    <div class="form-group">
		    	<label class="<?php echo form_error('product-form-image') != '' ? "product-form-image" : "" ?>">
		        	<?php echo $error != '' ? $error : "Product image" ?>
		        </label>
			    <div class="input-group">
	                <input type="file" name="product-form-image" class="form-control tooltip-image" data-tooltip-content="#tooltip_content_for_image" placeholder="select product image">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-default">Browse image</button>
	                </span>
	            </div>
	        </div>
		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-description') != '' ? "product-form-description" : "" ?>">
		        	<?php echo form_error('product-form-description') != '' ? form_error('product-form-description') : "Description" ?>
		        </label>
		        <textarea type="text" required="" name="product-form-description" data-tooltip-content="#tooltip_content_for_description" class="form-control tooltip-description" rows="3" placeholder="Enter product discription"></textarea>
		    </div>
		    <input type="hidden" name="forWhich" value="<?=$forWhich?>">
		    <button type="submit" class="btn btn-primary">Submit</button>

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
		<div class="col-sm-6">
			
		</div>
	</div>
</div>
<style type="text/css">
.tooltip_templates { display: none; }
</style>