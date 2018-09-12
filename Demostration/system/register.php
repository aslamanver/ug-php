<?php
session_start();
require_once 'init-db.php';
if(isset($_SESSION['logged_user'])) header('Location: dashboard.php');

if(isset($_POST['submit'])) {

  $error    = array();

  $name     = mysql_escape_string($_POST['name']);
  $email    = mysql_escape_string($_POST['email']);
  $address  = mysql_escape_string($_POST['address']);
  $mobile   = mysql_escape_string($_POST['mobile']);
  $password = mysql_escape_string($_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM user WHERE `email` = '".$email."' ");
  $email_found = (mysqli_num_rows($result) > 0) ? TRUE : FALSE;

  if($email_found) {
    $error['email_found'] = TRUE;
  }
  else {
    if (mysqli_query($conn, "INSERT INTO user (name,email,address,phone,password) VALUES ('".$name."','".$email."','".$address."','".$mobile."','".$password."')")) {
      header('Location: ?success');
    }
    else {
      $error['db'] = TRUE;
    }
  }


}

$page = 'Register';

require_once 'head.php';
require_once 'header.php';
?>


<div class="container">

<div class="title-happy" style="margin-top:50px">
  Register
</div>

<form action="register.php" method="post">
<div class="row">
  <div class="col-md-6 col-md-offset-3">

    <?php if(isset($error['email_found'])) { ?>
    <div class="alert alert-danger">
      Hey ! This email address is already exist try another or login
    </div>
    <?php } ?>

    <?php if(isset($error['db'])) { ?>
    <div class="alert alert-danger">
      Hey ! Something went wrong try again
    </div>
    <?php } ?>

    <?php if(isset($_GET['success'])) { ?>
    <div class="alert alert-success">
      Your email has been successfully registered now you can login
    </div>
    <?php } ?>

    <div class="row contact-form">
        <div class="col-md-12">
          <div class="form-group">
            <input minlength="4" name="name" value="<?=@$_POST['name']?>" type="text" required placeholder="Name" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input name="email" value="<?=@$_POST['email']?>" type="email" required placeholder="Email address" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input minlength="4" name="address" value="<?=@$_POST['address']?>" type="text" placeholder="Address" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input name="mobile" value="<?=@$_POST['mobile']?>" type="text" placeholder="Mobile" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input minlength="4" name="password" value="<?=@$_POST['password']?>" type="password" required placeholder="Password" class="form-control">
          </div>
          <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" onclick="location.reload()" class="btn btn-danger">Clear</button>
          </div>
          <small class="text-muted">We don't share or advertise your personal information to anyone including us</small>
          <br><br>
        </div>
    </div>
  </div>
</div>
</form>

<br/>
<br/>
</div>



<?php
require_once 'footer.php';
?>
