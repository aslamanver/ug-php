<?php
require_once 'init.php';

if(isset($_GET['ref'])) {

  $ref= $_GET['ref'];

} else {
  header('Location: dashboard.php');
}
$page = 'Print Pass';

require_once 'head.php';
require_once 'header.php';
?>


<div class="container">
<script type="text/javascript">
  setTimeout(function(){
    window.print();
  },100)
</script>
  <div style="margin-top:20px"></div>

  <div class="row">

    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Dream Park Online Pass</div>

        <div class="panel-body">
          <?php
            $sql = "SELECT * FROM booking WHERE `ref` = '".$ref."' AND `user_id` = '".get_user()['id']."' ";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {

              $sqlP = "SELECT * FROM package WHERE `p_no` = '".$row['p_no']."'";
              $resultP = mysqli_query($conn,$sqlP);
              while($rowP = mysqli_fetch_assoc($resultP))
              {
                $p_title = $rowP['title'];
				$p_price = $rowP['price'];
				$p_no = $rowP['p_no'];
              }
          ?>

          <img  src="barcode/?size=40&text=<?=$row['ref']?>&print=false" alt="">
          <img style="position:absolute;right:40px;top:47px" src="images/logo/logo-120.png" alt="">

          <table class="table table-striped tbl-pass">
            <thead>
              <tr>
                <th>Pass Ref # <?=$row['ref']?> <br/> Price: Rs. <?=number_format($p_price,2)?>/=</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>User Details</td>
              </tr>
              <tr>
                <td>ID: <?=get_user()['id']?> <br/> Name: <?=get_user()['name']?></td>
              </tr>
              <tr>
                <td>Package Details</td>
              </tr>
              <tr>
                <td>P.No: <?=$p_no?> <br/> Name: <?=$p_title?> <br/> Booked: <?=$row['date']?></td>
              </tr>
            </tbody>
          </table>
          <?php } ?>
        </div>
      </div>
    </div>

  </div>



</div>


<?php
require_once 'footer.php';
?>
