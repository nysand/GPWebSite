<!DOCTYPE html>
<html>
<head>
    <title>Doctors & Nurses Availability</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
</head>
<body>
<!-- Navbar starts-->
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
        <li><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
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
<!-- Navbar Ends -->
<!-- content -->
<div class="container">
    <div class="row">
  		<div class="col-md-9">
  			<div id="dashboard">
            <h2>Doctors & Nurses Availability</h2>

            <form method='POST' name='filter' class='filter'> 
                <!-- <p>Filter By:</p>  -->
                <select name="value">
                    <option value="None">None</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Dr. Reinholds">Dr. Reinholds</option>
                    <option value="Dr. Gillard">Dr. Gillard</option>
                    <option value="Dr. Huan Liao">Dr. Huan Liao</option>
                    <option value="Dr. Farah">Dr. Farah</option>
                    <option value="Nurse Mahoney">Nurse Mahoney</option>
                    <option value="Nurse Nightingale">Nurse Nightingale</option>
                    <option value="Nurse Sikota">Nurse Sikota</option>
                    <option value="Nurse Silver">Nurse Silver</option>
                </select>	
                <br/>	
                <input type='submit' class="btn btn-primary btn-xs" value = 'Filter'>
            </form>
    
            <table>
                <thead>
                    <tr>
                      <th>Name of Doctor</th>
                      <th>Monday</th>
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                        //connect to the DB
                        require_once('component/connect.php');
                        // Query the DB for all the values
                        if(isset($_POST['value'])) {                              
                            if($_POST['value'] == 'Monday') {  
                                // query to get all Herring records  
                                $query = "SELECT Name, Monday FROM doctorsandnurses";
                            } 
                            elseif($_POST['value'] == 'Tuesday') {  
                                // query to get all Herring records  
                                $query = "SELECT Name, Tuesday FROM doctorsandnurses";                     
                            }
                            elseif($_POST['value'] == 'Wednesday') {  
                                // query to get all Herring records  
                                $query = "SELECT Name, Wednesday FROM doctorsandnurses";                     
                            }
                            elseif($_POST['value'] == 'Thursday') {  
                                // query to get all Herring records  
                                $query = "SELECT Name, Thursday FROM doctorsandnurses";                     
                            }
                            elseif($_POST['value'] == 'Friday') {  
                                // query to get all Herring records  
                                $query = "SELECT Name, Friday FROM doctorsandnurses";                     
                            }
                            elseif($_POST['value'] == 'Dr. Reinholds') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Dr. Reinholds'";                     
                            }
                            elseif($_POST['value'] == 'Dr. Gillard') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Dr. Gillard'";                     
                            }
                            elseif($_POST['value'] == 'Dr. Huan Liao') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Dr. Huan Liao'";                     
                            }
                            elseif($_POST['value'] == 'Dr. Farah') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Dr. Farah'";                     
                            }
                            elseif($_POST['value'] == 'Nurse Mahoney') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Nurse Mahoney'";                     
                            }
                            elseif($_POST['value'] == 'Nurse Nightingale') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Nurse Nightingale'";                     
                            }
                            elseif($_POST['value'] == 'Nurse Sikota') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Nurse Sikota'";                     
                            }
                            elseif($_POST['value'] == 'Nurse Silver') {  
                                // query to get all Herring records  
                                $query = "SELECT * FROM doctorsandnurses WHERE Name='Nurse Silver'";                     
                            }
                            else {  
                                // query to get all records  
                                $query = "SELECT * FROM doctorsandnurses";  
                            }}
                        
                        $sqlquery = "SELECT * FROM doctorsandnurses ORDER BY id ASC";
                        $queryStr = $query ?? $sqlquery;
                        $query = $db->prepare($queryStr);
                        $query->execute();
                        for($i=0; $row = $query->fetch(); $i++){?>
                    
                    <tr>
                        <td><label><?php echo $row['Name']; ?></label></td>
                        <td><label><?php echo $row['Monday'] ?? ""; ?></label></td>
                        <td><label><?php echo $row['Tuesday'] ?? ""; ?></label></td>
                        <td><label><?php echo $row['Wednesday'] ?? ""; ?></label></td>
                        <td><label><?php echo $row['Thursday'] ?? ""; ?></label></td>
                        <td><label><?php echo $row['Friday'] ?? ""; ?></label></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>           
         </div>
  		</div>  		

          <div class="col-md-3 sidemenumargin">      			
            <div class="sidemenu">
                  <p>Main Menu</p>
                  <a href="dashboard.php">Profile<i class="fas fa-user sidemenuicon"></i></a>
                  <a href="appointments.php">Appointments<i class="fas fa-book sidemenuicon"></i></a>
                  <a href="prescriptions.php">Prescriptions<i class="fas fa-sticky-note sidemenuicon"></i></a>
                  <a href="results.php">Results<i class="fas fa-file sidemenuicon"></i></a>
                  <!-- <a href="livechat.php">Live chat<i class="fas fa-comment-alt sidemenuicon"></i></a> -->
                  <a href="drnsavailability.php" class="active">Doctors & Nurses Availability<i class="fas fa-user-md sidemenuicon"></i></a>
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
