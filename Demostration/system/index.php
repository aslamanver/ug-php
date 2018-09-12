<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home - Dream Park</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js "></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <!-- Plyr core script -->
    <link rel="stylesheet" href="https://cdn.plyr.io/2.0.12/plyr.css">

    <script type="text/javascript">
      $(function() {
        $(".datepicker").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          maxDate: +90,
          numberOfMonths: 2
        });
        $(".datepicker").datepicker('setDate', new Date());
      });
      </script>
</head>
<body>

  <!--<img src="images/logo/logo-70.png" style="height:45px;margin-right:10px" >-->
    <div class="top-header">
      <h1>Dream Park</h1>
    </div>

    <nav class="navbar navbar-default navbar-happy" data-spy="affix" data-offset-top="70">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar icon-bar-1"></span>
                    <span class="icon-bar icon-bar-2"></span>
                    <span class="icon-bar icon-bar-3"></span>
                  </button>
                <a class="navbar-brand" href="index.php"><img style="z-index:2" src="images/logo/logo-120.png"  alt="Logo Image"></a> <span class="happy-navbar-header-txt">Dream Park</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="packages.php">PACKAGES</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"><i class="fa fa-user"></i> LOGIN</a></li>
                    <li class="rsv"><a href="register.php">REGISTER</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide carousel-happy" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/caro/1.jpg" alt="Caro 1">
            </div>

            <div class="item">
                <img src="images/caro/3.jpg" alt="Caro 2">
            </div>

            <div class="item">
                <img src="images/caro/4.jpg" alt="Caro 3">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="full-gray-happy home-res-happy">
      <div class="container">
      <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label>Title :</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>To :</label>
              <input readonly style="background-color:#fff" type="text" class="form-control datepicker">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>From :</label>
              <input readonly style="background-color:#fff" type="text" class="form-control datepicker">
            </div>
          </div>

          <div class="col-md-1">
            <div class="form-group">
              <label></label>
              <button style="margin-top:7px" type="submit" name="button" class="btn btn-primary">CHECK AVAILABILITY</button>
            </div>
          </div>
      </div>
    </div>
    </div>

    <div class="container">

    <div class="title-happy">
      WELCOME TO Dream Park
    </div>
    <p style="text-align:center">Dream Park is Sri Lanka’s biggest theme park with number of colorful attractions those attractions are suitable for any age group. This has become ideal place to bring the whole family for a fantastic, fun-filled day. Fun day packages have been designed for different price ranges it has been very popular now.</p>


    <div class="title-happy">
      HAPPENINGS AT DREAM PARK
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="happy-home-hap">
          <img src="images/all/hp-1.jpg" >
          <h2>FUN IS NOT LIMITED</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="happy-home-hap">
          <img src="images/all/hp-2.jpg" >
          <h2>RACES</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>

  </div>

    <footer class="footer">
      <div class="container">

        <div class="row">
          <div class="col-sm-2" style="text-align:center">
              <small class="text-muted">Follow Dream Park</small>
          </div>
          <div class="col-sm-6">
            <div class="footer-icons">
              <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
              <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
              <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
              <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
            </div>
          </div>
          <div class="col-sm-4 footer-copy">
            <small class="text-muted">&copy; 2017 All rights reserved Dream Park</small>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.plyr.io/2.0.12/plyr.js"></script>
    <script>
        plyr.setup();
    </script>
</body>

</html>
