<?php
require "../component/connect.php";
require_once "../component/functions_app.php";

session_start();  
if(isset($_SESSION["username"])) 
{  
    // Welcome Alert
     $welcomeuser = '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Login Success, Welcome - '.$_SESSION["username"].'</h3><div>';      
    }  
else  
{  
     header("location:login.php");  
}

echo insertappointment($db);
echo deleteappointment($db);
echo updateappointment($db);

// hide submit button if active appointment
// create a query
$userid = $_SESSION['userid'];
$sql= "SELECT * FROM appointments WHERE userid=:userid";
$stmt = $db->prepare($sql); 
$stmt->execute([':userid' => $userid]);
$row =$stmt->fetchObject();

if (!$row){
  $submitbtn = '<input type="submit" class="btn btn-success" name="submit" value="Submit"></input>';
}
else {}
?>

<?php 

if(isset($_POST['checkapp'])) {
 

  $errMsg = '';

//get the data from the front end
$pacid = $_POST['pacid'];     
  
//check the values
if( !$pacid) {
  echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>One or more fields are empty.</h3></div>';
  return;
}
else {
  //escape special characters in a string for use in the SQL statement 


//create a query
$userid = $_SESSION['userid'];
$sqlQuery = "SELECT 'userid' FROM `appointments` WHERE 'userid'=$pacid";      
$stmt = $db->prepare($sql); 
$stmt->execute([':userid' => $pacid]);
$row =$stmt->fetchObject(); }}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
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
      <a class="navbar-brand" href="../index.html">Over Surgery</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="../aboutus.html">About Us</a></li>
        <li><a href="../contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../register.html"><span><i class="fas fa-user-plus"></i>Register</span></a></li>
        <li><a href="../login.php"><span><i class="fas fa-sign-in-alt"></i>Login</span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<!-- Navbar Ends -->
<!-- content -->
<div class="container">
    <div class="row">
  		<div class="col-md-9">

  			<div id="dashboard">
            <h2>Appointments</h2>
            <div class="col-md-7">
             <form class="form-horizontal apppagedashboard" method="POST">          
              <!-- Name -->
              <label class="control-label"  for="fullname">Patient Name:</label>
              <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="input-xlarge">
              <p class="help-block" style="color: black;">Please enter patients full name.</p>  

              <!-- Day -->
              <label class="control-label"  for="day">Date:</label>
              <input type="date" name="day"><br>
              <p class="help-block" style="color: black;">Please be aware we are open only Monday to Friday. Appointments for Saturday and Sunday will not be considered.</p>
                        
              <!-- Time -->
              <label class="control-label"  for="time">Time:</label>
              <select name="time">
           <?php
                /* This section in commented out becaus ethe code is not working/incomplete */
               /* $times = [
                  "9:00 - 9:50" => true,
                  "10:00 - 10:50"=> true,
                  "11:00 - 11:50"=> true,
                  "12:00 - 12:50"=> true,
                  "13:00 - 13:50"=> true,
                  "14:00 - 14:50"=> true,
                  "15:00 - 15:50"=> true,
                  "16:00 - 16:50"=> true,
                ];
                $dsn = 'mysql:host=localhost;dbname=oversurgery';
                $user = 'toxic';
                $password = 'sysop2018';

                try {
                    $db = new PDO($dsn, $user, $password);
                } catch (PDOException $e) {
                      die('Sorry, database problem');
                }
                
                $bookedTimes =[
                  "11:00 - 11:50" => true
                ];
                
                $sql1= "SELECT Time FROM appointments";
                $stmt1 = $db->prepare($sql); 
                $stmt1->execute();
                while ($row1 =$stmt1->fetchObject()){
                  $bookedTimes[$row1->Time] = true;
                }

                foreach($times as $time=>$value){
                  if(!($bookedTimes[$time] ?? false)){
                    echo "<option value='$time'>$time</option>";
                  }                  
                } */
             ?> 
                <option value="9:00 - 9:50">9:00 - 9:50</option>
                <option value="10:00 - 10:50">10:00 - 10:50</option>
                <option value="11:00 - 11:50">11:00 - 11:50</option>
                <option value="12:00 - 12:50">12:00 - 12:50</option>
                <option value="13:00 - 13:50">13:00 - 13:50</option>
                <option value="14:00 - 14:50">14:00 - 14:50</option>
                <option value="15:00 - 15:50">15:00 - 15:50</option>
                <option value="16:00 - 16:50">16:00 - 16:50</option>
              </select>
              <p class="help-block" style="color: black;"></p>          
          

            <div class="control-group">
              <!-- Submit Update Delete Button -->
              <div class="controls">
                <?php echo $submitbtn ?? "" ?>
                <!-- <input type="submit" class="btn btn-success" name="submit" value="Submit"></input> -->
                <input type="submit" class="btn btn-primary" name="update" value="Modify"></input>
                <input type="submit" class="btn btn-danger" name="delete" value="Delete"></input>                
              </div>
            </div>

  </form>
            </div>

              <div class="col-md-5 apppagedashboardleft">
              <div id="bookalert" class="alert alert-success" role="alert"><?php echo htmlspecialchars($row->FullName ?? ""); ?> You have booked your appointment on: <?php echo htmlspecialchars($row->Day ?? "");?> between <?php echo htmlspecialchars($row->Time ?? "");?></div>
                    <div class="controls">                   
              </div>
              <form method="POST">
                <label class="control-label"  for="pacid">Pacient id:</label>
                <input type="text" id="pacid" name="pacid" placeholder="Pacient id" class="input-xlarge">
                <p class="help-block" style="color: black;">Please enter pacients user id.</p>
                <input type="submit" class="btn btn-success" name="checkapp" value="Submit">
              </form>        
              </div>              
              
              
        </div>
  		</div>
  		

          <div class="col-md-3 sidemenumargin">
      			
            <div class="sidemenu">
                  <p>Main Menu</p>
                  <a href="reception_dashboard.php">Staff Profile<i class="fas fa-user sidemenuicon"></i></a>
                  <a href="reception_appointments.php" class="active">Pacient Appointments<i class="fas fa-book sidemenuicon"></i></a>
                  <!-- <a href="prescriptions.php">Prescriptions<i class="fas fa-sticky-note sidemenuicon"></i></a> -->
                  <!-- <a href="results.php">Results<i class="fas fa-file sidemenuicon"></i></a> -->
                  <!-- <a href="livechat.html">Live chat<i class="fas fa-comment-alt sidemenuicon"></i></a> -->
                  <a href="reception_drnsavailability.php">Doctors & Nurses Availability<i class="fas fa-user-md sidemenuicon"></i></a>
                  <a href="../logout.php">Log out<i class="fas fa-sign-out-alt sidemenuicon"></i></a>
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
