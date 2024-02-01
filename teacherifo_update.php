 <div align="right">
<?php
	if(isset($_SESSION['a'])){
	echo "<p> <h3>Your login with ".$_SESSION['a']."<h3> </p>";
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
$d=md5($_POST['TeacherPassword']);
$_SESSION['a']=$b;
$_SESSION['TeacherName']=$a;

$update="UPDATE teacherinfo SET TeacherName="."'".$a."',
TeacherEmail="."'".$b."',
TeacherMobile="."'".$c."',
TeacherPassword="."'".$d."'"." where Teacher_ID="."'".$id."'"; 
$result=mysqli_query($conn,$update) or die(mysqli_error($conn));


$updateJournal="UPDATE journals SET MainAuthor="."'".$a."'"."where Teacher_ID=(SELECT ti.Teacher_ID from teacherinfo ti 
where ti.TeacherEmail="."'".$b."'".")";
$result=mysqli_query($conn,$updateJournal) or die(mysqli_error($conn));

$updateConference="UPDATE conference SET MainAuthor="."'".$a."'"."where Teacher_ID=(SELECT ti.Teacher_ID from teacherinfo ti 
where ti.TeacherEmail="."'".$b."'".")";
$result=mysqli_query($conn,$updateConference) or die(mysqli_error($conn));

$updateBook="UPDATE books SET MainAuthor="."'".$a."'"."where Teacher_ID=(SELECT ti.Teacher_ID from teacherinfo ti 
where ti.TeacherEmail="."'".$b."'".")";
$result=mysqli_query($conn,$updateBook) or die(mysqli_error($conn));

$updateInters="UPDATE inters SET MainAuthor="."'".$a."'"."where Teacher_ID=(SELECT ti.Teacher_ID from teacherinfo ti 
where ti.TeacherEmail="."'".$b."'".")";
$result=mysqli_query($conn,$updateInters) or die(mysqli_error($conn));


?>
