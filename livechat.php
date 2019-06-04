<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script src="/phpfreechat-2.1.1/client/lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/phpfreechat-2.1.1/client/themes/default/pfc.min.css" />
    <script src="/phpfreechat-2.1.1/client/pfc.min.js" type="text/javascript"></script>
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
        <li><a href="index.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span><i class="fas fa-user-plus"></i>Register</span></a></li>
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
          <h2>Live Chat</h2>

          <div id="mychat"><a href="http://www.phpfreechat.net">Creating chat rooms everywhere - phpFreeChat</a></div>
          <script type="text/javascript">
            $('#mychat').phpfreechat({ serverUrl: '/phpfreechat-2.1.1/server' });
          </script>
             


        </div>
  		</div>
  		

          <div class="col-md-3 sidemenumargin">
      			
            <div class="sidemenu">
                  <p>Main Menu</p>
                  <a href="dashboard.html">Profile<i class="fas fa-user sidemenuicon"></i></a>
                  <a href="appointments.html">Appointments<i class="fas fa-book sidemenuicon"></i></a>
                  <a href="prescriptions.html">Prescriptions<i class="fas fa-sticky-note sidemenuicon"></i></a>
                  <a href="results.html">Results<i class="fas fa-file sidemenuicon"></i></a>
                  <a href="livechat.html" class="active">Live chat<i class="fas fa-comment-alt sidemenuicon"></i></a>
                  <a href="drnsavailability.html">Doctors & Nurses Availability<i class="fas fa-user-md sidemenuicon"></i></a>
                  <a href="logout.php">Log out<i class="fas fa-sign-out-alt sidemenuicon"></i></a>
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
