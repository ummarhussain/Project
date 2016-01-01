<?php 
require('db.php');
include("auth.php");
include("head.php");
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
<p>| <a href="mgr_reg.php">Add new Manager</a></p>
<h2>Registerd Managers</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
<th><strong>username</strong></th>
<th><strong>Phone</strong></th>
<th><strong>password</strong></th>
<th><strong>email</strong></th>
<th><strong>City</strong></th>
<th><strong>admin</strong></th>


<th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;




$sel_query="Select * from Manager;";
$result = mysql_query($sel_query);

$result1 = mysql_query("SELECT COUNT( Customer.username ) FROM Customer,Manager
WHERE Manager.username=Customer.m_username GROUP by Manager.username");
$num_rows = mysql_num_rows($result1);


while($row = mysql_fetch_assoc($result))

 { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["phone"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["c_code"]; ?></td>
<td align="center"><?php echo $row["admin"]; ?></td>


<td align="center"><a href="edit.php?username=<?php echo $row["username"]; ?>&name=<?php echo $row["name"]; ?>&phone=<?php echo $row["phone"]; ?>&email=<?php echo $row["email"]; ?>&c_code=<?php echo $row["c_code"]; ?>&admin=<?php echo $row["admin"]; ?>">Edit</a></td><td align="center">





<a href="delete.php?username=<?php echo $row["username"]; ?>">Delete</a></td>


</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
<?php
include("foot.php");
?>
</html>
