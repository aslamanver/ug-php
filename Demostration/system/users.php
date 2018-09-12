<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: dashboard.php');

if(isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sqlD = "SELECT * FROM booking WHERE `user_id` = '".$id."'";
  $resultD = mysqli_query($conn, $sqlD);
  while ($rowD = mysqli_fetch_assoc($resultD)) {
    mysqli_query($conn, "DELETE FROM booking WHERE `user_id` = '".$rowD['user_id']."' ");
  }

  if(mysqli_query($conn, "DELETE FROM user WHERE `user_id` = '".$id."' ")) {
      header('Location: ?successDel');
  }
  else {
    $error['db'] = TRUE;
  }

}

$page = 'Users';

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
                <th>User ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn, "SELECT * FROM user");
                while($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?=$row['user_id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['address']?></td>
                <td><?=$row['email']?></td>
                <td><a href="?delete=<?=$row['user_id']?>" class="btn btn-danger btn-sm" name="button"><i class="fa fa-trash fa-lg"></i></a></td>
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
