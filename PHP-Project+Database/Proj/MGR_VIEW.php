<?php 
require('db.php');
include("auth.php");
include("head_mgr.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
  <h2>Your Details</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
<th><strong>username</strong></th>
<th><strong>Phone</strong></th>
<th><strong>password</strong></th>
<th><strong>email</strong></th>
<th><strong>City</strong></th>
<th><strong>admin</strong></th>


<th><strong>Edit</strong></th></tr>
</thead>
<tbody>
<?php

/* Database config */
$db_host        = 'isp.kashmirbroadband.net';
$db_user        = 'infooid_isp';
$db_pass        = '12345678';
$db_database    = 'infooid_isp'; 
/* End config */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_database);
/* check connection */
if (mysqli_connect_errno()) {printf("Connect failed: %s\n", mysqli_connect_error());}


$username=$_SESSION['username'];


$query = mysqli_query($mysqli,"SELECT * FROM Manager WHERE username='$username'") or die(mysqli_connect_error());

$row = mysqli_fetch_array($query);
 ?>
<tr><td align="center">1</td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["phone"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["c_code"]; ?></td>
<td align="center"><?php echo $row["admin"]; ?></td>


<td align="center"><a href="edit.php?username=<?php echo $row["username"]; ?>">Edit</a></td>


</tr>
<?php  ?>
</tbody>
</table>
</div>

</body>
<?php
include("foot.php");
?>
</html>