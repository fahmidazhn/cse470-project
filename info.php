<?php
include 'header.php';
require_once('functions/database.php');
db_connect();
?>
	
	
	<div id="body_inner" class="index_box">
  
  <div class="box">
     <h2>Personal Information</h2>
   <form method="post" action="">
   
   <div class="login-form">
        
        <?=show_errors($action); ?>
   
        
        <label for="first name">First Name</label>
        <input type="text"  name="first name" placeholder="First Name">
        
        <label for="middle name">Middle Name</label>
        <input type="text"  name="middle name" placeholder="Middle Name"> 
        
		<label for="last name">Last Name</label>
		<input type="text"  name="last name" placeholder="Last Name">     
   
      </div>
  <!-- Register -->
  
      <div class="Personal Information">
      <label for="father name">Father's Name</label>
		<input type="text"  name="father name" placeholder="Father's Name">  
        <label for="mother name">Mother's Name</label>
		<input type="text"  name="mother name" placeholder="Mother's Name">   
        <label for="gender">Gender</label>
		<input type="text"  name="gender" placeholder="Gender">  
         
   <label for="nationality">Nationality</label>
		<input type="text"  name="nationality" placeholder="Nationality">   
        
        
  
        <label for="email">E-mail Adress</label>
        <input type="email" id="email" name="email" placeholder="E-mail Address">
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password">
         </div>
         
       
 <input type="submit" id="submit" style="float: left;">
 </form>

 