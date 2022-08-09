<?php
include('../additional_php_files/connection.php');
session_start();
$uid = $_SESSION["id"];
if($uid == true)
{	
}
else
{
	header("location: http://localhost/project/admin_login_page/admin_login_page.html");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<style>
		body{margin : 0;}
	</style>
</head>
<body style="background-color: black;">
	<div><center>
	<form action="" method="post" style="background-color : white"><br><br>
	<table>
	<tr>
	<td><label>Enter Subject Code</label></td>
	<td><input type="text" name="sc"></td>
	</tr>
	<tr>
	<td><input type="submit" name="submit"></td>
	<td><input type="reset"></td>
	</tr>
	</table><br><br>
	</form></center>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$code=$_POST['sc'];
	
	?>
	<div>
		<table border=2px style="border-collapse: collapse; font-size : 20px; background-color: white" cellpadding=20>
			
			<tr style="background-color : grey; color : white;">
			<th>Sno</th>
			<th>Student Name</th>
			<th>Subject Code</th>
			<th>Total<br></th>
			<th>Present<br></th>
			<th>Absent<br></th>
			</tr>
			<?php
			
			$qry = "SELECT * FROM subject WHERE subjectCode='$code'";
			$r = mysqli_query($conn, $qry);
			if(!$r){
				die("query cannot proceed");
			}
			$r1 = mysqli_fetch_assoc($r);
			$secl = $r1['selectedClass'];
			$sese = $r1['selectedSemester'];
			
			
			$sql = "SELECT * FROM student WHERE Course='$secl' and semester='$sese'";
			$result = mysqli_query($conn, $sql);
			if(!$result){
				die("query cannot proceed");
			}
			$s=0;
			while($row = mysqli_fetch_assoc($result)){
			$uids=$row['UID'];
			$sem = $row['semester'];
			$course = $row['Course'];
				$sql2= "SELECT * FROM attendance WHERE subjectCode='$code' AND studentuid='$uids'";
				$result2 = mysqli_query($conn, $sql2);
				if(!$result2){
					die("query cannot proceed");
				}
				$s++;
				$p=0;
				$a=0;
				$total=0;
				while($row2 = mysqli_fetch_assoc($result2))
				{
					$total++;
					if($row2['attendanceStatus']=="p")
					{
						$p++;
					}
					else{$a++;}
				}
				?>
				<tr>
					<td><?php echo "$s";?>
					</td>
					<td><?php echo $row['FirstName'].' '.$row['LastName'];?></td>
					<td><?php echo "$code";?>
					</td>
					<td><?php echo "$total";?>
					</td>
					<td><?php echo "$p";?>
					</td>
					<td><?php echo "$a";?>
					</td>
				</tr>
				<?php
	}}
			?>
		</table>
	</div>
</body>
</html>