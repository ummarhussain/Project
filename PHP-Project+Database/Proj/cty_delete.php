<?php

?>
<?php 
require('db.php');
$id=$_REQUEST['code'];
$query = "DELETE FROM City WHERE code='$id'"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: cty_view.php"); 
 ?>