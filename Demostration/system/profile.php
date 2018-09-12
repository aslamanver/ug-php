<?php
require_once 'init.php';

if(isset($_POST['submit'])) {

  $error    = array();

  @$name     = mysql_escape_string($_POST['name']);
  @$email    = mysql_escape_string($_POST['email']);
  @$address  = mysql_escape_string($_POST['address']);
  @$mobile   = mysql_escape_string($_POST['mobile']);
  @$password = mysql_escape_string($_POST['password']);
  @$username = mysql_escape_string($_POST['username']);

  if($_SESSION['logged_user_type'] == "admin") {
    if (mysqli_query($conn, "UPDATE admin SET `name` = '".$name."', `password` = '".$password."', `phone` = '".$mobile."' WHERE `username` = '".$username."'")) {
      header('Location: ?success');
    }
    else {
      $error['db'] = TRUE;
    }
  }
  elseif($_SESSION['logged_user_type'] == "user") {
    if (mysqli_query($conn, "UPDATE user SET `name` = '".$name."', `address` = '".$address."', `password` = '".$password."', `phone` = '".$mobile."' WHERE `email` = '".$email."'")) {
      header('Location: ?success');
    }
    else {
      $error['db'] = TRUE;
    }
  }

}

$page = 'My Profile';

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

              <?php if($_SESSION['logged_user_type'] == "user") { ?>
              <form action="profile.php" method="post">
              <div class="row dbs dbs-nob" style="margin-left:10px;margin-right:10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Name </label>
                      <input name="name" minlength="4" value="<?=get_user()['name']?>" type="text" required placeholder="Name" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email </label>
                      <input name="email" value="<?=get_user()['email']?>" type="email" readonly required placeholder="Email address" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address </label>
                      <input name="address" value="<?=get_user()['address']?>" type="text" placeholder="Address" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Phone </label>
                      <input name="mobile" value="<?=get_user()['phone']?>" type="text"  placeholder="Mobile" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password </label>
                      <input name="password" minlength="4" value="<?=get_user()['password']?>" required type="text" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                      <button name="submit" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    <br>
                  </div>
              </div>
              </form>
              <?php } ?>

              <?php if($_SESSION['logged_user_type'] == "admin") { ?>
                <form action="profile.php" method="post">
                <div class="row dbs dbs-nob" style="margin-left:10px;margin-right:10px;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name </label>
                        <input minlength="4" name="name" value="<?=get_user()['name']?>" type="text" required placeholder="Name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username </label>
                        <input name="username" value="<?=get_user()['username']?>" type="text" readonly required placeholder="Username" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Phone </label>
                        <input name="mobile" value="<?=get_user()['phone']?>" type="text"  placeholder="Mobile" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password </label>
                        <input name="password" minlength="4" value="<?=get_user()['password']?>" required type="text" placeholder="Password" class="form-control">
                      </div>
                      <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Save Changes</button>
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
