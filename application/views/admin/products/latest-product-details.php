<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Product Details <small>Product</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <?php 
          $id = $this->HomeModel->decode($this->uri->segment(3)); 
          if(!is_numeric($id)) {
            redirect('admin');
          }
          $row = $this->HomeModel->getProductDetails($id);
          $data = $this->HomeModel->getContactDetails($row->email);

        ?>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-4 col-xs-12">
              <img src="<?php echo IMAGE_PATH. $row->productPic ?>" class="img-responsive center-block">
            </div>
            <div class="col-sm-8 col-xs-12">
              <div class="row">
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

                <div class="col-sm-5 col-xs-12 product-details">Email</div>
                <div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
                <div class="col-sm-4 col-xs-12 product-details"><?php echo $data->email ?></div>

                <div class="col-sm-5 col-xs-12 product-details">Mobile</div>
                <div class="col-sm-2 col-xs-2 hidden-xs product-details">:</div>
                <div class="col-sm-4 col-xs-12 product-details"><?php echo $data->mobile ?></div>

                <div class="col-sm-12">
                  <br>

                  <?php
                  if($row->isLatest == 1) { 
                  echo form_open('admin/remove-product-from-latest'); ?>
                  <input type="hidden" name="id" value="<?php echo $row->id ?>">
                  <input type="hidden" name="currentUrl" value="<?php echo $this->uri->segment(2) ?>">
                  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Remove</button>
                  <?php
                  } else { 
                  echo form_close(); ?>
                  <?php echo form_open('admin/add-product-to-latest'); ?>
                  <input type="hidden" name="id" value="<?php echo $row->id ?>">
                  <input type="hidden" name="currentUrl" value="<?php echo $this->uri->segment(2) ?>">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add to Latest</button>
                  <?php echo form_close(); }; ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>