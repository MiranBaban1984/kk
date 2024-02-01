<?php  
//export.php  
include("connection.php"); 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM books j, checkerinfo c where j.CheckerID=c.CheckerID and c.CheckerEmail="."'".$_SESSION['b']."'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>Main Author</th>
                    <th>Book Title</th>
                    <th>Author Place</th>
                    <th>Date of Publication</th>
                    <th>Publication Organization</th>
                    <th>Publication Place</th>
                    <th>ISBN</th>
                    <th>DOI</th>
                    <th>Weblink</th>
                    <th>Book Type</th>
                   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["MainAuthor"].'</td>  
                         <td>'.$row["BookTitle"].'</td>  
                         <td>'.$row["CoAuthor"].'</td>  
       <td>'.$row["PublishYear"].'</td>  
       <td>'.$row["Place"].'</td>
	   <td>'.$row["Publisher"].'</td>
	   <td>'.$row["ISBN"].'</td>
	   <td>'.$row["DOI"].'</td>
	   <td>'.$row["WebLink"].'</td>
        <td>'.$row["BookType"].'</td>

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