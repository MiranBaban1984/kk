<?php
include("connection.php"); 
$id=$_POST['id'];
$delete = "DELETE FROM teacher WHERE TeacherID="."'".$id."'";
$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>