<?php
include("head.php");
include("auth.php");
?>



<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Manager Registration</title>

<link rel="stylesheet" href="css/style1.css" />

</head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

$(document).ready(function(){
 $("#username").bind("keypress", function(event) { 
        var charCode = event.which;

        if(charCode == 8 || charCode == 0)
        {
             return;
        }
        else
        {
            var keyChar = String.fromCharCode(charCode); 
            return /[a-zA-Z0-9]/.test(keyChar); 
        }
    });
	$("#phone").bind("keypress", function(event) { 
        var charCode = event.which;

        if(charCode == 8 || charCode == 0)
        {
             return;
        }
        else
        {
            var keyChar = String.fromCharCode(charCode); 
            return /[0-9]/.test(keyChar); 
        }
    });
	
	$("#name").bind("keypress", function(event) { 
        var charCode = event.which;

        if(charCode == 8 || charCode == 0)
        {
             return;
        }
        else
        {
            var keyChar = String.fromCharCode(charCode); 
            return /[a-zA-Z]/.test(keyChar); 
        }
    });
	
	$("#cnic").bind("keypress", function(event) { 
        var charCode = event.which;

        if(charCode == 8 || charCode == 0)
        {
             return;
        }
        else
        {
            var keyChar = String.fromCharCode(charCode); 
            return /[0-9]/.test(keyChar); 
        }
    });
	
	
	
});



</script>








<body>

<?php

	require('db.php');

    // If form submitted, insert values into the database.

    if (isset($_POST['name'])){

        $name = $_POST['name'];

		$speed = $_POST['speed'];

       	$price = $_POST['price'];

		$validity = $_POST['validity'];

		$phone = $_POST['phone'];

		$name = stripslashes($name);

		$name = mysql_real_escape_string($name);



		

        $query = "INSERT into `Package` (name, speed, price, validity) VALUES ('$name', '$speed', '$price', '$validity')";

        $result = mysql_query($query)or die(mysql_error());

        if($result){

            echo "<div class='form'><h3>Package Added Successfully.</h3><br/>Click here to go back <a href='pkg_view.php'>Packages</a></div>";

        }

    }else{

?>
<center>
</center>

<div class="form">
  
  <h1>Add New Package</h1>

<form name="registration" action="" method="post">

  <p>
  <input type="text" id="name" name="name" placeholder="name" required />
  </p>
  <p>
    
    <input type="text" id="phone" name="speed" placeholder="Enter in Mbps E.g 1,2,3" required />
  </p>
  <p>
    
    <input type="text" id="cnic" name="price" placeholder="Enter in RS. 1000,2000" required />
    </p>
  <p>
    <input type="text" id="username" name="validity" placeholder="Validity In Month 1 Week 1 Month" required />
  </p>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="submit" value="Add" />
</p>

</form>

</div>
<?php } ?>

</body>
<?php
include("foot.php");
?>
</html>

