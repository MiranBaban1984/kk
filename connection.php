<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"scientificcommunity");
if($conn)
{
echo"";
}

else{
	
	echo "Connection Problem!! Check your connection!!";
}
?>