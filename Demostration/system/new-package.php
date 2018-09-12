<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: dashboard.php');

if(isset($_POST['submit'])) {

  $error    = array();

  $title        = mysql_escape_string($_POST['title']);
  $dt_from      = mysql_escape_string($_POST['dt_from']);
  $dt_to        = mysql_escape_string($_POST['dt_to']);
  $price        = mysql_escape_string($_POST['price']);
  $description  = mysql_escape_string($_POST['description']);

  $tmp = $_FILES['cover']['tmp_name'];
  move_uploaded_file($tmp,'uploads/'.urlencode($title).'.jpg');

  if (mysqli_query($conn, "INSERT INTO package (title,description,price,date_from,date_to) VALUES ('".$title."','".$description."','".$price."','".$dt_from."','".$dt_to."')")) {
    header('Location: ?success');
  }
  else {
    $error['db'] = TRUE;
  }

}

$page = 'New Package';

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

            <form action="new-package.php" method="post" enctype="multipart/form-data">
              <div class="row dbs" style="margin-left:10px;margin-right:10px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" name="title" minlength="5" value="<?=@$_POST['title']?>" required placeholder="Title" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i> FROM</span>
                        <input name="dt_from" value="<?=@$_POST['dt_from']?>" id="dt_from" required readonly placeholder="From" style="background-color:#fff" type="text" class="form-control datepicker">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i> TO</span>
                        <input name="dt_to" value="<?=@$_POST['dt_to']?>" id="dt_to" required readonly placeholder="From" style="background-color:#fff" type="text" class="form-control datepicker">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input name="price" value="<?=@$_POST['price']?>" required type="text" placeholder="Price" style="background-color:#fff" type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="description" required rows="4" placeholder="Description..." class="form-control"><?=@$_POST['description']?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="border:0">
                      <label>Cover Image</label>
                      <input name="cover" accept="image/jpeg" required type="file" class="form-control">
                    </div>
                    <div class="form-group">
                      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
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
