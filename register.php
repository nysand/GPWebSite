<?php
/* Main body */
//connect to the DB and call the function
            require 'component/connect.php';
            require 'component/functions_app.php';   
            registerusers($db);  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
</head>
<body>
<!-- Navbar starts-->
    <header>
        <nav class="navbar navbar-inverse">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">Over Surgery</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="register.html"><span><i class="fas fa-user-plus"></i>Register</span></a></li>
                <li><a href="login.php"><span><i class="fas fa-sign-in-alt"></i>Login</span></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header>
        <!-- Navbar Ends -->
<!-- content -->
<div class="row">
  <div class="col-md-12">
    <div id="content2">
      <form class="form-horizontal" action='register.php' method="POST">          
          <div id="legend">
              <legend class=""><h1>Register</h1></legend>
          </div>
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                      <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required="" pattern="[A-Za-z0-9]{4,10}" style="color: black;">
                      <p class="help-block">Username should contain (letters and numbers only, no punctuation or special characters)</p>
                    </div>
                </div>

                <div class="control-group">
                  <!-- E-mail -->
                  <label class="control-label" for="email">E-mail</label>
                  <div class="controls">
                    <input type="email" id="email" name="email" placeholder="name@example.com" class="input-xlarge" required="" style="color: black;">
                    <p class="help-block">Please provide a valid E-mail address</p>
                  </div>
                </div>
       
                <div class="control-group">
                  <!-- Password-->
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" style="color: black;">
                    <p class="help-block">Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters</p>
                  </div>
                </div>
       
                <div class="control-group">
                  <!-- Password -->
                  <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                  <div class="controls">
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" style="color: black;">
                    <p class="help-block">Please confirm password</p>
                  </div>
                </div>
       
                <div class="control-group">
                  <!-- Button -->
                  <div class="controls">
                   <input type="submit" class="btn btn-success" name="submit" value="Register"></input>
                  </div>
                </div>        
      </form>
</div>
</div>
</div>
<!-- Footer -->
<footer class='footer'>
    <div class="container">
        <p style="padding-top:15px;">&copy; Over Surgery 2018</p>
    </div>            
</footer>
<!-- Scripts -->
<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!--Live Chat Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5addb8235f7cdf4f05338479/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End Live Chat Script-->
</body>
</html>