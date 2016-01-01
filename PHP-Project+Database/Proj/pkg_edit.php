<?php 
include("head.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
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
	$("#price1").bind("keypress", function(event) { 
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
	
	$("#price").bind("keypress", function(event) { 
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
<h1>Update Package</h1>
<?php
include('db.php');

$speed = $_GET['speed'];
$name = $_GET['name'];
$price = $_GET['price'];
$validity = $_GET['validity'];

if (isset($_POST['submit'])) {

$name = $_POST['name'];

$speed = $_POST['speed'];
$price = $_POST['price'];
$validity = $_POST['validity'];

$query = mysql_query("UPDATE Package SET name='$name',price='$price',speed='$speed',validity='$validity' 
WHERE name='$name'") or die(mysql_error());

  if ($query) {header('Location:pkg_view.php');}

}




?>

<div>
<form name="form" method="post" action="">
<label>
<h3>Package Name : <?php echo $name; ?></h3></label> 
<input type="hidden" name="name" value="<?php echo $name; ?>" >

<p><input type="text" id="price" name="speed" placeholder="Enter in Mbps E.g 1,2,3" required value="<?php echo $speed;?>" />

<p><input type="text" id="price1" name="price" placeholder="Enter in RS. 1000,2000" required value="<?php echo $price; ?>" />

<p><input type="text" id="username" name="validity" placeholder="Validity In Month ..1 Week 1 Month" required value="<?php echo $validity;?>" />
  </p>

<p>
  <input name="submit" type="submit" name="submit" value="Update" >
</p>
</form>

</div>
</div>
</body>
<?php
include("foot.php");
?>
</html>
