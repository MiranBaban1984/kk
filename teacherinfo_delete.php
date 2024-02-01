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
$delete = "DELETE FROM teacherinfo WHERE Teacher_ID=".$id;
$result = mysqli_query($conn,$delete) or die(mysqli_error());
echo $delete;
?>