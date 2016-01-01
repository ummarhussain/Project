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

<title>IP Pool</title>

<link rel="stylesheet" href="css/style1.css" />

</head>

<body>

<?php

	require('db.php');

    // If form submitted, insert values into the database.

    if (isset($_POST['p_id'])){

        $p_id = $_POST['p_id'];

		$name = $_POST['name'];

       	$space = $_POST['space'];


		

        $query = "INSERT into `IP_Pool` (p_id, name, space) VALUES ('$p_id', '$name', '$space')";

        $result = mysql_query($query)or die(mysql_error());

        if($result){

            echo "<div class='form'><h3>Added Successfully.</h3><br/>Click here add another 
			<a href='ip_reg.php'>Add Another Pool</a></div>";

        }

    }else{

?>
<center>
</center>

<div class="form">
  
  <h1>Add New IP Pool</h1>

<form name="registration" action="" method="post">

  <p>
  <input type="text" id="phone" name="p_id" placeholder="Enter PoolID e.g 10,20,30" required />  
  <p>
    
    <input type="text" id="name" name="name" placeholder="Pool Name e.g Corporate,Home,Students" required />
    
    <p>
      <input type="text" id="ip" name="space" placeholder="Address Space Subnet e.g 10.0.0.0/16" required />
      
      
    <p>
    <input type="submit" name="submit" value="Register" />
</p>

</form>

</div>

<?php } ?>

</body>
<?php
include("foot.php");
?>
</html>

