<?php
include("head.php");
include("auth.php");
?>



<!DOCTYPE html>

<html>

<head>

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
	
	$("#ip").bind("keypress", function(event) { 
        var charCode = event.which;

        if(charCode == 8 || charCode == 0)
        {
             return;
        }
        else
        {
            var keyChar = String.fromCharCode(charCode); 
            return /[0-9/.]/.test(keyChar); 
        }
    });
	
	
	
});



</script>











<meta charset="utf-8">

<title>Manager Registration</title>

<link rel="stylesheet" href="css/style1.css" />

</head>

<body>

<?php

	require('db.php');

    // If form submitted, insert values into the database.

    if (isset($_POST['code'])){

        $code = $_POST['code'];

		$name = $_POST['name'];

       	$nas_name = $_POST['nas_name'];

		$nas_ip = $_POST['nas_ip'];

		$phone = $_POST['phone'];

		$code = stripslashes($code);

		$code = mysql_real_escape_string($code);

		$nas_name = stripslashes($nas_name);

		$nas_ip = mysql_real_escape_string($nas_ip);


		

        $query = "INSERT into `City` (name, code, nas_ip, nas_name) VALUES ('$name', '$code', '$nas_ip', '$nas_name')";

        $result = mysql_query($query)or die(mysql_error());

        if($result){

            echo "<div class='form'><h3>Added Successfully.</h3><br/>Click here add another City <a href='cty_reg.php'>Add City</a></div>";

        }

    }else{

?>
<center>
</center>

<div class="form">
  
  <h1>Add new City</h1>

<form name="registration" action="" method="post">

  <p>
  <input type="text" id="name" name="name" placeholder="City Name e.g Islamabad" required />
  </p>
  <p>
    <input type="text" id="phone" name="code" maxlength="6" placeholder="City Code" required />
    </p>
  <p>
    <input type="text" id="name" name="nas_name" placeholder="NAS_Name" required />
  </p>
  <p>
    <input type="text" id="ip" name="nas_ip" placeholder="NAS_IP e.g 10.0.0.1" required />
  </p>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="submit" value="Register" />
</p>

</form>

</div>
<?php
include("foot.php");
?>
<?php } ?>

</body>

</html>

