<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		E-attendance
	</title>
	<link rel="stylesheet" href="style.css">
	  <link rel="icon" type="image/x-icon" href="image/favicon.ico">
</head>
<body>
	<div class="head" id="head_top">
		<img src="image/leftlogo.png" alt="Left logo"  class="llogo">
		<img src="image/rightlogo.png" alt="Right logo"  class="rlogo" >
		<div class="main_content">
		<div class="nav_bar">
			<a href="#head_top" >Home</a>
			<a href="#table_ids">LogIn</a>
			<a href="http://localhost/project/admin_login_page/admin_login.php">Admin</a>
			
			<div class="dropdown">
				<button  class="reg">Registration</button>
				<div class="dropdown-content">
				<a href="http://localhost/project/teacher_registration/teacher.php" style="font-size:15px;"  >As Faculty</a>
				<a href="http://localhost/project/student_registration/student.php" style="font-size:15px;" >As Student</a>
				</div>
			  </div>
			<a href="#contact_heading_id">Contact Us</a>
			<a href="#class_about_id">About Us</a>
		</div>
		<link href="http://fonts.cdnfonts.com/css/callie-chalk-font" rel="stylesheet">
		<h3 class="h2"><b>Welcome To </h3>
		<h1 class="h1">E-Attendance</h1> 
		<h3 class="h3">Portal</b></h3>
		</div>
	</div>
	<div id="table_ids"  style="padding-top : 20px;">
		<section class="Main" >
		<table class="main" align="center"cellpadding=10 style="background-color : white">
		<tr><td colspan=2>
		<section align="center" width= "100px" >
			<img id="topimage" src="image/ap.jpg" alt="Image not loaded yet" width ="300px" height="auto">
		</section>
		</td></tr>
		<tr>
		<td colspan=2>
		
		<tr>
			<td>
			    <table id="mid_table1" cellpadding=7>
			        <tr>	
			            <td>
				            <table class="inner_table" cellpadding=4 style="padding-left:5px;">
			                <form action="" method="post">
				            <tr align="justify" cellpadding=0>
				                <td colspan=2 ><p id="heading1"><strong>Student Login</strong></p></td>
				            </tr>
				            <tr align="left">
				    	        <td><lable for="student_id">Login Id</lable></td>
			    		        <td><input type="text" name="username"></td>
			           	            </tr>
			        	            <tr align="left">
				    	        <td><lable for="student_password">Password</lable></td>
				    	        <td><input type="password" name="password"></td>
			            	            </tr>
				            <tr align="left">
				            	<td><input class="lb1" type="submit" value="LogIn" name="studentlogin"></input></td>
					<td><input class="lb1" type="reset" value="Reset"></input></td>
				            </tr>
			                </form>
							<?php 
include('../additional_php_files/connection.php');
session_start();
if(isset($_POST['studentlogin']))
{
	$user =$_POST['username'];
	$pass = $_POST['password'];
	
	$query= "SELECT * FROM student WHERE UID='$user' AND Password='$pass'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row == 0) {
		echo '<script>alert("Wrong Userid and Password")</script>';

  		}
 	else {
			
		$_SESSION['stuid'] = $user;
  		header("Location: http://localhost/project/student_portal/student_portal.php");
	}
	
}

?>
			            </table>
		            	</td>
		        </tr>
		        <tr style="padding-left:5px;">
		            <td>
			            <table class="innertable" cellpadding=8>
				            <tr>
					            <td><img src="image/student2.png" alt="Loaded" type="icon" height="60vw" width="60vw"></td>
					            <td align="justify"><p id="formcaption1"><strong>Student login with username &<br> password and view reports.</strong></p></td>
				            </tr>
			            </table>
		            </td>
		        </tr>
		</table></td>
		<td rowspan=2 >
			<div><img src="image/bg.webp" alt="Image is not loaded yet" height="375px" width="630px" ></div>
			<div><img src="image/at..jpg" alt="Image is not in tour system" height="200px" width="630px"></div>
		</td>
		</tr>
		<tr>
		<td>
		    <table id="mid_table2" cellpadding=5  style="padding-left:5px;">
		        <tr>
		            <td>
			            <table class="inner_table" cellpadding=4 align="left">
			                <form action="" method="post">
				         <tr align="left">
				                <td colspan=2><p id="heading2"><strong>Faculty Login</strong></p></td>
				            </tr>
				            <tr align="left">
				    	        <td><lable for="faculty_id">Login Id</lable></td>
			    		        <td><input type="text" name="username"></td>
			           	    </tr>
			        	    <tr align="left">
				    	        <td><lable for="faculty_password">Password</lable></td>
				    	        <td><input type="password" name="password"></td>
			            	</tr>
				            <tr align="left">
				            	<td><input type="submit" value="LogIn" name="teacherlogin"></td>
								<td><input type="reset"</td>
				            </tr>
			                </form>
							<?php

if(isset($_POST['teacherlogin']))
{
	$user =$_POST['username'];
	$pass = $_POST['password'];
	
	$query= "SELECT * FROM teacher WHERE UID='$user' AND Password='$pass'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row == 0) {
		echo '<script>alert("Wrong Userid and Password")</script>';
		
  		}
	else {
		session_start();
		$_SESSION['teacid'] = $user;
		echo '<script>window.location.href="http://localhost/project/faculty_portal/staff_home_page.php";</script>';
	}
	
}

?>
			            </table>
		            </td>
		        </tr>
		        <tr>
		            <td>
			            <table class="innertable" cellpadding=8>
				            <tr>
					            <td><img src="image/teacher.png" alt="Loaded" type="icon" height="70vw" width="70vw"></td>
					            <td align="left"><p id="formcaption2"><strong>Faculty can make attendance..<br> of students and generate<br> reports after login to system.</strong></p></td>
				            </tr>
			            </table>
		            </td>
		        </tr>
		</table></td>
		</tr>
		</table><br><br>
		</section>
	</div>
	</div>
	<div align="center" id="contact_heading_id">
	<div class="contact_heading">
		<h1 style="color:brown">We'd love to hear from you</h1>
		<p>Whether you have a questions about features, trials, or anything else, our team is ready to<br> answer all your questions.<br></p>
	</div>
	
	
	<div class="contact_form" style="padding-top:12px;">
		<form action="" method="post">
		<table style=" padding-top:12px;">
			
			<tr><td  class="contact_left">
			<lable>FIRST NAME</lable>
			</td><td>
			<input type="text" name="fname" required class="i1">
			</td>
				<td align="right" rowspan=8 class="heading"><img src="image/contactus.png" alt="Image is not loaded yet" height="200px" width="200px" style="padding-top: 0px;"></td>
			
			</tr>
			<tr><td  class="contact_left">
			<lable>LAST NAME</lable>
			</td><td>
			<input type="text" required class="i2" name="lname">
			</td></tr>
			<tr><td  class="contact_left">
			<lable>EMAIL</lable>
			</td><td>
			<input type="email" required class="i3"  name="email">
			</td></tr>
			<tr><td  class="contact_left">
			<lable>MESSAGE</lable>
			</td><td>
			<input type="text" required class="i4" name="message">
			</td></tr>
			<tr><td  class="contact_left">
			<lable>ADDITIONAL DETAILS</lable>
			</td><td>
			<input type="text" required class="i5" name="add">
			</td></tr>
			<tr><td colspan=2  align="center">
			<input value="submit" type="submit" class="buttons" name="submit">
			</td>
			
			</table>
		</form>
		<?php 
include('../additional_php_files/connection.php');
	if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$message = $_POST['message'];
	$add_info = $_POST['add'];
	$email = $_POST['email'];
	
	if($fname != "" && $lname != "" && $email != "" && $message != "")
	{
		$query ="INSERT INTO `user_comment`(`FirstName`, `LastName`, `Email`, `Message`, `Add_details`) VALUES('$fname','$lname','$email','$message','$add_info')";
		$data = mysqli_query($conn,$query);
		if($data)
		{
	
			echo '<script>alert("Comment submitted successfully")</script>';
		
		}
		else
		{echo '<script>alert("Failed to send Comment")</script>';}
	}
	else
	{
		echo '<script>alert("Fill all fields")</script>';
	}
}
	
?>
	</div>
	</div>
<div height="10000px">
	<div class="class_about" id="class_about_id">
	<div  class="about_us" style="background-image:url('image/bg.jpg');" >
	<br>
	<h1 align="center" 
	style="
	 font-size: 40px;
	 font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">About Us</h1>
	 
	 
	<div  style="padding-right : 70px;padding-left : 70px; ">
	<p style="margin-left: 2%; 
	font-family:Bahnschrift Light;
	
	 margin-top:0px; 
	 margin-bottom: 0px;
	 margin-right:2%;
	 font-size:20px;"  align="center">
	 Our mission is to turn the internet into a conversation.Teamwork is the working together of a group of people to accomplish a certain goal.
	 Teamwork enlists a level ofenthusiasm in a person. Moreover it essential to save time, as groups of people work on specific tasks.
	 </p>
	 </div>	
	<div align="center" style="padding-top : 40px; " class="about_us_img" >
		<a href=""><img src="image/nidhi.png" alt="Nidhi Verma" width="200px" height="220px"></a>
		<a href=""><img src="image/rachit.png" alt="Rachit Singhal" width="200px" height="220px"></a>
		<a href=""><img src="image/maina.png" alt="Maina Sharma" width="200px" height="220px"></a>
	</div>
	
	<br><br>
	</div>
	</div>
</div>	
	<div class="last_content" align="center">
	<br><br>
	<table class="table_row" width="80%" cellpadding=10 cellspacing=6>
		<tr>
			<th class="first_row" align="left"><b>FEATURES</b></th>
			<th class="first_row" align="left"><b>BENEFITS</b></th>
			<th class="first_row" align="left"><b>PAGES</b></th>
			<th class="first_row" align="left"><b>ABOUT MY WEB BASED STUDENT ATTENDANCE MANAGEMENT SYSTEM</b></th>
		</tr>
		<tr>
			<td class="second_row" width="20%">
				<p>Fast and Easy Attendance Entry</p>
				<p>Student Class and Grade Dashboards</p>
				<p>Teacher Parent Messaging System</p>
				<p>Customizable Attendance Reporting</p>
				<p>Simple Data Export</p>
			</td>
			<td class="second_row" width="20%">
				<p>Track Attendance From Anywhere</p>
				<p>Perfect For Any Class Or Group</p>
				<p>Great Import And Export Tools</p>
				<p>Priced Right (It's FREE!)</p>
			</td>
			<td class="second_row" width="20%">
				<p>Register</p>
				<p>Login</p>
				<p>Features</p>
				<p>Contact</p>
			</td>
			<td class="second_row">		
				<p>Our mission is to turn the internet into a conversation
					Teamwork is the working together of a group of people to accomplish a certain goal. Teamwork enlists a level
				of enthusiasm in a person. Moreover it essential to save time, as groups of people work on specific tasks.</p>
			</td>
		</tr>
	</table><br>
	</div>
</body>
</html>