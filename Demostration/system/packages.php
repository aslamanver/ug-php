<?php
session_start();
require_once 'init-db.php';
require_once 'init-package.php';

$isUser = (@$_SESSION['logged_user_type'] == "user") ? TRUE : FALSE;

if(isset($_POST['submit'])) {

  $error    = array();

  $title        = mysql_escape_string($_POST['title']);
  $dt_from      = mysql_escape_string($_POST['dt_from']);
  $dt_to        = mysql_escape_string($_POST['dt_to']);

  $sql = "SELECT * FROM package WHERE `title` LIKE '%".$title."%' AND (`date_from` > '".$dt_from."' AND `date_to` < '".$dt_to."' ) ORDER BY `p_no` DESC";

}
else {
  $sql = "SELECT * FROM package ORDER BY `p_no` DESC";
}

if(isset($_GET['delete'])) {

  $id = $_GET['delete'];

  if(!$isUser) {

    $sqlD = "SELECT * FROM booking WHERE `p_no` = '".$id."'";
    $resultD = mysqli_query($conn, $sqlD);
    while ($rowD = mysqli_fetch_assoc($resultD)) {
      mysqli_query($conn, "DELETE FROM booking WHERE `p_no` = '".$rowD['p_no']."' ");
    }

    $resultUl = mysqli_query($conn,"SELECT * FROM package WHERE `p_no` = '".$id."' ");
    while($rowUl = mysqli_fetch_assoc($resultUl))
    {
      unlink('uploads/'.urlencode($rowUl['title']).'.jpg');
    }

    if(mysqli_query($conn, "DELETE FROM package WHERE `p_no` = '".$id."' ")) {
        header('Location: ?successDel');
    }
    else {
      $error['db'] = TRUE;
    }

  }
  else {
    $error['db'] = TRUE;
  }
}

if(isset($_GET['book'])) {

  $id = $_GET['book'];

  if($isUser) {
    if (mysqli_query($conn, "INSERT INTO booking (`user_id`,`p_no`,`date`,`status`) VALUES ('".get_user()['id']."','".$id."','".date("Y-m-d H:i:s")."','pending')")) {
      $resLastId = mysqli_query($conn,"SELECT * FROM booking WHERE `user_id` = '".get_user()['id']."' ORDER BY `date` DESC LIMIT 1");
      while($rowLastId = mysqli_fetch_assoc($resLastId)) {
        header('Location: print-pass.php?ref='.$rowLastId['ref']);
      }
    }
    else {
      $error['db'] = TRUE;
    }
  }
  else {
    $error['db'] = TRUE;
  }
}

$page = 'Packages';

require_once 'head.php';
require_once 'header.php';
?>


<div class="container">

<div class="title-happy" style="margin-top:50px">
  Dream Park Packages
</div>

<?php if(isset($_GET['success'])) { ?>
<div class="alert alert-success">
  Successfully added this package
</div>
<?php } ?>

<?php if(isset($_GET['successDel'])) { ?>
<div class="alert alert-success">
  Successfully Deleted
</div>
<?php } ?>

<?php if(isset($error['db'])) { ?>
<div class="alert alert-danger">
  Oops Something went wrong
</div>
<?php } ?>

<div class="row contact-form rsv-form">
  <form method="post" action="packages.php" >
    <div class="col-md-4">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-search"></i>&nbsp;</span>
          <input name="title" value="<?=@$_POST['title']?>" required placeholder="Package Details.." type="text" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i> FROM</span>
          <input value="<?=@$_POST['dt_from']?>" name="dt_from" required readonly placeholder="From" style="background-color:#fff" type="text" class="form-control datepicker">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i> TO</span>
          <input value="<?=@$_POST['dt_to']?>" name="dt_to" required readonly placeholder="To" style="background-color:#fff" type="text" class="form-control datepicker">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <button name="submit" type="submit" class="btn btn-success">Find</button>
        <button onclick="location.href='packages.php'" type="button" value="clear" class="btn btn-danger">Clear</button>
      </div>
    </form>
    </div>
    <div class="col-md-6" style="text-align:right">
      <small style="color:#800000">Children 0-12 Years <b>*</b> Carefully read our Terms of Service</small>
    </div>
</div>

<hr>

<div class="row services-row">

  <?php
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="col-md-12 services-item">
    <div class="happy-home-hap row">
      <div class="col-md-6 services-item-img">
        <img src="uploads/<?=urlencode($row['title'])?>.jpg" alt="">
      </div>
      <div class="col-md-6">
        <h2><?=$row['title']?></h2>
        <p><?=$row['description']?></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moD<?=$row['p_no']?>">Read more</button>
        <?php if(!isset($_SESSION['logged_user'])) { ?>
        <a href="login.php" type="button" class="btn btn-warning">Login to Book</a>
        <?php } ?>
        <?php if(isset($_SESSION['logged_user_type']) && $_SESSION['logged_user_type'] == "user") { ?>
        <a href="?book=<?=$row['p_no']?>" type="button" class="btn btn-success">Buy It</a>
        <?php } ?>
        <?php if(isset($_SESSION['logged_user_type']) && $_SESSION['logged_user_type'] == "admin") { ?>
        <a href="?delete=<?=$row['p_no']?>" type="button" class="btn btn-danger">Delete</a>
        <?php } ?>
        <span style="font-size:12pt;font-family:'Roboto',sans-serif;font-weight:400;padding-top:6px" class="label label-danger pull-right">Rs: <?=number_format($row['price'],2)?></span>
            <!-- Modal -->
            <div id="moD<?=$row['p_no']?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?=$row['title']?></h4>
                  </div>
                  <div class="modal-body">
                    <img class="thumbnail" src="uploads/<?=urlencode($row['title'])?>.jpg" alt="">
                    <p><?=$row['description']?></p>
                    <b>From: <?=date_format(date_create($row['date_from']),"Y-m-d")?><br> To: <?=date_format(date_create($row['date_to']),"Y-m-d")?></b>
                  </div>
                  <div class="modal-footer">
                    <?php if(isset($_SESSION['logged_user_type']) && $_SESSION['logged_user_type'] == "user") { ?>
                    <a href="?book=<?=$row['p_no']?>" type="button" class="btn btn-success">Buy It</a>
                    <?php } ?>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
  <?php } } else { ?>
      <div class="alert alert-warning">
        No Packages Found
      </div>
  <?php } ?>
</div>

<hr>
</div>



<?php
require_once 'footer.php';
?>
