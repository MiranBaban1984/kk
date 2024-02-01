<?php  
//export.php 
 
include("connection.php"); 
$output = '';

if(isset($_POST["export"]))
{
 $query = "SELECT * FROM conference j, checkerinfo c where j.CheckerID=c.CheckerID and c.CheckerEmail="."'".$_SESSION['b']."'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>Main Author</th>
                    <th>Authour Place</th>
                    <th>Paper title</th>
                    <th>Publisher</th>
                    <th>Conefernce Name</th>
                    <th>Place</th>
                    <th>Web-Link</th>
                    <th>Year</th>
                    <th>DOI</th>
                    <th>Venue</th>
                    <th>Attendance</th>
                   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["MainAuthor"].'</td>  
                         <td>'.$row["CoAuthor"].'</td> 
                         <td>'.$row["ResearchTitle"].'</td>  
                          
       <td>'.$row["ConferenceOrganizer"].'</td>  
       <td>'.$row["ConferenceName"].'</td>
	   <td>'.$row["ConferenceLocation"].'</td>
	
	   <td>'.$row["WebLink"].'</td>
	   <td>'.$row["PublishYear"].'</td>
	   <td>'.$row["DOI"].'</td>
        <td>'.$row["Venue"].'</td>
        <td>'.$row["ConfType"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Conference_Excel.xls');
  echo $output;
 }
}
?>