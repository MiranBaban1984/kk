<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<p><div><img src="journal_bannar2.png" width="642" height="150" alt=""/></div></p>
<?php
include("connection.php"); 
	
	if(isset($_POST['submit'])&(isset($conn))){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$organization=$_POST['organization'];
		$academic=$_POST['title'];
		$degree=$_POST['degree'];
		$speciality=$_POST['professionality'];
		
		echo("<p><h2>Thanks for Registeration. You have been registered Successfully</h2></p>");
		echo("<p><a href='#'>Please Click here to submit your article</a></p>");
		echo("<p><hr/></p>");
		echo("<p><strong>Your First Name is:</strong> "."  ".$firstname."</p>");
		echo("<p><strong>Your Last Name is:</strong> "."  ".$lastname."</p>");
		echo("<p><strong>Your Email Address is:</strong> "."  ".$email."</p>");
		echo("<p><strong>Your Mobile No. is:</strong> "."  ".$mobile."</p>");
		echo("<p><strong>Your Organization is:</strong> "."  ".$organization."</p>");
		echo("<p><strong>Your Academic Title is:</strong> "."  ".$academic."</p>");
		echo("<p><strong>Your Academic Degree is:</strong> "."  ".$degree."</p>");
		echo("<p><strong>Your Professionality is:</strong> "."  ".$speciality."</p>");
		$sql="Insert into test1(FirstName,LastName,Email,Mobile,Organization,AcademicTitle,AcademicDegree,Professionality) values('$firstname','$lastname','$email','$mobile','$organization','$academic','$degree','$speciality')";
		echo($sql."<br/>");
		$result=mysqli_query($conn,$sql) or (die(mysqli_error($conn)));
		}
?>
</body>
</html>