<?php 
include("head.php");
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
	
	
	
	
	
});



</script>



<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="MGR_VIEW.php">Dashboard</a></p>
<h1>Update Manager Information</h1>
<?php
include('db.php');


$username = $_GET['username'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$c_code = $_GET['c_code'];
$admin = $_GET['admin'];

if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$c_code = $_POST['c_code'];
$admin = $_POST['admin'];

$query = mysql_query("UPDATE Manager SET password='$password',name='$name',phone='$phone',email='$email',c_code='$c_code',admin='$admin' WHERE username='$username'") or die(mysql_error());

  if ($query) {header('Location:view.php');}

}




?>

<div>
<form name="form" method="post" action="">
<label><h3>Username : <?php echo $username; ?></h3></label> 
<input type="hidden" name="username" value="<?php echo $username; ?>" >
<p><input type="password" name="password" placeholder="Enter new password" required value="" /></p>
<p><input type="text" id="name" name="name" placeholder="Enter new name" required value="<?php echo $name;?>" />

<p><input type="text" id="phone" maxlength="14" name="phone" placeholder="Enter new Phone no e.g 33385222454" required value="<?php echo $phone; ?>" />

<p><input type="email" name="email" placeholder="Enter new Email" required value="<?php echo $email;?>" />
  </p>
<p>
  <select name="admin">
    <?php $query	=	mysql_query('Select * from Admin') or die(mysql_error);?>
    <?php while($row = mysql_fetch_array($query)){?>
    <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
    <?php }?>
  </select>
</p>
<p>
  
  
  
  <select name="c_code">
    <?php $query	=	mysql_query('Select * from City') or die(mysql_error);?>
    <?php while($row = mysql_fetch_array($query)){?>
    <option value="<?php echo $row['code'];?>"><?php echo $row['code'];?></option>
    <?php }?>
  </select>
  
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
