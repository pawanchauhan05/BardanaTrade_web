<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<p class="product-form-title"><?php echo $forWhich ?> Product  </p><?php echo $status ?><hr>
		<?php echo form_open_multipart('sell-product') ?>
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
			        <option>Sewing/Stitching Machine</option>
			        <option>Others</option>
			    </select>
		    </div>

		    <div class="form-group">
		    	<input type="text" name="product-form-other" class="form-control" id="product-form-others" style="display: none;" placeholder="Product Type">
		    </div>

		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-price') != '' ? "product-form-price" : "" ?>">
		        	<?php echo form_error('product-form-price') != '' ? form_error('product-form-price') : "Price" ?>
		        </label>
		        <input type="number" name="product-form-price" class="form-control" id="inputPassword" placeholder="Price">
		    </div>
		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-brand') != '' ? "product-form-brand" : "" ?>">
		        	<?php echo form_error('product-form-brand') != '' ? form_error('product-form-brand') : "Brand" ?>
		        </label>
		        <input type="text" name="product-form-brand" class="form-control" placeholder="Brand">
		    </div>
		    <div class="form-group">
		    	<label class="<?php echo form_error('product-form-image') != '' ? "product-form-image" : "" ?>">
		        	<?php echo $error != '' ? $error : "Product image" ?>
		        </label>
			    <div class="input-group">
	                <input type="file" name="product-form-image" class="form-control" placeholder="select product image">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-default">Browse image</button>
	                </span>
	            </div>
	        </div>
		    <div class="form-group">
		        <label class="<?php echo form_error('product-form-description') != '' ? "product-form-description" : "" ?>">
		        	<?php echo form_error('product-form-description') != '' ? form_error('product-form-description') : "Description" ?>
		        </label>
		        <textarea type="text" name="product-form-description" class="form-control" rows="3" placeholder="Enter product discription"></textarea>
		    </div>
		    <input type="hidden" name="forWhich" value="<?=$forWhich?>">
		    <button type="submit" class="btn btn-primary">Submit</button>
		<?php echo form_close() ?>
		</div>
	</div>
</div>