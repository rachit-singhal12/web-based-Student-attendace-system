<?php
session_start();

$uid = $_SESSION['teacid'];

if($uid == true)
{
	
}
else
{
	header("location: http://localhost/project/front_page/code1.php");
}
?>
<html>
<head>
	<title>Staff portal</title>
	<link rel="icon" type="image/x-icon" href="image/favicon.ico">
</head>
<frameset cols="15%,*,15%" name="full">
	<frame src="" style="background-color : black;">
	<frameset rows="20.5%,*">
		<frame src="heading.html" name="heading">
		<frameset cols="25%,*">
			<frame src="staff_left_side.php" name="nav_bar">
			<frame src="staff_profile.php" name="main">
		</frameset>
	</frameset>
	<frame src="" style="background-color : black;">
</frameset>
</html>