<?php
include('../additional_php_files/connection.php');
session_start();

$uid = $_SESSION["id"];

if($uid == true)
{
	
}
else
{
	header("location: http://localhost/project/admin_login_page/admin_login.php");
}
?>
<?php
$ids=$_GET['id'];

	$sql = "DELETE FROM student WHERE UID='$ids';";
$sql .="DELETE FROM login_table WHERE UID='$ids'";
$result = mysqli_multi_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}else{
	echo '<script>alert("Record deleted successfully")</script>';}
?>
<html>
<body>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>