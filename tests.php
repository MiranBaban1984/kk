	<?php
	$b="";
	$a="aaaaa,bbbbbb,cc,";
	for($i=0;$i<strlen($a);$i++){
		if($a[$i]!=","){
			echo "i= ".$i."   a= ".$a[$i]. "<br>";
			
			$b.=$a[$i];
			
			echo "<br>";
			
		}
		
		else
			
		{
		echo "b= ".$b."<br>";
			$b=" ";
			
		}
		
	}
	
	?>