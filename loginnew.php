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
                $query = 'SELECT * FROM register WHERE username = :username AND password = :password';  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          ':username' => $_POST["username"],  
                          ':password' => $_POST["password"]  
                     ));  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                  //fetch row  
                  $row = $statement->fetch(PDO::FETCH_OBJ);
                  $_SESSION["username"] = $_POST["username"];  
                  $_SESSION["userid"] = $row->userid;  
                  header("location:dashboard.php");  
                }  
                else  
                {  
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
        <li class="active"><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="index.html">About Us</a></li>
        <li><a href="bookings.html">Appointments</a></li>
        <li><a href="index.html">Prescriptions</a></li>
        <li><a href="index.html">Results</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span><i class="fas fa-user-plus"></i>Register</span></a></li>
        <li><a href="login.php"><span><i class="fas fa-sign-in-alt"></i>Login</span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
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
				 	 <button class="btn btn-default" type="submit" name="loginbtn" value="loginbtn">Submit</button>

                </form>

                

            </div>
            
          </div>
          
 	</div>  
	
</div>


<!-- Scripts -->
<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>