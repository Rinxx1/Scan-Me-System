<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="users/style_user.css" />
    <link rel="icon" href="img/tslogo.png" type="image/png">
    <link rel="stylesheet" href="users/awd.css">

    <script src="users/g.js"></script> 
    <script src="users/64d58efce2.js"></script>
    <script src="users/modal.js"></script>
    <script src="users/jquery-2.2.4.min.js"></script>
    
    <title>Sign in & Sign up Form | TechnoScan</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="flogin.php" method="post" class="sign-in-form" enctype="multipart/form-data">
            <h2 class="title">Sign in</h2>
            <br>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "uname" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "pass" />
            </div>
            <button name ="login" class="btn solid">Login</button>
   


            <p class="social-text">Support Us!</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fas fa-atlas"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </form>
          <form action="fpasaheroReg.php" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
       
         
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Firstname" name= "fname"/>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Lastname" name="lname"/>
            </div>

            <div class="input-field">
              <i class="fas fa-phone-alt"></i>
              <input type="text" placeholder="Address" name="add"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Contact Number" name="cn" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="datepicker_one" type="text" class="form-field_input" 
              placeholder="Birthdate" name= "bdate"readonly>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="uname"/>
            </div>
             <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Password" name="pass" />
            </div>
              <button name ="reg" class="btn">Sign up</button>
          </form>
            <br>
             <br>
        </div>
      </div>
  <script>
   const firstCalendar = MCDatepicker.create({ el: '#datepicker_one'})
  </script> 
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Techno Scan</h3>
            <p>
              Techno Scan provides the most economical and cost-effective payment method to your daily transportation.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
           <button onclick="window.location.href='users/DriverReg.php';" class="btn transparent">
      Apply Here!
    </button>

          </div>
          <img src="users/img/phone.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an account?</h3>
            <p>
              Click here to sign in. 
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="users/img/card.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="users/app.js"></script>
  </body>
</html>
