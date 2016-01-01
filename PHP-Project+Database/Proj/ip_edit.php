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










<body>
<div class="form">
<p>&nbsp;</p>
<h1>Update IP Pool</h1>
<?php
include('db.php');

$space = $_GET['space'];
$p_id = $_GET['p_id'];
$name = $_GET['name'];


if (isset($_POST['submit'])) {

$p_id = $_POST['p_id'];

$name = $_POST['name'];
$space = $_POST['space'];

$query = mysql_query("UPDATE IP_Pool SET p_id='$p_id',name='$name',space='$space' 
WHERE p_id='$p_id'") or die(mysql_error());

  if ($query) {header('Location:ip_view.php');}

}




?>

<div>
<form name="form" method="post" action="">
<label>
<h3>IP_Pool Name: <?php echo $P_id; ?></h3></label> 
<input type="hidden" name="p_id" value="<?php echo $p_id; ?>" >

<p>
<p><input type="text" id="name" name="name" placeholder="Enter New Name e.g Corporate,Students" required value="<?php echo $name; ?>" />

<p><input type="text" id="ip" name="space" placeholder="Enter new Subnet e.g 10.0.0.0/8" required value="<?php echo $space;?>" />
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
