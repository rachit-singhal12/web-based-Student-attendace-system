<?php
include('../additional_php_files/connection.php');
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
<body style="margin : 0;background-color: black;">
<div><center>
	<form action="" method="post" style="background-color : white"><br><br>
	<table>
	<tr>
	<td><label>Enter Subject Code</label></td>
	<td><input type="text" name="sc" required></td>
	</tr>
	<td><label>Enter Date</label></td>
	<td><input type="date" name="d" required></td>
	</tr>
	<tr>
	<td><input type="submit" name="submit1"></td>
	<td><input type="reset"></td>
	</tr>
	</table><br><br>
	</form></center>
	</div>
	
	<?php
	if(isset($_POST['submit1'])){
		$code=$_POST['sc'];
		$d=$_POST['d'];
	$sql = "SELECT * FROM attendance WHERE subjectCode='$code' and date='$d'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die("query cannot proceed");
	}
	$rows = mysqli_num_rows($result);
	?>

	<table cellpadding=15 cellspacing=10 style="border-collapse : collapse;background-color: white;" border="2px">
		<tr style="background-color : grey; color :white">
			<th>S.no.</th>
			<th>Date</th>
			<th>Student Name</th>
			<th>Student id</th>
			<th>Subject Code</th>
			<th>Status</th>
		</tr>
<?php
	if ($rows> 0) {
		$t=0;
		while($row = mysqli_fetch_assoc($result))
		{
			$t++;
			?>
		<tr>
			<td><?php echo $t?></td>
			<td><?php echo $row['date']?></td>
			<td><?php echo $row['studentName']?></td>
			<td><?php echo $row['studentuid']?></td>
			<td><?php echo $row['subjectCode']?></td>
			<td><?php $temps   = $row['attendanceStatus'];
					if($temps=='p')
					{
						echo "<div style='background-color : lightgreen;padding-right : 10px;padding-left : 10px;'><p>Present</p></div>";
					}
					else{
						echo "<div style='background-color : #ff4d4d;padding-right : 10px;padding-left : 10px;'><p>Absent</p></div>";
					}?></td>
		</tr>
</html>
<?php
		}
		?>
	
		</table>
		</body>'
		<?php 
	}
	else
	{
		echo "<script>alert('No data found');</script>";
	}}
?>