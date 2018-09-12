<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: dashboard.php');

if(isset($_POST['submit'])) {

  $error    = array();

  $name     = mysql_escape_string($_POST['name']);
  $username    = mysql_escape_string($_POST['username']);
  $mobile   = mysql_escape_string($_POST['mobile']);
  $password = mysql_escape_string($_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE `username` = '".$username."' ");
  $user_found = (mysqli_num_rows($result) > 0) ? TRUE : FALSE;

  if($user_found) {
    $error['user_found'] = TRUE;
  }
  else {
    if (mysqli_query($conn, "INSERT INTO admin (name,username,phone,password) VALUES ('".$name."','".$username."','".$mobile."','".$password."')")) {
      header('Location: ?success');
    }
    else {
      $error['db'] = TRUE;
    }
  }

}

$page = 'New User';

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

          <?php if(isset($error['user_found'])) { ?>
          <div class="alert alert-danger">
            Hey ! This username address is already exist try another or login
          </div>
          <?php } ?>

          <?php if(isset($error['db'])) { ?>
          <div class="alert alert-danger">
            Hey ! Something went wrong try again
          </div>
          <?php } ?>

          <?php if(isset($_GET['success'])) { ?>
          <div class="alert alert-success">
            Successfully registered now admin can login
          </div>
          <?php } ?>

            <form action="new-admin.php" method="post">
              <div class="row dbs" style="margin-left:10px;margin-right:10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input minlength="4" name="name" value="<?=@$_POST['name']?>" type="text" required placeholder="Name" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input name="mobile" value="<?=@$_POST['mobile']?>" type="text" placeholder="Mobile" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input name="username" value="<?=@$_POST['username']?>" type="text" placeholder="Username" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input minlength="4" name="password" value="<?=@$_POST['password']?>" type="password" required placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <br>
                  </div>
              </div>
            </form>


        </div>
      </div>
    </div>

  </div>



</div>


<?php
require_once 'footer.php';
?>
