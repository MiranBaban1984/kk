<?php
include("../connection.php"); 

if(isset($_POST['zz1'])){

if(isset($_POST['email']) && isset($_POST['password']) ){
	
	$user=$_POST['email'];
	$pass=md5($_POST['password']);
}

else{
	$a="Please Enter Username and Password Dont leave any Empty Field";
		header('Location:indexs.php?a='.$a);
}

	$sql_login="Select * from teacherinfo where TeacherEmail="."'".$user."' and 
	TeacherPassword="."'".$pass."'";
	echo $sql_login;
	$result_login=mysqli_query($conn,$sql_login);
	$row_login=mysqli_num_rows($result_login);
	
	if($row_login>0){
		$_SESSION['a']=$user;

		while($row=mysqli_fetch_array($result_login)){

			$_SESSION['TeacherName']=$row['TeacherName'];
			$Names=$_SESSION['TeacherName'];

		}


		$sqlTeacherLogin="Select t.TeacherID from teacher t, teacherinfo ti where ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."'";
		$result111 = mysqli_query($conn, $sqlTeacherLogin) or die(mysqli_error($conn));
	  
	  if (mysqli_num_rows($result111) > 0) {
		header('Location:index11.php');
	  }
	  
	  else{
		header('Location:../teacheracad.php');
	  }

		
	}
	
	

//if(($user=="dfdfdfdf@hotmail.com") && ($pass=="MIRAN")){
//	$_SESSION['a']=$user;
//	header('Location:index11.php?a='.$user.'& b='.$pass);
//}

else{
echo $_SESSION['TeacherName'];

	$c="<font color='red'>Please Enter Username and Password Correctly</font>";
		header('Location:indexs.php?c='.$c);
}
}


else{
	echo "You havent Loged in into the system yet";
}

?>
