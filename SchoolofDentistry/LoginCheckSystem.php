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
		header('Location:Logs/Login_v10/index.php?a='.$a);
}


if(($user=="admin123") && ($pass=="MIRAN")){
	header('Location:index.php');
}

else{
	$c="<font color='red'>Please Enter Username and Password Correctly</font>";
		header('Location:Logs/Login_v10/index.php?c='.$c);
}
}





else{
	echo "aaa";
}


?>

</body>
</html>