<?php 
require('db.php');
include("auth.php");
include("head_cs.php");

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
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
  <th><strong>Username</strong></th>
<th><strong>Phone</strong></th>
<th><strong>CNIC</strong></th>
<th><strong>Package</strong></th>
<th><strong>RegDate</strong></th>

<th><strong>Edit</strong></th>

<th><strong>Manager</strong></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>

<?php
$username=$_SESSION['username'];
$count=1;
$sel_query="Select * from Customer where username='$username'";
$result = mysql_query($sel_query);


while($row = mysql_fetch_assoc($result)) 
{ ?>
<tr><td align="center"><?php echo $count; ?></td>

<td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["username"]; ?></td>


<td align="center"><?php echo $row["PHONE"]; ?></td><td align="center"><?php echo $row["CNIC"]; ?></td>

<td align="center"><?php echo $row["PACKAGE"]; ?></td><td align="center"><?php echo $row["REGDate"]; ?></td>

<td align="center"><a href="cs_edit_cs.php?username=<?php echo $row["username"]; ?>">Edit</a></td><td align="center"><?php echo $row["username"]; ?>
<td align="center">&nbsp;</td>




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
