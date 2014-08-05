</body>
</html>
<?php 
if(isset($database)) { $database->close_connection();}
ob_end_flush();
?>