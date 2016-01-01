<?php

?>
<?php 
require('db.php');
$id=$_REQUEST['p_id'];
$query = "DELETE FROM IP_Pool WHERE p_id='$id'"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: ip_view.php"); 
 ?>