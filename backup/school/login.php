<?php
include 'header.php';
include 'footer.php';
?>

<html>
<head>
<title>School Administrative System </title>
<link href = "css/style.css" rel = "stylesheet" />
</head>
<body>
<div class="div1" style="padding-top:100px; text-align:center;">


<?php

session_start();
//require_once('includes.php');

    //Connect to server
    $link = mysql_connect("localhost", "root", "") or die(mysql_error());
    //Select the database
    mysql_select_db ("school_database");
    // Get the login credentials from user
    $username = $_POST['username'];
    $userpassword = $_POST['password'];
    // Secure the credentials
    $username = mysql_real_escape_string($_POST['username']);
    $userpassword = mysql_real_escape_string($_POST['password']);
 
    // Check the users input against the DB.
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$userpassword'";
		
    $result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
     
	 $count = mysql_num_rows($result);
	 if($count == 1){
		 header("Location: staff/index.php");
	 }
	 else{
		 echo "<p>Login failed, username or password incorrect.</p>";
		 
	 }
?>

<form action="login_form.php" method="post" enctype="application/x-www-form-urlencoded">
<dl>
<dt>
 <br><br>  <input type="submit" name="backBtn" value="Back" onClick="../login_form.php" class="button" /></dt>
    </dl>
    </form>

</div>
</body>
</html>

