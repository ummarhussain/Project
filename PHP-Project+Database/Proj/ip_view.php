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
<p><a href="ip_reg.php">Add new IP_</a><a href="ip_reg.php">Pool</a></p>
<h2>Current Pools</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th>
<th><strong>Pool ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Space</strong></th>
<th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;




$sel_query="Select * from IP_Pool;";
$result = mysql_query($sel_query);



while($row = mysql_fetch_assoc($result))

 { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["p_id"]; ?></td><td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["space"]; ?></td>
<td align="center"><a href="ip_edit.php?name=<?php echo $row["name"]; ?>&speed=<?php echo $row["speed"]; ?>
&p_id=<?php echo $row["p_id"]; ?>">Edit</a></td><td align="center">





<a href="ip_delete.php?p_id=<?php echo $row["p_id"]; ?>">Delete</a></td>


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
