<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="tslogo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <title>User Application | TechnoScan</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
  div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 360px;
  }

  div.gallery:hover {
    border: 1px solid #777;
  }

  div.gallery img {
    width: 100%;
    height: auto;
  }

  div.desc {
    padding: 15px;
    text-align: center;
  }
  </style>
</head>

<?php
    include '../connection.php';

    $pid = $_GET['pid'];
    $sql = $con->query("SELECT * FROM personinfo WHERE person_id = '$pid' ");
    $row = $sql->fetch_array();

    $fullname = $row['fname']." ".$row['mname']." ".$row['lname'];
    $gender = $row['gender'];
    $address = $row['address'];
    $cn = $row['contact_num'];
    $bd = $row['bdate'];
    $wallet = $row['wallet'];

    $qry = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
    $res = $qry->fetch_array();

    $uid = $res['user_id'];
    $uname = $res['uname'];
    $pw = $res['password'];

    if($res['user_type'] == 1){
      $utype = "Passenger";
      $pssngr = $con->query("SELECT * FROM apply_disc WHERE user_id = '$uid'");
      $pss = $pssngr->fetch_array();

      $proofIDf = $pss['id_f'];
      $proofIDb = $pss['id_b'];
    }
    elseif($res['user_type'] == 2){
      $utype = "Driver";

      $drvr = $con->query("SELECT * FROM driver_req WHERE user_id = '$uid'");
      $dr = $drvr->fetch_array();

      $lf = $dr['license_f'];
      $lb = $dr['license_b'];
      $or = $dr['vehicle_or'];
      $nbi = $dr['nbi_clearance'];

    }
    

    $s = $con->query("SELECT * FROM driver_req INNER JOIN users ON driver_req.user_id  = users.user_id WHERE users.user_id = '$uid'");
    $r = $s->fetch_array();

?>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="../home.php" class="simple-text logo-normal">
          Techno Scan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="./userlist.php">
              <i class="material-icons">content_paste</i>
              <p>User List</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./applylist.php">
              <i class="material-icons">content_paste</i>
              <p>Applications List</p>
            </a>
          </li>

          <li class="nav-item ">
               <a class="nav-link" href="./routelist.php">
              <i class="material-icons">content_paste</i>
              <p>Route List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./addroute.php">
              <i class="material-icons">library_books</i>
              <p>Add Route</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"> User Application</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Pictures</h4>
                </div>
                <div class="card-body">
                  <form action="Sampleupdate.php?pid=<?php echo $pid?>" method="post">
                    <?php
                      // if($res['user_type'] == 2){
                      //   $pic1 = $lf;
                      //   $pic2 = $lb;
                      //   $desc1 = "License (Front)";
                      //   $desc2 = "License (Back)";

                      // }elseif ($res['user_type'] == 1) {
                      //   $pic1 = $proofIDf;
                      //   $pic2 = $proofIDb;
                      //   $desc1 = "ID (Front)";
                      //   $desc2 = "ID (Back)";

                      // }
                        if($res['user_type'] == 1){
                     ?>

                    <div class="row">
                      <div class="gallery">
                        <a target="_blank" href="../img/dis_req/ID(Front).jpg">
                          <img src="../img/dis_req/ID(Front).jpg" alt="<?php echo $desc1;?>" width="1200" height="800">
                        </a>
                        <div class="desc">ID (Front)</div>
                      </div>
                      <div class="gallery">
                        <a target="_blank" href="../img/dis_req/ID(Back).jpg">
                          <img src="../img/dis_req/ID(Back).jpg" alt="<?php echo $desc2;?>" width="1200" height="800">
                        </a>
                        <div class="desc">ID (Back)</div>
                      </div>
                    </div>
                  <?php  } ?>

                    <?php 
                      if($res['user_type'] == 2){
                    ?>
                    <div class="row">
                      <div class="gallery">
                        <a target="_blank" href="../<?php echo $lf;?>">
                          <img src="../<?php echo $lf;?>" alt="License (Front)" width="1200" height="800">
                        </a>
                        <div class="desc">License (Front)</div>
                      </div>
                      <div class="gallery">
                        <a target="_blank" href="../<?php echo $lb;?>">
                          <img src="../<?php echo $lb;?>" alt="License (Back)" width="1200" height="800">
                        </a>
                        <div class="desc">License (Back)</div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="gallery">
                        <a target="_blank" href="../<?php echo $or;?>">
                          <img src="../<?php echo $or;?>" alt="Vehicle ORCR" width="1200" height="800">
                        </a>
                        <div class="desc">Vehicle ORCR</div>
                      </div>
                      <div class="gallery">
                        <a target="_blank" href="../<?php echo $nbi;?>">
                          <img src="../<?php echo $nbi;?>" alt="Vehicle ORCR" width="1200" height="800">
                        </a>
                        <div class="desc">NBI Clearance</div>
                      </div>
                    </div>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary pull-right" name="dec">Decline</button>
                    <button type="submit" class="btn btn-primary pull-right" name="acc">Accept</button>                    
                    <!-- <button type="submit" class="btn btn-primary pull-right">Add Wallet</button> -->
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../<?php echo $row['qr_code']?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category"><?php echo $utype?></h6>
                  <h4 class="card-title"><?php echo $fullname?></h4>
                  <p class="card-description">
                    Address: <?php echo $address?> <br>
                    Contact Number: <?php echo $cn?><br>
                    Gender: <?php echo $gender?><br>
                    Birthdate: <?php echo $bd?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
    
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
 
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>