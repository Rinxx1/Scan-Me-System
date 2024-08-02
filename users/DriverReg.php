<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="icon" href="img/tslogo.png" type="image/png">
    <!-- Title Page-->
    <title>Driver Registration | TechnoScan</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                
                   
                <div class="card-body">
                 
                    <h2 class="title">Driver Registration Form</h2>
                   <form action="../fdriverReg.php" method="post" enctype="multipart/form-data">
                              <div class="input-group">
                            <h3><label>Personal Information :</label></h3>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name:</label>
                                    <input class="input--style-4" type="text" name="fname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Middle name:</label>
                                    <input class="input--style-4" type="text" name="mname">
                                </div>

                            </div>

                                    <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name:</label>
                                    <input class="input--style-4" type="text" name="lname">
                                </div>
                            </div>
                                   <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address:</label>
                                    <input class="input--style-4" type="text" name="add">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthdate:</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="bdate">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender:</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                               <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contact Number:</label>
                                    <input class="input--style-4" type="text" name="cn">
                                </div>
                            </div>
                            <div class="col-2">

                                <div class="input-group">
                                    <label class="label">Username:</label>
                                    <input class="input--style-4"  name="uname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password:</label>
                                    <input class="input--style-4" type="text" name="pass">
                                </div>
                            </div>
                      

                        </div>
                           
                       <div class="input-group">
                            <h3><label>Vehicle Info :</label></h3>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <div class="row row-space">
                              <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Brand:</label>
                                    <input class="input--style-4"  name="brand">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Plate Number:</label>
                                    <input class="input--style-4"  name="pnum">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Engine Number:</label>
                                    <input class="input--style-4"  name="enum">
                                </div>
                            </div>
                        </div>
                     <div class="input-group">
                            <h3><label>Driver Requirements :</label></h3>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                    <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Driver's License (FRONT):</label>
                                    <input class="input--style-4" type="file" name="lf">
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">
                                    <label class="label">Driver's License (Back):</label>
                                    <input class="input--style-4" type="file" name="lb">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Vehicle's OR/CR:</label>
                                    <input class="input--style-4" type="file" name="orcr">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NBI CLEARANCE:</label>
                                    <input class="input--style-4" type="file" name="nbi">
                                </div>
                            </div>

                        </div>
                         <div class="row row-space">

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name ="reg">Submit</button>

                            <button onclick="window.location.href='Userlogin.php';" class="btn btn--radius-2 btn--blue"> Sign In?</button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->