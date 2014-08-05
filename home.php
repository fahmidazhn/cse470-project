<?php
// Checked in _header.php
$login_required = true; 
include_once('header.php');
//cheking user level 4
$level = check_levels('4');

?>
<style type="text/css">
body,td,th {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
}
</style>

 <html>
 <style type="text/css" media="screen">
     table { width: 620px; border: 1px solid;float:right; padding: 1px;}
     th, td {  border: 1px solid; padding: 10px;
               text-align: left; }
  a:link {
	color: #000;
}
a:visited {
	color: #006;
}
 </style>
<table>
    <tr>
      <th><?php include 'button.php'; ?></th> 
    </tr>
    
    
</table>

</html>



<h1>Welcome <?php echo $current_user['first_name'];
 ?></h1>
<p>&nbsp;</p>
<?php include 'footer.php'; ?>

