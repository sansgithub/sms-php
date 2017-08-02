<?php
	session_start();
	if(isset($_SESSION['uid'])){
		header('location:admin/admindash.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1 align="center">Admin Login</h1>
	<form method="POST" action="login.php">
		<table align="center">
				<tr>
					<td>Username</td>
					<td><input type="text" name="uname" rquired></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" requird></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
					<input type="submit" value="Login" name="login"></td>
				</tr>
		</table>
		
	</form>

</body>
</html>
<?php
	include('dbcon.php');
	if(isset($_POST['login'])){
		$username=$_POST['uname'];
		$password=$_POST['pass'];
		$query="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'"; 
		$run=mysqli_query($conn,$query);
		$row=mysqli_num_rows($run);
		if($row<1){
			?>
			<script>
			alert("Username or password not match!!");
			window.open('login.php','_self');
			</script>
			<?php 
		}else{
			$data=mysqli_fetch_assoc($run);
			$id=$data['id'];
			$_SESSION['uid']=$id;
			header('location:admin/admindash.php');
		}
	}
?>