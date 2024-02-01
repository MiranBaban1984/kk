<?php
$conn=mysqli_connect("defwebapp-server.mysql.database.azure.com","bvgwgmsnqr","VEHI3225LIJNR5X8$");
$db=mysqli_select_db($conn,"defwebapp-database");
if($conn)
{
echo"";
}

else{
	
	echo "Connection Problem!! Check your connection!!";
}
?>
