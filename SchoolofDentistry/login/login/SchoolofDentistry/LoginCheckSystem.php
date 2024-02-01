<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LoginTest</title>
</head>
<body>
<?php

if(isset($_POST['submit_exam'])){

if(isset($_POST['username']) && isset($_POST['password']) ){
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
}

else{
	$a="Please Enter Username and Password Dont Miss any Empty Field";
		header('Location:http://localhost/SchoolofDentistry/Exams/index.php?a='.$a);
}


if(($user=="admin123") && ($pass=="MIRAN")){
	$b="Login sucessfully";
	header('Location:http://localhost/SchoolofDentistry/Exams/index.php?b='.$b);
}

else{
	$c="<font color=red>Please Enter Username and Password Correctly</font>";
		header('Location:http://localhost/SchoolofDentistry/Exams/index.php?c='.$c);
}
}



else if(isset($_POST['submit_register'])){

if(isset($_POST['username']) && isset($_POST['password']) ){
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
}

else{
	$a="Please Enter Username and Password Dont Miss any Empty Field";
	header('Location:http://localhost/SchoolofDentistry/Register/index.php?a='.$a);
}


if(($user=="admin123") && ($pass=="MIRAN")){
	$b="Login sucessfully";
	header('Location:http://localhost/SchoolofDentistry/Register/index.php?b='.$b);
}

else{
	$c="<font color=red>Please Enter Username and Password Correctly</font>";
	header('Location:http://localhost/SchoolofDentistry/Register/index.php?c='.$c);
}
}

else{
	echo "aaa";
}


?>

</body>
</html>