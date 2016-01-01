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
<p>| <a href="cs_reg.php">Add New Customer</a></p>
<h2>Registerd Customers</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
  <th><strong>Username</strong></th>
  <th><strong>password</strong></th>
<th><strong>Phone</strong></th>
<th><strong>CNIC</strong></th>
<th><strong>Package</strong></th>
<th><strong>RegDate</strong></th>
<th><strong>City</strong></th>
<th><strong>Edit</strong></th><th><strong>Delete</strong></th>
<th><strong>Manager</strong></th>
</tr>
</thead>
<tbody>


<?php
$count=1;
$sel_query="Select * from Customer;";
$result = mysql_query($sel_query);
while($row = mysql_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>

<td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>


<td align="center"><?php echo $row["PHONE"]; ?></td><td align="center"><?php echo $row["CNIC"]; ?></td>

<td align="center"><?php echo $row["PACKAGE"]; ?></td><td align="center"><?php echo $row["REGDate"]; ?></td>
<td align="center"><?php echo $row["c_code"]; ?></td>

<td align="center"><a href="cs_edit.php?username=<?php echo $row["username"]; ?>">Edit</a></td><td align="center">
<a href="cs_delete.php?username=<?php echo $row["username"]; ?>">Delete</a></td>
<td align="center"><?php echo $row["m_username"]; ?>


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
