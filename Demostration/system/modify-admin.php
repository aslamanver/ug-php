<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: dashboard.php');


if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM admin WHERE `admin_id` = '".$id."'";

  if(isset($_POST['submit'])) {
    $error    = array();
    @$name     = mysql_escape_string($_POST['name']);
    @$mobile   = mysql_escape_string($_POST['mobile']);
    @$password = mysql_escape_string($_POST['password']);
    @$username = mysql_escape_string($_POST['username']);

    if (mysqli_query($conn, "UPDATE admin SET `name` = '".$name."', `password` = '".$password."', `phone` = '".$mobile."' WHERE `admin_id` = '".$id."'")) {
      header('Location: modify-admin.php?id='.$id.'&success');
    }
    else {
      $error['db'] = TRUE;
    }
  }

  if(isset($_GET['delete'])) {

      if(mysqli_query($conn, "DELETE FROM admin WHERE `admin_id` = '".$id."' ")) {
          header('Location: admins.php?successDel');
      }
      else {
        $error['db'] = TRUE;
      }
  }

}
else {
  die('');
}



$page = 'Modify Admin';

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

          <?php if(isset($_GET['success'])) { ?>
          <div class="text-success">
            Success
          </div>
          <?php } ?>

          <?php if(isset($error['db'])) { ?>
          <div class="alert alert-danger">
            Oops Something went wrong
          </div>
          <?php } ?>

            <?php
             $result = mysqli_query($conn,$sql);
             while ($row = mysqli_fetch_assoc($result)) { ?>
            <form action="" method="post">
            <div class="row dbs dbs-nob" style="margin-left:10px;margin-right:10px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Name </label>
                    <input minlength="4" name="name" value="<?=$row['name']?>" type="text" required placeholder="Name" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Username </label>
                    <input name="username" value="<?=$row['username']?>" type="text" readonly required placeholder="Username" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Phone </label>
                    <input name="mobile" value="<?=$row['phone']?>" type="text"  placeholder="Mobile" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password </label>
                    <input name="password" minlength="4" value="<?=$row['password']?>" required type="text" placeholder="Password" class="form-control">
                  </div>
                  <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Save Changes</button>
                    <a href="?id=<?=$id?>&delete" class="btn btn-danger" name="button"><i class="fa fa-trash fa-lg"></i> Delete Admin</a>
                  </div>
                  <div class="form-group">
                    <small>* Deleting admin's profile will delete all the records under admin's name such packages</small>
                  </div>
                  <br>
                </div>
            </div>
            </form>
            <?php } ?>



        </div>
      </div>
    </div>

  </div>



</div>


<?php
require_once 'footer.php';
?>
