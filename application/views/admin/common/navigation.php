<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Bardana Trade!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="<?php echo IMAGE_PATH ?>img.jpg" alt="..." class="img-circle profile_img">
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
          
          <li><a href="<?php echo ADMIN_HOME_URL ?>"><i class="fa fa-home"></i> Home </a>
          </li>

          <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo ADMIN_USERS_URL ?>">Registered Users</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo ADMIN_SELL_PRODUCTS_URL ?>">Sell Products</a></li>
              <li><a href="<?php echo ADMIN_BUY_PRODUCTS_URL ?>">Buy Products</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> Slider <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="general_elements.html">Update Slider</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Latest Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo ADMIN_LATEST_BAGS_URL?>">Bags</a></li>
              <li><a href="<?php echo ADMIN_LATEST_TWINES_URL ?>">Twine & Yarn</a></li>
              <li><a href="<?php echo ADMIN_LATEST_MACHINES_URL ?>">Machines</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Product Request <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo ADMIN_SELL_PRODUCTS_REQUEST_URL ?>">Sell Product</a></li>
              <li><a href="<?php echo ADMIN_BUY_PRODUCTS_REQUEST_URL ?>">Buy Product</a></li>
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
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo ADMIN_LOGOUT_URL ?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>