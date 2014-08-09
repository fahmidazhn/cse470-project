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
ob_start();
session_start();
//require_once('includes.php');

    //Connect to server
    $db = mysql_connect("localhost", "root", "") or die(mysql_error());
    //Select the database
    mysql_select_db ("school_database", $db);
    // Get the login credentials from user
    $username = $_POST['username'];
    $userpassword = $_POST['password'];
    // Secure the credentials
    $username = mysql_real_escape_string($_POST['username']);
    $userpassword = mysql_real_escape_string($_POST['password']);
 
    // Check the users input against the DB.
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$userpassword'";
		
    $result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
     
	 $row= mysql_fetch_array($result);
	 $count = mysql_num_rows($result);
	 if($count == 1){
		session_regenerate_id();
		$_SESSION['sess_username'] = $username;
		session_write_close();
		if($row['userlevel'] == 1){
		header("Location: admin/index_logged.php");
		}
		elseif($row['userlevel'] == 2){
		header("Location: staff/index_logged.php");
		}
		elseif($row['userlevel'] == 3){
		header("Location: teacher/index_logged.php");
		}
		else{
			echo "<p>Login failed, user undefined.</p>";
		}
		
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

