<!doctype html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="sample.css">
	<link rel="icon" type="image/x-icon" href="image/favicon.ico">
	</title>
</head>
<body background="Z:\front-end\admin\image\bg.jpg">
	<div align="center">
		<img id="topimage" src="image/ap.jpg" alt="Image not loaded yet" width ="auto" height="auto" align="centre">
	</div>
	<div class="admin_login_page" align="center" style="border-collapse:collapse;
	margin-top:10%;
	padding-top:12px;
	margin-left:40%;
	margin-right:40%;
	border-style:hidden;;
	border-color:black;">
		<form action="" method="post">
			<table><tr><td>
			<lable style="color : blue" ><b><center>Admin Login Panel</b></lable></td></tr>
			<tr><td>
			<input type="text" required placeholder="Enter Username" id="admin_id" name="username" ></td></tr>
			<tr><td>
			<input type="password" required placeholder="Enter Password" id="admin_id" name="password"></td></tr>
			<tr><td style="padding-top:5px;"><center>
			<input  type="Submit" value="Login" id="button_controls" name="submit"></td></tr>
			<tr><td><center>
			<a href="http://localhost/project/front_page/code1.php" style="font-size : 14px;"><b>Back to Home</b></a></td></tr>
		</table>
		</form>
	</div>
</body>
</html>
<?php
include('../additional_php_files/connection.php');
session_start();
if(isset($_POST['submit'])){
	$user =$_POST['username'];
	$pass = $_POST['password'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "eattendance";
	
	$conn = mysqli_connect($servername,$username,$password,$databasename);
	
	if(!$conn){
		die("connection failed".mysqli_connect_error());
	}
		if( isset( $_POST['submit'] ) ){
	$query= "SELECT * FROM login_table WHERE UID='$user' AND PASS='$pass';";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row == 0) {
		echo '<script>alert("Wrong user id and password")</script>';
  		}
 	else {
		$_SESSION["id"]=$user;
  		header("Location: http://localhost/project/admin_portal/admin_portal.php");
	}
	}
}
?>