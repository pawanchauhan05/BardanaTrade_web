<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>User Complete Information <small>Information</small></h2>
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
          $id = $this->HomeModel->decode($this->uri->segment(3));
          if(!is_numeric($id)) {
            redirect('admin/users');
          }
          $data = $this->HomeModel->getUserInfoById($id);
          $totalProducts = $this->HomeModel->getTotalProducts($data->email);
        ?>
          <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <p class="profile-title">Personal Information</p>
                  <div class="profile-items">

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Email</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <?php echo $data->email ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Name</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-name" name="fullName" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-name' ?>" data-title="Enter full name"><?php echo $data->name ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Mobile</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-mobile" name="mobile" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-mobile' ?>" data-title="Enter mobile no."><?php echo $data->mobile ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Organisation</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-organisation" name="organisation" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-organisation' ?>" data-title="Enter organisation name"><?php echo $data->organisation ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Designation</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-designation" name="designation" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-designation' ?>" data-title="Enter designation name"><?php echo $data->designation ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Location</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-location" name="location" data-type="textarea" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-address' ?>" data-title="Enter full address"><?php echo $data->address ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">City</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-city" name="city" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-city' ?>" data-title="Enter city"><?php echo $data->city ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">State</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-state" name="state" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-state' ?>" data-title="Enter state"><?php echo $data->state ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Country</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-country" name="country" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-country' ?>" data-title="Enter country"><?php echo $data->country ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">PinCode</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-pincode" name="pincode" data-type="text" data-pk="<?php echo $data->email ?>" data-url="<?php echo base_url().'index.php/update-user-profile-pincode' ?>" data-title="Enter pincode"><?php echo $data->pincode ?></a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-4 col-sm-5">Products</div>
                      <div class="col-xs-2 col-sm-2">:</div>
                      <div class="col-xs-6 col-sm-5">
                        <a href="#" id="profile-item-pincode"><?php echo $totalProducts ?></a>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-sm-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>