<?php
include("connection.php");
$id=$_POST['id'];
$delete = "DELETE FROM conference WHERE ConferenceID=$id";
$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>