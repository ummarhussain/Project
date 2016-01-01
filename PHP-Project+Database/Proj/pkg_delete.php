<?php

?>
<?php 
require('db.php');
$id=$_REQUEST['name'];
$query = "DELETE FROM Package WHERE name='$id'"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: pkg_view.php"); 
 ?>