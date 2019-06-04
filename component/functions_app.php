<?php
//Register Page Create User function
function registerusers($db) {
    // function to register new users in the database 
            if(!isset($_POST['submit'])) {
            return; }
            $errMsg = '';
    // get the data from the front end
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordconf = $_POST['password_confirm'];
    // check the values
                if( !$username || !$email || !$password || !$passwordconf) {
                    echo 'One or more fields are empty.';
                    return;
                }
                else {        
    // escape special characters in a string for use in the SQL statement
                }
    // ENCRYPT THE PASSWORD
                $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
                $check = '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Password did not match! Try again..</div>';
            
                if(($_POST["password"])!=($_POST["password_confirm"])){
    
                    echo $check;
                    return;
              }            
    // create a query
               $sqlQuery = "INSERT INTO register (username, email, password) VALUES (:username, :email, :password)";
                
    //prepare the query
                $query = $db->prepare($sqlQuery);                
    //execute the query
                $query->execute(array(
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $encrypt_pass                
                        ));     
    // check if the student was successfully inserted in the database
                if ($query) {
                    echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>You have successfully registered. You can now login <a href="login.php">login</a></div>';
                }
                else {
    // print the error generated
                    echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. Your registration was not successful, please try again.</div>';
                }                
            }
//Appointments Page Functions 
function insertappointment($db) {

    if(!isset($_POST['submit'])) {
        return;
      }
        $errMsg = '';
    
    //get the data from the front end
    $fullname = $_POST['fullname'];   
    $day = $_POST['day'];
    $time = $_POST['time'];    
        
    //check the values
    if( !$fullname || !$day || !$time) {
        echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>One or more fields are empty.</h3></div>';
        return;
    }
    else {
        //escape special characters in a string for use in the SQL statement 
   }
    
    //create a query
    $userid = $_SESSION['userid'];
    $sqlQuery = "INSERT INTO `appointments` (`userid`, `FullName`, `Day`, `Time`) VALUES (?,?,?,?)";      
    //prepare the query
    $query = $db->prepare($sqlQuery);
    //execute the query
    $query->execute(array($userid,$fullname,$day,$time));
    //check if the appointment was inserted in the database
    if ($query) {
        echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>The appointment was inserted in the database</h3></div>';
    }
    else {
        // print the error message
        echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>The appointment was not inserted in the database</h3></div>';
    }
      
}
function deleteappointment($db) {

    if(!isset($_POST['delete'])) {
        return;
      }
        $errMsg = '';
    
      // create a query
    $userid = $_SESSION['userid'];
    $sqlQuery = "DELETE FROM `appointments` WHERE `userid`=$userid";       
    //prepare the query
    $query = $db->prepare($sqlQuery);
    //execute the query
    $query->execute(array($userid));  
    // check if the student was deleted from the database
    if ($query) {
        echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>The appointment was deleted from the database</h3></div>';
    }
    else {
        // print the error generated
        echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>There is no appointment to deleted from the database</h3></div>';
    }
    
  }

function updateappointment($db) {

    if(!isset($_POST['update'])) {
        return;
      }
        $errMsg = '';
    
    // get the data from the front end
    $fullname = $_POST['fullname'];   
    $day = $_POST['day'];
    $time = $_POST['time'];
  
    // check the values
    if(!$fullname || !$day || !$time) {
      echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';
      return;
  }
  else {
      // escape special characters in a string for use in the SQL statement      
  }
   
    // create a query
    $userid = $_SESSION['userid'];
    $sqlQuery = "UPDATE `appointments` SET `FullName`=:fullname ,`Day`=:day , `Time`=:time WHERE userid=$userid";    
    //prepare the query
    $query = $db->prepare($sqlQuery);
    //execute the query
    $query->execute(array(":fullname" => $fullname,
                          ":day" => $day,
                          ":time" => $time));  
    // check if the appointment was updated in the database
    if ($query) {
        echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>The appointment was modified in the database.</h3></div>';
    }
    else {
        // print the error generated
        echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>The appointment was not updated in the database. Please all your details.</h3></div>';
    }    
  }

// Dashboard Page Functions

function insertprofile_details($db) {

    if(!isset($_POST['submit'])) {
      return;
    }
      $errMsg = '';
      
      // get the data from the front end
      $first_name = $_POST['first_name'];   
      $last_name = $_POST['last_name'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $address = $_POST['address'];
      $tel_number = $_POST['tel_number'];
      $email = $_POST['email'];
          
      // check the values
      if( !$first_name || !$last_name || !$gender || !$dob || !$address || !$tel_number || !$email) {
          echo 'One or more fields are empty.';
          return;
      }
      else {
          // escape special characters in a string for use in the SQL statement 
     }
      
      // create a query
      $userid = $_SESSION['userid'];
      $sqlQuery = "INSERT INTO `profile`(`userid`,`first_name`, `last_name`, `gender`, `dob`, `address`, `tel_number`, `email`) VALUES (?,?,?,?,?,?,?,?)";
         
      //prepare the query
      $query = $db->prepare($sqlQuery);
      //execute the query
      $query->execute(array($userid,$first_name,$last_name,$gender,$dob,$address,$tel_number,$email));
      
      // check if the student was successfully inserted in the database
      
      if ($query) {
          echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Your profile information has been added to the database</div>';
      }
      else {
          // print the error generated
          echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. Please try again.</div>';
      }      
  }



function updateprofile_email($db) {

    if(!isset($_POST['update'])) {
      return;
    }
      $errMsg = '';
      
      // get the data from the front end
      $email = $_POST['email'];
               
      // check the values
      if(!$email) {
          echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';
          return;
      }
      else {
          // escape special characters in a string for use in the SQL statement
          
     }
      
      // create a query
      $userid = $_SESSION['userid'];
      $sqlQuery = "UPDATE `profile` SET `email`= :email WHERE $userid";        
      //prepare the query
      $query = $db->prepare($sqlQuery);      
      //execute the query
      $query->execute(array(":email"=> $email));     
      // check if the student was successfully inserted in the database     
      if ($query) {
      echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>You successfully updated your profile.</div>';  
       }
      else {
        // print the error generated
      echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';       
        }      
  }

function updateprofile_address($db) {

    if(!isset($_POST['update1'])) {
      return;
    }
      $errMsg = '';
      
      // get the data from the front end
      
      $address = $_POST['address'];          
      // check the values
      if(!$address) {
          echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';
          return;
      }
      else {
          // escape special characters in a string for use in the SQL statement
          
     }
      
      // create a query
      $userid = $_SESSION['userid'];      
      $sqlQuery1 = "UPDATE `profile` SET `address` = :address  WHERE $userid";      
      //prepare the query      
      $query1 = $db->prepare($sqlQuery1);     
      //execute the query      
      $query1->execute(array(":address"=> $address));     
      // check if the student was successfully inserted in the database     
      if ($query1) {
      echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>You successfully updated your profile.</div>';  
       }
      else {
        // print the error generated
      echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';       
        }      
  }

function updateprofile_tel_number($db) {

    if(!isset($_POST['update2'])) {
      return;
    }
      $errMsg = '';
      
      // get the data from the front end
      $tel_number = $_POST['tel_number'];
          
      // check the values
      if(!$tel_number) {
          echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';
          return;
      }
      else {
          // escape special characters in a string for use in the SQL statement
          
     }
      
      // create a query
      $userid = $_SESSION['userid'];
      $sqlQuery2 = "UPDATE `profile` SET `tel_number` = :tel_number WHERE $userid";
         
      //prepare the query
      $query2 = $db->prepare($sqlQuery2);
      //execute the query
      $query2->execute(array("tel_number"=> $tel_number));      
      // check if the student was successfully inserted in the database      
      if ($query2) {
      echo '<div id="alert1" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>You successfully updated your profile.</div>';  
       }
      else {
        // print the error generated
      echo '<div id="alert1" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Something went wrong here. There is nothing to update.</div>';       
        }      
  }
  
  
    
  
  
  
  ?>