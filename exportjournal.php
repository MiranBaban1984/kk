<?php  
//export.php  
include("connection.php"); 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM books";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>BookID</th>  
                         <th>BookTitle</th>  
                         <th>CoAuthor</th>  
						 <th>PublishYear</th>  
						 <th>Place</th>  
						 <th>Publisher</th>
						 <th>ISBN</th>
						 <th>DOI</th>
						 <th>WebLink</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["BookID"].'</td>  
                         <td>'.$row["BookTitle"].'</td>  
                         <td>'.$row["CoAuthor"].'</td>  
       <td>'.$row["PublishYear"].'</td>  
       <td>'.$row["Place"].'</td>
	   <td>'.$row["Publisher"].'</td>
	   <td>'.$row["ISBN"].'</td>
	   <td>'.$row["DOI"].'</td>
	   <td>'.$row["WebLink"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Book_Excel.xls');
  echo $output;
 }
}
?>