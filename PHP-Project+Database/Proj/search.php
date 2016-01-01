<?php
    require_once('db.php');	
	include("head.php");
	include("auth.php");
	$found = 0;
	if(isset($_POST['filter'])){
		$col=$_POST['filter'];
		$sql = "select * from Customer where(Customer.{$col} like '%{$_POST['txt']}%')";
		
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
		<title>Search Customer</title>
		</script>
	</head>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<center><h1>Search Customer</h1></center>
	<p>&nbsp;</p>
	<body style="background-color: ; font-family: Tahoma, Geneva, sans-serif; font-weight: bold;">
		<br>
		<form method="post">
		<table align="center">
			<tr>
				<td>Search by:</td>
				<td>
					<select name="filter">
						<option value="username">Username</option>
						<option value="PHONE">Phone</option>
						<option value="CNIC">CNIC</option>
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
				<td>Customer Name</td>
				<td>Customer Phone</td>
				<td>Password</td>
				<td>Phone NO</td>
				<td>Cnic</td>
				<td>City Code</td>
				<td>Manager Name</td>
				<td></td>
			</tr>
			<?php $cc=0;while($row=mysql_fetch_assoc($res)){ ?>
			<tr style="background-color:#fff;?>">
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['username']; ?></td>
			  <td><?php echo $row['password']; ?></td>
				<td><?php echo $row['PHONE']; ?></td>
				<td><?php echo $row['CNIC']; ?></td>
				<td><?php echo $row['c_code']; ?></td>
				<td><?php echo $row['m_username']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<?php $cc++;} ?>
		</table>
		<?php }elseif($found==2){ ?>
	<center><h3 style="color:#2ecc71">No Customer found!</h3></center>
		<?php } ?>
	</body>
   <?php
    include("foot.php");
	?>
</html>