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
            return /[0-9]/.test(keyChar); 
        }
    });
	
	
	
});



</script>



<body>
<div class="form">
  <h1>Update Customer Information</h1>
<?php
include('db.php');


$username = $_GET['username'];
$name = $_GET['name'];
$PHONE = $_GET['PHONE'];
$CNIC = $_GET['CNIC'];
$c_code = $_GET['c_code'];
$m_username = $_GET['m_username'];
$PACKAGE = $_GET['PACKAGE'];

if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$PHONE = $_POST['PHONE'];
$CNIC = $_POST['CNIC'];
$PACKAGE = $_POST['PACKAGE'];
$c_code = $_POST['c_code'];
$m_username = $_POST['m_username'];

$query = mysql_query("UPDATE Customer SET name='$name',password='$password',PHONE='$PHONE',CNIC='$CNIC',
c_code='$c_code',m_username='$m_username',PACKAGE='$PACKAGE' WHERE username='$username'") or die(mysql_error());

  if ($query) {header('Location:cs_view.php');}

}




?>

<div>
<form name="form" method="post" action="">
<label><h3>Username : <?php echo $username; ?></h3></label> 
<input type="hidden" name="username" value="<?php echo $username; ?>" >
<p><input type="password" name="password" placeholder="Enter new password" required value="" /></p>
<p><input type="text" id="name" name="name" placeholder="Enter new name" required value="<?php echo $name;?>" />

<p><input type="text" id="cnic" maxlength="13" name="CNIC" placeholder="Enter CNIC" required value="<?php echo $CNIC; ?>" />

<p><input type="text" id="phone" maxlength="14" name="PHONE" placeholder="Enter new Phone e.g 3332556 " required value="<?php echo $PHONE;?>" />
  </p>
<p>
  Package
    <select name="PACKAGE">
      <?php $query	=	mysql_query('Select * from Package') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
      <?php }?>
    </select>
  
  
  
</p>
<p>
  
  
  
  City Code
    <select name="c_code">
    <?php $query	=	mysql_query('Select * from City') or die(mysql_error);?>
    <?php while($row = mysql_fetch_array($query)){?>
    <option value="<?php echo $row['code'];?>"><?php echo $row['code'];?></option>
    <?php }?>
  </select>
  
</p>
<p>Manager
    
    <select name="m_username">
      <?php $query	=	mysql_query('Select * from Manager') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
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
