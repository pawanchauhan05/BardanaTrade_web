<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
    <div class="count"><?php echo $this->AdminModel->totalCount('Users'); ?></div>
    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-mobile"></i> Total Products</span>
    <div class="count"><?php echo $this->AdminModel->totalCount('Products'); ?></div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Sell Products</span>
    <div class="count green"><?php echo $this->AdminModel->totalTypeProducts('Sell'); ?></div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Buy Products</span>
    <div class="count"><?php echo $this->AdminModel->totalTypeProducts('Buy'); ?></div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Sell Request</span>
    <div class="count"><?php echo $this->AdminModel->totalTypeRequestProducts('Sell'); ?></div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Buy Request</span>
    <div class="count"><?php echo $this->AdminModel->totalTypeRequestProducts('Buy'); ?></div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
</div>
<!-- /top tiles -->


<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Visitors location  <small>geo-presentation</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div id="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height_320 overflow_hidden">
      <div class="x_title">
        <h2>Device Usage</h2>
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
        <table class="" style="width:100%">
          <tr>
            <th style="width:37%;">
              <p>Top 5</p>
            </th>
            <th>
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <p class="">Device</p>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <p class="">Progress</p>
              </div>
            </th>
          </tr>
          <tr>
            <td>
              <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                <tr>
                  <td>
                    <p><i class="fa fa-square blue"></i>Chrome </p>
                  </td>
                  <td><?php echo $this->AdminModel->getUserAgent('Chrome')."%" ?></td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square green"></i>Firefox </p>
                  </td>
                  <td><?php echo $this->AdminModel->getUserAgent('Firefox')."%" ?></td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square purple"></i>Android </p>
                  </td>
                  <td><?php echo $this->AdminModel->getUserAgent('Android')."%" ?></td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square aero"></i>IOS </p>
                  </td>
                  <td><?php echo $this->AdminModel->getUserAgent('IOS')."%" ?></td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square red"></i>Others </p>
                  </td>
                  <td><?php echo $this->AdminModel->getUserAgent('Others')."%" ?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>