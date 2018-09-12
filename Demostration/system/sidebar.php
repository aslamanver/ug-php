<?php
if(!isset($_SESSION['logged_user'])) {
  die('You are not logged in');
}
else {
  $userC = ($_SESSION['logged_user_type'] == "user") ? TRUE : FALSE;
  $adminC = ($_SESSION['logged_user_type'] == "admin") ? TRUE : FALSE;
}
?>
<div class="panel panel-default">
  <div class="panel-heading">Basic Management</div>
  <div class="list-group">

    <?php if($userC) { ?>
      <a href="bookings.php" class="list-group-item <?=($page=="My Bookings")?'active':''?>">My Bookings</a>
      <a href="packages.php" class="list-group-item">Search Packages</a>
    <?php } ?>
    <?php if($adminC) { ?>
      <a href="dashboard.php" class="list-group-item <?=($page=="Dashboard")?'active':''?>">Dashboard</a>
      <a href="new-package.php" class="list-group-item <?=($page=="New Package")?'active':''?>">New Package</a>
      <a href="packages.php" class="list-group-item">Search Packages</a>
      <a href="users.php" class="list-group-item <?=($page=="Users")?'active':''?>">Users</a>
      <a href="admins.php" class="list-group-item <?=($page=="Admins"||$page=="Modify Admin")?'active':''?>">Admins</a>
      <a href="new-admin.php" class="list-group-item <?=($page=="New Admin")?'active':''?>">New Admin</a>
    <?php } ?>

  </div>
</div>
