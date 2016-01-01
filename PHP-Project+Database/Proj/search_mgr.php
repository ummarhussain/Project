<?php
    require_once('db.php');	
	include("head.php");
	include("auth.php");
	$found = 0;
	if(isset($_POST['filter'])){
		$col=$_POST['filter'];
		$sql = "select * from Manager where(Manager.{$col} like '%{$_POST['txt']}%')";
		
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0){
			$found=1;
		}else{
			$found=2;
		}
	}
	
?>
<html>
	<head>
		<title>Search Manager</title>
		</script>
	</head>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<center><h1>Search Manager</h1></center>
	<p>&nbsp;</p>
	<body style="background-color: ; font-family: Tahoma, Geneva, sans-serif; font-weight: bold;">
		<br>
		<form method="post">
		<table align="center">
			<tr>
				<td>Search by:</td>
				<td>
					<select name="filter">
						<option value="username"> Username</option>
						<option value="email">Email</option>
						<option value="c_code">City Code</option>
					</select>
				</td>
				<td><input type="text" size="40" name="txt" required> <input type="submit" value="Search"></td>
			</tr>
		</table>
		<form>
		<br>
		<?php if($found==1){ ?>
		<table width="1000" align="center" cellspacing="0" cellpadding="5">
			<tr style="color: #34495e; background-color: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">
				<td>Name</td>
				<td>Username</td>
				<td>Password</td>
				<td>Email</td>
				<td>Phone</td>
				<td>City Code</td>
				<td>Admin Name</td>
				<td></td>
			</tr>
			<?php $cc=0;while($row=mysql_fetch_assoc($res)){ ?>
			<tr style="background-color:#fff;?>">
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['username']; ?></td>
			  <td><?php echo $row['password']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['c_code']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<?php $cc++;} ?>
		</table>
		<?php }elseif($found==2){ ?>
	<center>
	  <h3 style="color:#2ecc71">No Manager found!</h3></center>
		<?php } ?>
	</body>
   <?php
    include("foot.php");
	?>
</html>