<?php
include('../additional_php_files/connection.php');
session_start();
error_reporting(1);
$uid = $_SESSION["id"];

if($uid == true)
{
}
else
{
	header("location: http://localhost/project/admin_login_page/admin_login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
body{background-color : black; margin :0;}
</style>
</head>
<body style="background-color: black;9">
	<div>
		<table border=2px style="border-collapse: collapse; font-size : 20px; background-color: white" cellpadding=20>
			
			<tr style="background-color : grey; color : white;">
			<th>Sno</th>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Additional infomation</th>
			<th>Operation</th>
			</tr>
			<?php	
			$sql1 = "SELECT * FROM user_comment";
			$result1 = mysqli_query($conn, $sql1);
			
			if(!$result1){
				die("query cannot proceed");
			}
			while($row1 = mysqli_fetch_assoc($result1))
			{
				
				?>
				<tr>
					<td><?php echo $row1['Sno'];?>
					</td>
					<td><?php echo $row1['FirstName'].' '.$row1['LastName'];?></td>
					
					<td><?php echo $row1['Email'];?>
					</td>
					<td><?php echo $row1['Message'];?>
					</td>
					<td><?php echo $row1['Add_details'];?>
					</td>
					<td>
					<?php echo "<a href='comment_report.php?code=$row1[Sno]' name='delete' value='delete'>DELETE</a>";?>
					</td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</body>
</html>
<?php
$sn1=$_GET['code'];
if($sn1!=''){
$sn1=$_GET['code'];
$sql = "DELETE FROM `user_comment` WHERE Sno='$sn1'";
			$result = mysqli_query($conn, $sql);
			
			if(!$result){
				die("query cannot proceed");
			}
			else{
				header("location: http://localhost/project/admin_portal/comment_report.php");
			}
}
?>