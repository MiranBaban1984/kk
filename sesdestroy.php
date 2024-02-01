<?php
if( isset($_SESSION['a']) )
unset($_SESSION);
session_destroy();
header("location:index.php");
?>