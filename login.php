<?php
include 'header.php';
require_once('functions/database.php');
db_connect();

if(isset($current_user)){
 header("Location:home.php");
 exit("You are being redirected");
}

?>
<div id="body_inner" class="index_box">
  
  <div class="box">
     <h2>Login</h2>
   <form method="post" action="authenticate.php">
   <!-- Login -->
   <?php if($_GET['msg'] == '1'): ?>
     <h3 class="error">Attention! Your Email and/or Password are incorrect</h3>
   <?php endif ?>
   
   <?php if($_GET['msg'] == '2'): ?>
     <h3 class="error">Attention! You must log in to view this page.</h3>
   <?php endif ?>
   <?php if($_GET['msg'] == '3'): ?>
     <h3 class="success">Thank you for registering! <br/><span>You may login </span></h3>
   <?php endif ?>
      
	  <div class="login-form">
	     
	     <label for="Email">Email</label>
	     <input type="email" id="email" name="email" placeholder="Email">
	     
	     <label for="password">Password</label>
	     <input type="password" id="password" name="password" placeholder="Password">
	
	   </div>
    <!-- Submit -->
       <input type="submit" id="submit" value="Login">
    <!-- Help -->
       <a href="register.php" class="register">Register!</a>
       <a href="#" class="forgot-password" title="Forgot password?">Forgot?</a>
       
  </form>
  
   <!-- End Box -->
   </div>
    
</div>
<?php 
include 'footer.php';
?>

