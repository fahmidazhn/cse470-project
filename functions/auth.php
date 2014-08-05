<?php 
//Dtabase connection..
include_once('database.php');
//Helping functions..
include_once('functions.php');
db_connect();

/*--------------------------------------------------------------*/
/*Checking user email and password..
/*--------------------------------------------------------------*/

function validate_User($email,$password){
    // prevent mysql injection
     $email = mysql_real_escape_string($email);
     $query = "SELECT `id`, `password` ,`salt`
               FROM `users`
               WHERE `email` = '$email' ";
    $result = mysql_query($query);
    if(mysql_num_rows($result)){
       $user = mysql_fetch_assoc($result);
       $password_requested = sha1($user['salt'] . $password);
    if($password_requested === $user['password']){
        
        return $user['id'];
       
       }
    
    
    } 
   
   return false;
}
/*--------------------------------------------------------------*/
/* Log into the user $user..
/*--------------------------------------------------------------*/

function log_in($user_id){
  
 	 $_SESSION['user_id'] = $user_id;
 	 
}
/*--------------------------------------------------------------*/
/* Returns the currently logged in user (if any)
/*--------------------------------------------------------------*/
function current_user(){
  static $current_user;
	  if(!$current_user){
	    if(isset($_SESSION['user_id'])){
	      $user_id = intval($_SESSION['user_id']);
	      $query = "SELECT * 
	                FROM `users` 
	                WHERE `id` = $user_id";
	                
	      $result = mysql_query($query);
	      if(mysql_num_rows($result)){
	        $current_user = mysql_fetch_assoc($result);
	        return $current_user;
	      }
	    }
	  }
  return $current_user;
}

/*--------------------------------------------------------------*/
/* Requires a current user..
/*--------------------------------------------------------------*/

function require_login(){
    if(!current_user()){
     if(stristr($_SERVER['PHP_SELF'], 'admin')){
     $_SESSION['redirect_to'] = $_SERVER["REQUEST_URI"];
     header("Location:../login.php?msg=2");
     exit;
  }else{
     $_SESSION['redirect_to'] = $_SERVER["REQUEST_URI"];
     header("Location:login.php?msg=2");
     exit;
  }
 }
}
/*--------------------------------------------------------------*/
/*cheaking user level to access to page
/*--------------------------------------------------------------*/

function check_Userlevel()
{
    $user = current_user();
    $level = $user['user_level'];
    $query = "SELECT `login_level`,`permission` 
           FROM 
           `users_level`
           WHERE 
           `login_level`= {$level}";         
    $result = mysql_query($query);
    if(mysql_num_rows($result)){
       $mem = mysql_fetch_assoc($result);
        return $mem;
     }
    return $mem;
}

/*--------------------------------------------------------------*/
/*cheakin user login level
/*--------------------------------------------------------------*/

function check_levels($level)
{
   $user = current_user();
   $mem  = check_Userlevel();
   $login_level = $mem['login_level'];
   $permission = $mem['permission'];
   $ch_level = $user['user_level'];
   
	if($permission != 'on') {
	   header("Location:../login.php?msg=1");
	   exit("You are being redirected");
	   
	} else if($ch_level <= $level) {
	
	   return $level;
	   
	} else {
	
		if(stristr($_SERVER['REQUEST_URI'], 'admin')) {
		   header("Location:../login.php");
		exit;
		}else{
		header("Location:login.php");
		exit;
		}
	
	}
return $level;
}
?>