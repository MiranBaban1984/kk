<?php
if(isset($_SESSION['a']) ){
unset($_SESSION['a']);
session_destroy();
header("location:../index.php");
}
else{
unset($_SESSION['b']);
session_destroy();
header("location:../index.php");
}
?>