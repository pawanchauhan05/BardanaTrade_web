<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Slider Image List <small>Slider</small></h2>
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
            $message = $this->session->flashdata('message');
            if(isset($message)) {
              echo "<h5>". $message ."</h5>";
            }
          ?>
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Slider Name</th>
                <th>Image</th>
                <th>Sequence</th>
                <th>Delete</th>
              </tr>
            </thead>


            <tbody>
            <?php $data = $this->AdminModel->sliderDetails();
              $count = 1;
              if(isset($data)) { 
                foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $row->name ?></td>
                  <td><img src="<?php echo IMAGE_PATH.'slider/'.$row->sliderPic ?>" class="img-responsive" style="width:250px;height:100px;" /></td>
                  <td>
                    <a href="#" id="<?php echo $row->id."slider-sequence" ?>" name="sequence" data-type="text" data-pk="<?php echo $row->id ?>" data-url="<?php echo base_url().'index.php/admin/update-slider-sequence' ?>" data-title="Enter Slider Sequence"><?php echo $row->sequence ?></a>
                  </td>
                  <td>Delete</td>
                </tr>
              <?php $count++; } } ?>
              
            </tbody>
          </table>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              <h2>Add New Slider Image</h2>
              <?php echo form_open_multipart('admin/add-slider') ?>
                <div class="form-group">
                  <div class="form-group">
                    <label>Slider Name</label>
                    <input type="text" name="slider-name" class="form-control" id="" placeholder="Enter Slider Name" required="">
                  </div>

                  <label>Slider Image</label>
                  <div class="input-group">
                        <input type="file" name="slider-image" class="form-control" placeholder="select slider image">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">Browse image</button>
                        </span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Slider</button>
              <?php echo form_close() ?>
            </div>
          </div>

          <div id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Confirmation</h4>
                      </div>
                      <div class="modal-body">
                          <p>Do you want to delete this user ?</p>
                          <p class="text-warning"><small>If you delete, user data deleted.</small></p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" onclick="deleteUser()">Delete</button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      tempEmail = "";
      function createPopup(email) {
        tempEmail = email;
        $("#myModal").modal('show');
      }

      function deleteUser() {
        window.location.href = 'http://localhost/BardanaTrade_web/index.php/admin/deleteUser/'+tempEmail;
        tempEmail = "";
      }


      $(document).ready(function(){
        <?php $data = $this->AdminModel->getSlider();
        foreach ($data as $row) { ?>
          $('<?php echo '#'.$row->id.'slider-sequence' ?>').editable({
           validate: function(value) {
              if($.trim(value) == '') 
                return 'This field is required';
            }
        });
        <?php } ?>
      });

    </script>
  </div>
</div>