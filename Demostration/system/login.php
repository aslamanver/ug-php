<?php
session_start();
if(isset($_SESSION['logged_user'])) header('Location: dashboard.php');

require_once 'init-db.php';

$error    = array();
if(isset($_POST['submit_user'])) {

  $email          = mysql_real_escape_string($_POST['email']);
  $password_user  = mysql_real_escape_string($_POST['password_user']);

  $result = mysqli_query($conn, "SELECT * FROM user WHERE `email` = '".$email."' AND `password` = '".$password_user."' ");
  $email_found = (mysqli_num_rows($result) > 0) ? TRUE : FALSE;

  if($email_found) {
    $_SESSION['logged_user_type'] = 'user';
    $_SESSION['logged_user'] = $email;
    header('Location: dashboard.php');
  }
  else {
    $error['failed'] = TRUE;
  }

}
elseif (isset($_POST['submit_admin'])) {

  $username       = mysql_real_escape_string($_POST['username']);
  $password_admin = mysql_real_escape_string($_POST['password_admin']);

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE `username` = '".$username."' AND `password` = '".$password_admin."' ");
  $user_found = (mysqli_num_rows($result) > 0) ? TRUE : FALSE;

  if($user_found) {
    $_SESSION['logged_user_type'] = 'admin';
    $_SESSION['logged_user'] = $username;
    header('Location: dashboard.php');
  }
  else {
    $error['failed'] = TRUE;
  }

}

$page = 'Login';

require_once 'head.php';
require_once 'header.php';
?>


<div class="container">

<div class="title-happy" style="margin-top:50px">
  Login
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">

    <?php if(isset($error['failed'])) { ?>
    <div class="alert alert-danger">
      Oops ! You are not a valid user.
    </div>
    <?php } ?>

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#user">User</a></li>
      <li><a data-toggle="tab" href="#admin">Administrator</a></li>
    </ul>

    <div class="tab-content">

      <div id="user" class="tab-pane fade in active">
            <br>
            <form action="login.php" method="post">
            <div class="row contact-form">
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="email" value="<?=@$_POST['email']?>" required type="email" placeholder="Email address" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="password_user" value="<?=@$_POST['password_user']?>" required type="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="form-group">
                    <button name="submit_user" type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
            </div>
          </form>
      </div>

      <div id="admin" class="tab-pane fade">
        <br>
        <form action="login.php" method="post">
        <div class="row contact-form">
            <div class="col-md-12">
              <div class="form-group">
                <input name="username" value="<?=@$_POST['username']?>" required type="text" placeholder="Username" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input name="password_admin" value="<?=@$_POST['password_admin']?>" required type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <button name="submit_admin" type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
        </div>
        </form>
      </div>

    </div>

  </div>
</div>

<br/>
<br/>
</div>



<?php
require_once 'footer.php';
?>
