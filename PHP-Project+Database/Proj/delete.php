<?php

?>
<?php 
require('db.php');
$id=$_REQUEST['username'];
$query = "DELETE FROM Manager WHERE username='$id'"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: view.php"); 
 ?>