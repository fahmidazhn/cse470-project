<?php

function db_connect(){

  $host     = "localhost";    // Replace with your database server name
  $username = "root";        // Replace with your username
  $password = "";   // Replace with your password
  $database = "school_database";   // Replace with your database name
  
  $connection = mysql_connect($host, $username, $password);
  if(!$connection){
    exit('Could not connect to database: '. mysql_error());
  } 
  $db_select = mysql_select_db($database);
  if(!$db_select){
    exit("Could not select database '$database'");
  }
 
}
function close_connection() {
	if(isset($connection)) {
		mysql_close($connection);
		unset($connection);
	}
}

?>