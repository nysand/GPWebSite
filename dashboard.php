<?php

require "component/connect.php";
require_once "component/functions_app.php";
session_start();  

if(isset($_SESSION["username"]))
{  
// Welcome Alert (not active)
    $welcomeuser = '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Login Success, Welcome - '.$_SESSION["username"].'</h3><div>';      
    }  
    else  
    {  
    header("location:login.php");  
    } 

/* Main body */
//call function
insertprofile_details($db);
updateprofile_email($db);
updateprofile_address($db);
updateprofile_tel_number($db);

//fetch information from db
// create a query 
if(!isset($_SESSION['userid'])) {}
    $userid = $_SESSION['userid'];
    $sql= "SELECT * FROM profile WHERE userid=:userid";
    $stmt = $db->prepare($sql); 
    $stmt->execute([':userid' => $userid]);
    $row =$stmt->fetchObject();
    //submit button visible or not visible depending on profile information
    if (!$row){
         $submitbtn = '<input type="submit" class="btn btn-primary btn-xs" value="Submit" name="submit"></input>';
    }
    else {}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
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
        <li><a href="register.html"><span><i class="fas fa-user-plus"></i>Register</span></a></li>
        <li><a href="login.php"><span><i class="fas fa-sign-in-alt"></i>Login</span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<!-- Navbar Ends -->

<!-- content -->
      
<header>  
    <?php 
    //Welcome Alert
    echo $welcomeuser;     
    ?>
</header>

<div class="container">
    <div class="row">
  		<div class="col-md-9">
  			<div id="dashboard">
                <h2>My Profile</h2>
                    <div class="col-md-7">
                        <form method="POST">
                            <fieldset>
                            <label class="labelprofile">First Name: </label>
                            <input type="text" name="first_name" placeholder=" First Name""><br>
                            <label class="labelprofile">Last Name: </label>
                            <input type="text" name="last_name" placeholder=" Last Name" ><br>              
                            <label class="labelprofile">Gender: </label>
                            <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select><br>
                            <label class="labelprofile">D.O.B: </label>
                            <input type="date" name="dob" placeholder=" DD/MM/YYYY"><br>        
                            <label class="labelprofile">Address: </label>
                            <input type="text" name="address">
                            <input type="submit" class="btn btn-primary btn-xs" value="Update" name="update1"></input><br>        
                            <label class="labelprofile">Telephone nr: </label>
                            <input type="text" name="tel_number">
                            <input type="submit" class="btn btn-primary btn-xs" value="Update" name="update2"></input><br>        
                            <label class="labelprofile">Email: </label>
                            <input type="text" name="email">
                            <?php echo $submitbtn ?? "";?>               
                            <input type="submit" class="btn btn-primary btn-xs" value="Update" name="update"></input><br>        
                            </fieldset>
                        </form>
                    </div>

              <div class="col-md-5">
                 <!-- first_name, last_name -->
                   <label class="labelprofile">First Name: <?php echo htmlspecialchars($row->first_name ?? "");?></label><br>
                   <label class="labelprofile">Last Name: <?php echo htmlspecialchars($row->last_name ?? "");?></label><br>
                   <label class="labelprofile">Gender: <?php echo htmlspecialchars($row->gender ?? "");?></label><br>
                   <label class="labelprofile">D.O.B: <?php echo htmlspecialchars($row->dob ?? "");?></label><br>
                   <label class="labelprofile">Address: <?php echo htmlspecialchars($row->address ?? "");?></label><br>
                   <label class="labelprofile">Telephone Number: <?php echo htmlspecialchars($row->tel_number ?? "");?></label><br>
                   <label class="labelprofile">Email: <?php echo htmlspecialchars($row->email ?? "");?></label><br>                 
              </div>

        </div>
  		</div>  		

          <div class="col-md-3 sidemenumargin">      			
              <div class="sidemenu">
                  <p>Main Menu</p>
                  <a href="dashboard.php" class="active">Profile<i class="fas fa-user sidemenuicon"></i></a>
                  <a href="appointments.php">Appointments<i class="fas fa-book sidemenuicon"></i></a>
                  <a href="prescriptions.php">Prescriptions<i class="fas fa-sticky-note sidemenuicon"></i></a>
                  <a href="results.php">Results<i class="fas fa-file sidemenuicon"></i></a>
                  <!-- <a href="livechat.html">Live chat<i class="fas fa-comment-alt sidemenuicon"></i></a> -->
                  <a href="drnsavailability.php">Doctors & Nurses Availability<i class="fas fa-user-md sidemenuicon"></i></a>
                  <a href="logout.php">Log out<i class="fas fa-sign-out-alt sidemenuicon"></i></a>
          </div>              
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
