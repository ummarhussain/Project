<?php

include("head.php");

?>



<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Customer Registration</title>

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

    if (isset($_POST['username'])){

        $username = $_POST['username'];

		$password = $_POST['password'];

       	$name = $_POST['name'];

		$cnic = $_POST['cnic'];

		$phone = $_POST['phone'];
		$c_code = $_POST['c_code'];
		$m_username = $_POST['m_username'];

		$pkg = $_POST['pkg'];
		$time = $_POST['CURRENT_TIMESTAMP'];

		$username = stripslashes($username);

		$username = mysql_real_escape_string($username);

		$password = stripslashes($password);

		$password = mysql_real_escape_string($password);

		

        $query = "INSERT INTO `Customer` (name, username, password, PHONE, CNIC, PACKAGE,REGDate,c_code,m_username) VALUES ('$name', '$username', '$password', '$phone', '$cnic', '$pkg',CURRENT_TIMESTAMP,'$c_code','$m_username')";

        $result = mysql_query($query)or die(mysql_error());

        if($result){

            echo "<div class='form'><h3>Customer registered successfully.</h3><br/>Click here to <a href='dashboard.php'>Goto main page</a></div>";

        }

    }else{

?>
<center>
</center>

<div class="form">
  
  <h1>New Customer Registration</h1>

<form name="registration" action="" method="post">

  <p>
  <input type="text" id="username" name="username" placeholder="Username" required />
    
  <input type="text" id="name" name="name" placeholder="Name e.g Awais ,Dr.ErajKhan" required />
  </p>
  <p>
    
    <input type="text" id="phone" maxlength="14" name="phone" placeholder="Phone no" required />
    </p>
  <p>
    <input type="text" id="cnic" maxlength="13" name="cnic" placeholder="CNIC e.g 8120205337311" required />
  </p>
  <p>
    <input type="password" name="password" placeholder="Password" required />
  </p>
  
  
  <p>Package
    <select name="pkg">
      <?php $query	=	mysql_query('Select * from Package') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
      <?php }?>
    </select>
    
    </p>
  <p>
  
    City code
      <select name="c_code">
      <?php $query	=	mysql_query('Select * from City') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['code'];?>"><?php echo $row['code'];?></option>
      <?php }?>
    </select>
  </p>
  <p>manager
    
    <select name="m_username">
      <?php $query	=	mysql_query('Select * from Manager') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
      <?php }?>
    </select>
    
    
    
    
  </p>
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

