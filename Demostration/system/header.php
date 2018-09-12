<div class="top-header">
  <h1>DREAM PARK</h1>
</div>

<nav class="navbar navbar-default navbar-happy navbar-happy-sub" data-spy="affix" data-offset-top="70">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
              </button>
            <a class="navbar-brand" href="index.php"><img style="z-index:2" src="images/logo/logo-120.png"  alt=""></a> <span class="happy-navbar-header-txt">Dream Park</span>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class=""><a href="index.php">HOME</a></li>
              <li class="<?=($page == 'Packages')?'active':''?>"><a href="packages.php">PACKAGES</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['logged_user'])) { ?>
                <li class="<?=($page == 'My Profile')?'active':''?>"><a href="profile.php"><i class="fa fa-user"></i> <?=get_user()['name']?></a></li>
                <li class=""><a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
                <?php } else { ?>
                <li class="<?=($page == 'Login')?'active':''?>"><a href="login.php"><i class="fa fa-user"></i> LOGIN</a></li>
                <li class="rsv"><a href="register.php">REGISTER</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="happy-breadcrumb happy-breadcrumb-caro">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active"><?=$page?></li>
    </ol>
  </div>
</div>
