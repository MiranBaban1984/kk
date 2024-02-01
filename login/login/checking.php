<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Title School</title>
</head>

<body>
	<?php
	$user=$_POST['username'];
	$pass=$_POST['pass'];
	
	if($user='sarhang' and $pass='sarhang'){
				header("Location:../../SchoolofDentistry/");
	}
	
	else{
		
	header("Location:index.php");
	}
	
	
	?>
	
	
	
	
	
</body>
</html>