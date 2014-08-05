<?php
/*--------------------------------------------------------------*/
/* Function to sanitize values received from the form. Prevents SQL injection
/*--------------------------------------------------------------*/
function clean($str) {
	$str = @trim($str);
	
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	if (!is_numeric($str))
	{
	$str = mysql_real_escape_string($str);
	}
	return $str;
}
/*--------------------------------------------------------------*/
/* Function to Remove html characters 
/*--------------------------------------------------------------*/
function htr($string){
  return htmlspecialchars($string);
}
//cleanup the errors
function show_errors($action){

	$error = false;

	if(!empty($action['result'])){
	
		$error = "<ul class=\"alert $action[result]\">"."\n";

		if(is_array($action['text'])){
	
			//loop out each error
			foreach($action['text'] as $text){
			
				$error .= "<li><p>$text</p></li>"."\n";
			
			}	
		
		}else{
		
			//single error
			$error .= "<li><p>$action[text]</p></li>";
		
		}
		
		$error .= "</ul>"."\n";
		
	}

	return $error;

}

?>
