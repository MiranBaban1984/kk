<?php
include("connection.php");
$id=$_POST['id'];
$delete = "DELETE FROM journals WHERE JournalID=$id";
$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>