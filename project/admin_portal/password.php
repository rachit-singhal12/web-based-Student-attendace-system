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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		fieldset {
	align: center;
	  background-color: lightblue;
}
legend {
			background-color: blue;
			color: white;
			padding-top : 5px;
			padding-left: 12px;
			padding-right : 12px;
			padding-bottom :5px ;
			font-size : 30px;
}
input {
	margin-top : 10px;
	padding-left : 30px;
	padding-top : 5px;
	padding-bottom : 5px;
}
	button{
		font-size: 15px;
		padding : 4px;
		padding-left : 10px;
		padding-right: 10px;
		background-color : blue;
		color : white;
	}
	</style>
</head>
    <body>
              <fieldset>
	<legend>PASSWORD</legend>
	<form style="font-size : 20px;" action="" method="post">
                  <table>
                      
                      <tr>
                        <td> New Password</td>
                        <td><input type="password" name="newpass"></td>
                      </tr>
                      <tr>
                        <td> Confirm Password</td>
                        <td><input type="password" name="repass"></td>
                      </tr>
                      <tr>
                        <td><input type="submit" style="padding : 4px;background-color : blue; color: white;" name="buttons" value="CHANGE PASSWORD">
                        </td>
                    </tr>
                  </table>
    </form>
    </fieldset>
    </html>
<?php
if(isset($_POST['buttons'])){
	
	$np = $_POST['newpass'];
	$rp = $_POST['repass'];
	if($np==$rp){	
	$sql = "UPDATE login_table SET PASS='$np' WHERE UID='$uid'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die("query cannot proceed");
	}
	else{echo '<script>alert("Password changed successfully")</script>';}
	}
else{
echo '<script>alert("Please input password properly")</script>';}
}
?>