<!DOCTYPE html>
<html>

<head>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->
    <link href='./css/login.css' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/login.js"></script>
</head>    



<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="javascript:void(0);" method="get">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text" id='userName' Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password" id='userPassword' Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                <span style="width:30%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot password?</a></span>
                <span style="width:30%; text-align:center;  display: inline-block;"><input type="submit" id="loginButton" value="Sign In"></span>
                <span style="width:30%; text-align:right; display: inline-block;"><input type='submit' id="registerButton" href='register.php' value="Register"></span>
            </div>

          </fieldset>
            <div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">Login
          
          <div class="clearfix"></div>
      </div>
      
      </div>
</center>
    </div>

</div>

</html>

<?php
session_start();

if (isset($_POST['loginForm'])) {  //login form has been submitted
    include 'connection.php';
    $dbConn = get_database_connection();

    $sql = "SELECT * FROM admin " .
           "WHERE username = '" . $_POST['userName'] . "' " .
           "AND password = '" . hash("sha1", $_POST['passWord']) . "'";

     $stmt = $dbConn->query($sql);
     $record = $stmt->fetch();

  if (!empty($record)) { //if record with username and password was found
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    header("Location: main.php");
  } else {
    $errorArray = array("Wrong username/password");  
  }
} //endIf loginForm was submitted

?>