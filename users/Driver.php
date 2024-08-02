<!DOCTYPE html>
<?php 
  if(!isset($_GET['uid'])){
    header("Location: ../");
  }

    // $page = $_SERVER['PHP_SELF'];
    // $sec = "10";
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- 
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'?=<?php echo $uid?>"> -->
    <link rel="icon" href="img/tslogo.png" type="image/png">
    <title>Driver Dashboard | TechnoScan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style type="text/css">
      .btn1 {
        display: inline-block;
        line-height: 50px;
        padding: 0 50px;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        cursor: pointer;
        font-size: 18px;
        color: #fff;
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }
      .btn1--radius-2 {
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        }

      .btn1--blue {
        background: #4272d7;
        }
    </style>
</head>

<?php
  session_start();
  include 'connection.php';

  if($_SESSION['session_uid']){
    $uid = $_GET['uid'];
    $sql = $con->query("SELECT * FROM personinfo INNER JOIN users ON personinfo.person_id  = users.person_id WHERE users.user_id = '$uid' ");
    $row = $sql->fetch_array();

    $fullname = $row['fname']." ".$row['mname']." ".$row['lname'];
    $address = $row['address'];
    $cn = $row['contact_num'];
    $bd = $row['bdate'];
    $gender = $row['gender'];
    $wallet = $row['wallet'];
    $pid = $row['person_id'];
    $qrc = $row['qr_code'];

    $qry = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
    $res = $qry->fetch_array();

    $uname = $res['uname'];
    $pw = $res['password'];

    $_SESSION['pid'] = $pid;


  }

    ?>
<body>
<!--================Header Menu Area =================-->
    <header class="header_area">  
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="../home.php"><i>TechnoScan</i></a>
                        <button onclick= "window.location.href='../logout.php'" class="genric-btn default circle" >Logout</button>
                         <!-- Collect the nav links, forms, and other content for toggling -->

                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7">
                        <div class="banner_content">
                            <center>
                                <h1>Hi <?php echo $row['fname'] ?>!</h1>
                                <h3>&#8369 <?php echo floatval($wallet); ?></h3>
                            </center>
                        </div>
                        <center>
                            <img src="../<?php echo $qrc ?>" class="img" width="300" height="300" >
                        </center>
                        
                    </div>
                </div>
            </div>
        </div><br>
    </section>

    <!--================End Home Banner Area =================-->

    <!--================Service  Area =================-->
    <section class="service-area area-padding">
        <div class="container">
            <div class="row">
                <!-- Single service -->
                <div class="col-md-6 col-lg-4">
                  <div class="single-service">
                    <div class="service-icon">
                      <i class="ti-pencil-alt"></i>
                    </div>
                    <div class="service-content">
                      <h5>Personal Information</h5>
                      <p>Click here to view your account</p>
                      <a href="#" data-toggle="modal" data-target="#myModall">View Account</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="single-service">
                    <div class="service-icon">
                      <i class="ti-truck"></i>
                    </div>
                    <div class="service-content">
                        <h5>Routes</h5>
                        <p>Click here to see the list of routes and its rate</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">View Routes</a>
                    </div>
                  </div>
                </div>
                <!-- Single service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="ti-headphone-alt"></i>
                        </div>
                        <div class="service-content">
                            <h5>Customer Support</h5>
                            <p>Third don't lights wherein was. bring to build them, seas. Thing gathering answ gaered beast third that heaven after all that living one bank limit</p>
                            <a href="#">Read More</a>
                        </div>
                        <br>
                         <a class="banner_btn" href="#">Begin Free Trial<i class="ti-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Personal Information -->
    <div id="myModall" class="modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Personal Information</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <center>
              <h3><?php echo $fullname ?></h3>
              <p>Gender: <?php echo $gender ?></p>
              <p>Birthdate: <?php echo $bd ?></p>
              <p>Address: <?php echo $address ?></p>
              <p>Contact Number<?php echo $cn ?></p><br>

              <p>Username: <?php echo $uname ?></p>
              <p>Password: <?php echo $pw ?></p>
            </center>
       
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--Routes -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">List of Routes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table-head">
                        <th>Route</th>
                        <th>Rate</th>
                    </thead>
                    <?php
                        $rts = $con->query("SELECT * FROM routes");
                        
                        while ($ss = $rts->fetch_array()) {

                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $ss['rname'] ?></td>
                            <td class="text-primary"><?php echo floatval($ss['rrate']) ?></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
    
 <!-- ================ start footer Area ================= -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>About Us</h4>
                    <p>Technoscan is a company that will make transportations exciting and interesting. It provides virtual payment and receiving of fares.</p>
                    <!-- <div class="footer-logo">
                        <h2>TechnoScan</h2>
                    </div> -->
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Contact Info</h4>
                    <div class="footer-address">
                        <p>Address :R. Daquingan Bldg. Alunan Avenue, General Santos City</p>
                        <span>Phone : (+63) 900 000 0000</span>
                        <span>Email : techoscan@gmail.com</span>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <img src="../img/tslogo.png">
                </div>
            </div>
            <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Techno Scan <i class="fa fa-heart" aria-hidden="true"></i></p>
                <div class="col-lg-3 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-youtube"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
</html>