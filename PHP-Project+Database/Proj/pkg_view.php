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
<p>| <a href="pkg_reg.php">Add new packages</a></p>
<h2>Current Pacakges</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
<th><strong>Speed</strong></th>
<th><strong>Price</strong></th>
<th><strong>Validity</strong></th>



<th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;




$sel_query="Select * from Package;";
$result = mysql_query($sel_query);



while($row = mysql_fetch_assoc($result))

 { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["speed"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center"><?php echo $row["validity"]; ?></td>



<td align="center"><a href="pkg_edit.php?name=<?php echo $row["name"]; ?>&speed=<?php echo $row["speed"]; ?>&validity=<?php echo $row["validity"]; ?>&price=<?php echo $row["price"]; ?>">Edit</a></td><td align="center">





<a href="pkg_delete.php?name=<?php echo $row["name"]; ?>">Delete</a></td>


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
