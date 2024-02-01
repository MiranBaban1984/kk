<div align="right">
<?php
	if(isset($_SESSION['admins'])){
	echo "<p> <h3>Your login with ".$_SESSION['admins']."<h3> </p>";
		}
?>
     
     <p><a href='sesdestroy.php'>logout</a></p>
     </div>
<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"scientificcommunity");
$id=$_POST['id'];
$delete = "DELETE FROM uploadfiles WHERE FileID="."'".$id."'";
$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>