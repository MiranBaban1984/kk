<?php
include("connection.php");
$id=$_POST['id'];
$delete = "DELETE FROM inters WHERE JournalID=$id";
$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>