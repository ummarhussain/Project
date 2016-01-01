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
<p>| <a href="cty_reg.php">Add new City</a></p>
<h2>Registerd Cities</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Nas Name</strong></th>
<th><strong>Nas IP</strong></th>



<th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;




$sel_query="Select * from City;";
$result = mysql_query($sel_query);



while($row = mysql_fetch_assoc($result))

 { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["code"]; ?></td>
<td align="center"><?php echo $row["nas_name"]; ?></td>
<td align="center"><?php echo $row["nas_ip"]; ?></td>



<td align="center"><a href="cty_edit.php?code=<?php echo $row["code"]; ?>&name=<?php echo $row["name"]; ?>&nas_name=<?php echo $row["nas_name"]; ?>&nas_ip=<?php echo $row["nas_ip"]; ?>">Edit</a></td><td align="center">





<a href="cty_delete.php?code=<?php echo $row["code"]; ?>">Delete</a></td>


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
