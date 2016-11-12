<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Registered Users List <small>Users</small></h2>
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
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Last Login</th>
                <th>Profile</th>
                <th>Delete</th>
              </tr>
            </thead>


            <tbody>
            <?php $data = $this->AdminModel->userDetails();
              if(isset($data)) { 
                foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $row->name;  ?></td>
                  <td><?php echo $row->email;  ?></td>
                  <td><?php echo date("d F Y", $row->created_at);  ?></td>
                  <td><?php echo date("d F Y", $row->updated_at);  ?></td>
                  <td><?php echo $row->isComplete == 0 ? "Not Complete" : "Complete"  ?></td>
                  <?php $key = $this->AdminModel->encode($row->email); ?>
                  <td><a href="#" onClick='createPopup("<?php echo $key ?>")' class="btn btn-danger btn-xs">Delete <span class="glyphicon glyphicon-remove-circle"></span></a></td>
                </tr>
              <?php } } ?>
              
            </tbody>
          </table>

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
        window.location.href = 'http://localhost/CallCustomizer_web/index.php/admin/deleteUser/'+tempEmail;
        tempEmail = "";
      }
    </script>
  </div>
</div>