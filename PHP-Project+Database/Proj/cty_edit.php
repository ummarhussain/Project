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
            return /[0-9/.]/.test(keyChar); 
        }
    });
	
	
	
});



</script>





<body>
<div class="form">
  <h1>Update City Information</h1>
<?php
include('db.php');


$code = $_GET['code'];
$name = $_GET['name'];
$nas_name = $_GET['nas_name'];
$nas_ip = $_GET['nas_ip'];

if (isset($_POST['submit'])) {

$code = $_POST['code'];

$name = $_POST['name'];
$nas_name = $_POST['nas_name'];
$nas_ip = $_POST['nas_ip'];

$query = mysql_query("UPDATE City SET name='$name',nas_name='$nas_name',nas_ip='$nas_ip',code='$code' 
WHERE code='$code'") or die(mysql_error());

  if ($query) {header('Location:cty_view.php');}

}




?>

<div>
<form name="form" method="post" action="">
<label><h3>CODE : <?php echo $code; ?></h3></label> 
<input type="hidden" name="code" value="<?php echo $code; ?>" >

<p><input type="text" id="name" name="name" placeholder="Enter new City name e.g Abbotabad" required value="<?php echo $name;?>" />

<p><input type="text" name="nas_name" placeholder="Enter New NAS Name e.g ABT" required value="<?php echo $nas_name; ?>" />

<p><input type="text" id="cnic" name="nas_ip" placeholder="Enter to NAS IP 192.168.1.1" required value="<?php echo $nas_ip;?>" />
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
