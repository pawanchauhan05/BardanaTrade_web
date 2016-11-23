<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
        <?php
          if($this->uri->segment(2) == 'sell-products-request') {
            $forWhich = 'Sell';
          } else if($this->uri->segment(2) == 'buy-products-request') {
            $forWhich = 'Buy';
          } else { redirect('admin'); }
        ?>
          <h2><?php echo $forWhich ?> Products Request List <small>Request</small></h2>
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
        <div class="x_content">
          <?php 
              $configUrl = ADMIN_PRODUCT_REQUEST_DETAILS_URL;
              $data = $this->AdminModel->showInActiveProducts($forWhich, $configUrl);
              $rows = $data->rows;
              $count = $data->count;

              if($count != 0) {
              echo "<div class='row'>";
              $message = $this->session->flashdata('message');
              if(isset($message)) {
              echo "<div class='col-sm-12'>";
              echo "<h5>".$message."</h5>";
              echo "</div>";
              }


              foreach ($rows as $row) { ?>
    
                  <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <a href='<?php echo ADMIN_PRODUCT_REQUEST_DETAILS_URL.$this->HomeModel->encode($row->id); ?>'>
                          <img src="<?php echo IMAGE_PATH.$row->productPic ?>" class="img-responsive">
                        </a>
                        <h3 class="text-center"><?php echo $row->productName ?></h3>
                        <p><?php echo word_limiter($row->productDescription, 5) ?></p>
                        <div class="">
                          <p class="pull-left"><?php echo $row->price ." INR" ?></p>
                          <p class="pull-right">Posted <?php echo date("d F", $row->postedOn) ?></p>
                        </div>
                        <div>
                          <div class="pull-left">
                            <?php echo form_open('admin/approve-product'); ?>
                            <input type="hidden" name="id" value="<?php echo $row->id ?>">
                            <input type="hidden" name="currentUrl" value="<?php echo $this->uri->segment(2); ?>">
                            <button type="submit" class="btn btn-primary pull-left">Approve</button>
                            <?php echo form_close(); ?>
                          </div>
                          <div class="pull-right">
                            <?php echo form_open('admin/delete-product'); ?>
                            <input type="hidden" name="id" value="<?php echo $row->id ?>">
                            <input type="hidden" name="currentUrl" value="<?php echo $this->uri->segment(2);  ?>">
                            <input type="hidden" name="productPic" value="<?php echo $row->productPic ?>">
                            <button type="submit" class="btn btn-danger pull-right">Delete</button>
                            <?php echo form_close(); ?>
                          </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } echo "</div>"; } else { 
                  echo "<div class='col-sm-12'>";
                  echo    "<img src='".IMAGE_PATH."no-magento-product-found.jpg' class='img-responsive center-block' />";
                  echo "</div>"; 
                } 
              ?>
              <div class="row">
                <div class="col-sm-12"><?php echo $this->pagination->create_links(); ?></div>
              </div> 
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
    border-radius: 5px 5px 0 0;
}

.card-container {
    padding: 2px 16px;
}
</style>