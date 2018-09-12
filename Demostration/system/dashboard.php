<?php
require_once 'init.php';
if($_SESSION['logged_user_type'] == "user") header('Location: bookings.php');

$page = 'Dashboard';

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
        <div class="panel-body">
            <div class="row services-row" style="padding:10px;">

              <?php
                $sql = "SELECT * FROM package";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-md-12 services-item">
                <div class="happy-home-hap row">
                  <div class="col-md-6 services-item-img">
                    <img src="uploads/<?=urlencode($row['title'])?>.jpg" alt="">
                  </div>
                  <div class="col-md-6 db">
                    <h2><?=$row['title']?></h2>
                    <p><?=$row['description']?>.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m<?=$row['p_no']?>">Read more</button>
                    <span style="font-size:12pt;font-family:'Roboto',sans-serif;font-weight:400;padding-top:6px" class="label label-danger pull-right">Rs: <?=number_format($row['price'],2)?></span>
                        <!-- Modal -->
                        <div id="m<?=$row['p_no']?>" class="modal fade" role="dialog">
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
        </div>
      </div>
    </div>

  </div>



</div>



<?php
require_once 'footer.php';
?>
