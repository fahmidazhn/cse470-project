<?php
ini_set('display_errors',true);
ini_set('error_reporting',E_ALL);  
 //Error reporting True/False
ob_start();            
@session_start();
include_once('../functions/auth.php');
//cheakin user level 4
$level = check_levels('1');
?>
<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
	    <title>School Administrative System</title>
	    <!--main stylesheet-->
	    <link href="../libs/css/stylesheet.css" rel="stylesheet" type="text/css">
	     <!--Admin stylesheet-->
	    <link href="libs/css/stylesheet.css" rel="stylesheet" type="text/css">
	</head>
<body>