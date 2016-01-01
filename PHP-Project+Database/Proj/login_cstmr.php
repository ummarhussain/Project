<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style1.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `Customer` WHERE username='$username' and password='$password'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: CSTMR_VIEW.php"); 
			// Redirect user to index.php
			
			
			
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login_cstmr.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
  <p>Customer Login</p>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<legend>
<input name="submit" type="submit" value="LogIn" />

<img src="lloo.png" width="297" height="78" alt="KBL" longdesc="http://www.kashmirbroadband.net">

</form>
</div>
<?php } ?>
</body>
<?php
include("foot.php");
?>
</html>
