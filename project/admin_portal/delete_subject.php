<?php
include('../additional_php_files/connection.php');
session_start();

$uid = $_SESSION["id"];

if($uid == true)
{}
else
{
	header("location: http://localhost/project/admin_login_page/admin_login.php");
}
?>
<?php
$code=$_GET['code'];

	$sql = "DELETE FROM subject WHERE subjectCode='$code';";
$result = mysqli_query($conn, $sql);
if(!$result){
	die("query cannot proceed");
}else{echo '<script>alert("Record deleted successfully")</script>';}
?>
<html>
<body>
<br>
<center><table style="border-collapse : collapse;" border="2px" cellspacing="5"><tr><td>Please reload/refesh this page</td></tr></table></center><br><br>
</body>
</html>