<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: dashboard.php');

$page = 'Admins';

require_once 'head.php';
require_once 'header.php';
?>


<div class="container">

  <div style="margin-top:20px"></div>

  <div class="row">
    <div class="col-sm-3">
      <?php include_once 'sidebar.php'; ?>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
        <div class="panel-heading"><?=$page?></div>
        <div class="panel-body" >

          <?php if(isset($_GET['successDel'])) { ?>
          <div class="alert alert-success">
            Successfully Deleted
          </div>
          <?php } ?>

          <script>
            $( document ).ready(function() {
                $('#usersT').dataTable({
                  "responsive": true,
                  "aaSorting": []
                });
            });
          </script>
          <table id="usersT" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn, "SELECT * FROM admin");
                while($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?=$row['admin_id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['username']?></td>
                <td>
                  <a href="modify-admin.php?id=<?=$row['admin_id']?>" class="btn btn-info btn-sm" name="button"><i class="fa fa-pencil fa-lg"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

  </div>



</div>


<?php
require_once 'footer.php';
?>
