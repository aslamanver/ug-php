<?php
function get_user() {

  require 'init-db.php';
  $type = $_SESSION['logged_user_type'];
  $user = $_SESSION['logged_user'];
  $details = array();

  if($type == "admin") {

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE `username` = '".$user."'");
    while($row = mysqli_fetch_assoc($result)) {
        $details['id'] = $row["admin_id"];
        $details['name'] = $row["name"];
        $details['phone'] = $row["phone"];
        $details['username'] = $row["username"];
        $details['password'] = $row["password"];
    }
  }
  elseif ($type == "user") {

    $result = mysqli_query($conn, "SELECT * FROM user WHERE `email` = '".$user."'");
    while($row = mysqli_fetch_assoc($result)) {
        $details['id'] = $row["user_id"];
        $details['name'] = $row["name"];
        $details['phone'] = $row["phone"];
        $details['address'] = $row["address"];
        $details['email'] = $row["email"];
        $details['password'] = $row["password"];
    }
  }
  return $details;
}

?>
