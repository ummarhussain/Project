<?php

?>



<?php 

require('db.php');

include("auth.php"); 
include("head.php");
//include auth.php file on all secure pages ?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Dashboard - View Records</title>

<link rel="stylesheet" href="css/style.css" />

</head>

<body>

<div class="form">
  <p><center>
    Welcome <?php echo $_SESSION['username']; ?>!
  </center>
  </p>

<p><a href="view.php"> Manager</a></p>
<p><a href="cs_view.php">Customer</a></p>
<p><a href="cty_view.php">City</a></p>
<p><a href="pkg_view.php">Package</a></p>
<p><a href="ip_view.php">IP-Pools</a></p>
<p><a href="search.php">Search Customer</a></p>
<p><a href="search_mgr.php">Search Manager</a></p>
<p><a href="registration.php">Add new admin to system</a></p>

</div>

</body>
<?php
include("foot.php");
?>
</html>

