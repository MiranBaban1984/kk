<div align="right">
<?php
	if(isset($_SESSION['b'])){
	echo "<p> <h3>Your login with ".$_SESSION['b']."<h3> </p>";
		}
?>
     
     <p><a href='sesdestroy.php'>logout</a></p>
     </div>
<?php
include("connection.php");
$id=$_POST['id'];
$a=$_POST['FullName'];
$b=$_POST['Email'];
$c=$_POST['Mobile'];
$d=md5($_POST['CheckerPassword']);
$_SESSION['b']=$b;
$_SESSION['checker']=$a;
$update="UPDATE checkerinfo SET CheckerName="."'".$a."',
CheckerEmail="."'".$b."',
CheckerMobile="."'".$c."',
CheckerPassword="."'".$d."'"." where CheckerID="."'".$id."'"; 
$result=mysqli_query($conn,$update) or die(mysqli_error($conn));
?>
