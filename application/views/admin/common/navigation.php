<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Bardana Trade!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="<?php echo base_url() ?>images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php $sessionData = $this->AdminModel->readSessionData(); echo $sessionData['sessionData']['name']; ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Admin</h3>
        <ul class="nav side-menu">
          
          <li><a href="<?php echo base_url()."index.php/admin"; ?>"><i class="fa fa-home"></i> Home </a>
          </li>

          <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url()."index.php/admin/users"; ?>">Registered Users</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url()."index.php/admin/sell-products"; ?>">Sell Products</a></li>
              <li><a href="<?php echo base_url()."index.php/admin/buy-products"; ?>">Buy Products</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> Slider <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="general_elements.html">Update Slider</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Latest Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url()."index.php/admin/latest-bags"; ?>">Bags</a></li>
              <li><a href="<?php echo base_url()."index.php/admin/latest-twines"; ?>">Twine & Yarn</a></li>
              <li><a href="<?php echo base_url()."index.php/admin/latest-machines"; ?>">Machines</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Product Request <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url()."index.php/admin/sell-products-request"; ?>">Sell Product</a></li>
              <li><a href="<?php echo base_url()."index.php/admin/buy-products-request"; ?>">Buy Product</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url()."index.php/admin/logout" ?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>