<?php
include("connection.php");

if(isset($_POST['login'])){

if(isset($_POST['email']) && isset($_POST['password']) ){
	
	$user=$_POST['email'];
	$pass=$_POST['password'];
}

else{
	$a="Please Enter Username and Password Dont leave any Empty Field";
		header('Location:AdminLogin.php?a='.$a);
}


	
	
	if(($_POST['email']=="admin123@admin.com") && ($_POST['password']=="123456789")){
		$_SESSION['admins']=$user;
		header('Location:adminpage.php');
	}
	


else{
	$c="<font color='red'>Please Enter Username and Password Correctly</font>";
		header('Location:AdminLogin.php?c='.$c);
}
}


else{
	echo "You havent Loged in into the system yet";
}


?>
