<?php
 session_start();  
 $host = "localhost";  
 $username = "toxic";  
 $password = "sysop2018";  
 $database = "oversurgery";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["loginbtn"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                //$query = 'SELECT * FROM register WHERE username = :username';
                $query = "SELECT g.*, r.* FROM register AS r JOIN groupusers AS gu ON r.userid = gu.userid JOIN groups AS g ON g.group_id = gu.group_id
                WHERE r.username = :username";
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          ':username' => $_POST["username"],                             
                     ));  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                  //fetch row  
                  $row = $statement->fetch(PDO::FETCH_OBJ);
                  //read hashed password
                  $hash_pass = $row->password;
                  if (password_verify($_POST["password"], $hash_pass)) {

                  $_SESSION["username"] = $_POST["username"];  
                  $_SESSION["userid"] = $row->userid;
                  $_SESSION["group_id"]=$row->group_id;
                  if ($_SESSION["group_id"] == 1) {
                  header("location:dashboard.php");}
                  if ($_SESSION["group_id"] == 2) {
                    header("location:receptionist/reception_dashboard.php");}                 
                  
                }
                else  
                {  
                     $message = '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid Username or Password.<div>';  
                } 
              } else {
                $message = '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid Username or Password.<div>';
              }
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?> 
<!DOCTYPE html>
<html>
<head>


	<title>Login</title>
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
                <li class="active"><a href="login.php"><span><i class="fas fa-sign-in-alt"></i>Login</span></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header>
        <!-- Navbar Ends -->


<!-- Content -->
<header>
  <!-- alert! -->
<?php                 
     echo $message;  
?>
</header>
<div class="container">                
	<div class="row">		
		  <div class="col-md-12">
		  	<div id="content1">
          <!-- Form -->
				 <h1>Login</h1>
				    <form action="" method="post">
              <div class="form-group" id="txtcol">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" autocomplete="off">
              </div>
              <div class="form-group" id="txtcol">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" autocomplete="off">
              </div>
				      <hr>
				 	    <button class="btn btn-success" type="submit" name="loginbtn" value="loginbtn">Submit</button>
            </form>
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