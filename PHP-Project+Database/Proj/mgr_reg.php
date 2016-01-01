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

    if (isset($_POST['username'])){

        $username = $_POST['username'];

		$password = $_POST['password'];

       	$name = $_POST['name'];

		$email = $_POST['email'];

		$phone = $_POST['phone'];

		$admin = $_POST['admin'];
		$c_code = $_POST['c_code'];

		$username = stripslashes($username);

		$username = mysql_real_escape_string($username);

		$email = stripslashes($email);

		$email = mysql_real_escape_string($email);

		$password = stripslashes($password);

		$password = mysql_real_escape_string($password);

		

        $query = "INSERT into `Manager` (username, password, name, email,phone,admin,c_code) VALUES ('$username', '$password', '$name', '$email','$phone', '$admin', '$c_code')";

        $result = mysql_query($query)or die(mysql_error());

        if($result){

            echo "<div class='form'><h3>Registerd Successfully </h3><br/>Click here add another Manager<a href='mgr_reg.php'> Add Manager</a></div>";

        }

    }else{

?>
<center>
</center>

<div class="form">
  
  <h1>Add New Manager</h1>

<form name="registration" action="" method="post">

  <p>
  <input type="text" id="username" name="username" placeholder="Username" required />


  
  <input type="password" name="password" placeholder="password" required />
    
  <input type="text" id="name" name="name" placeholder="Name" required />
  </p>
  <p>
    <input type="text" id="phone" minlrngth="1" maxlength="14" name="phone" placeholder="Phone" required />
    </p>
  <p>
    <input type="email" name="email" placeholder="Email" required />
  </p>
  <p>Admin     
    <select name="admin">
      <?php $query	=	mysql_query('Select * from Admin') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
      <?php }?>
    </select>
  </p>
  <p>
    
   
    
    
    Select City(code)
    <select name="c_code">
      <?php $query	=	mysql_query('Select * from City') or die(mysql_error);?>
      <?php while($row = mysql_fetch_array($query)){?>
      <option value="<?php echo $row['code'];?>"><?php echo $row['code'];?></option>
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

