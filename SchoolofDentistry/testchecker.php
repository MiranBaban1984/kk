<?php
include("../connection.php");

if(isset($_POST['login'])){

if(isset($_POST['email']) && isset($_POST['password']) ){
	
	$user=$_POST['email'];
	$pass=$_POST['password'];
}

else{
	$a="Please Enter Username and Password Dont leave any Empty Field";
		header('Location:checkerlogin.php?a='.$a);
}

	$sql_login="Select * from checkerinfo where CheckerEmail="."'".$user."' and 
	CheckerPassword="."'".$pass."'";
	echo $sql_login;
	$result_login=mysqli_query($conn,$sql_login);
	$row_login=mysqli_num_rows($result_login);

	$row11=mysqli_fetch_array($result_login);
	
	
	if($row_login>0){
		$_SESSION['b']=$user;
		$_SESSION['checker']=$row11[1];
		header('Location:checkerpage.php');
	}
	


else{
	$c="<font color='red'>Please Enter Username and Password Correctly</font>";
		header('Location:checkerlogin.php?c='.$c);
}
}


else{
	echo "You havent Loged in into the system yet";
}


?>
