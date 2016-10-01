<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<p class="product-form-title"><?php echo $forWhich ?> Product  </p>
		<form>
		    <div class="form-group">
		        <label for="buy">Product</label>
			    <select class="form-control" id="buy" onchange="showInputFeild(this);">
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
		    	<input type="password" class="form-control" id="product-form-others" style="display: none;" placeholder="Product Type">
		    </div>

		    <div class="form-group">
		        <label for="inputPassword">Price</label>
		        <input type="password" class="form-control" id="inputPassword" placeholder="Price">
		    </div>
		    <div class="form-group">
		        <label for="inputPassword">Brand</label>
		        <input type="password" class="form-control" id="inputPassword" placeholder="Brand">
		    </div>
		    <div class="form-group">
		    	<label for="inputPassword">Select Product</label>
			    <div class="input-group">
	                <input type="file" class="form-control" placeholder="select product image">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-default">Browse image</button>
	                </span>
	            </div>
	        </div>
		    <div class="form-group">
		        <label for="inputPassword">Product Description</label>
		        <textarea type="date" class="form-control" rows="3" placeholder="Enter product discription"></textarea>
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>
</div>