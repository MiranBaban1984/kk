<?php  
//export.php  
include("connection.php"); 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM inters j, checkerinfo c where j.CheckerID=c.CheckerID and c.CheckerEmail="."'".$_SESSION['b']."'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="3">  
                    <tr>  
                    <th>Main Author</th>
                    <th>Author Place</th>
                    <th>Title</th>
                    <th>publisher</th>
                    <th>Registeration Date</th>
                    <th>Ethical Date</th>
                    <th>Ethical Number</th>
                    <th>Journal</th>
                    <th>Year</th>
                    <th>IF</th>
                    <th>Vol.</th>
                    <th>Issue</th>
                    <th>Pages</th>
                    <th>Country</th>
                    <th>DOI</th>
                    <th>Publication Link</th>
                    <th>Paper Type</th>
                    <th>indexing</th>
                    <th>Keywords</th>
        

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["MainAuthor"].'</td>
    <td>'.$row["TeacherName"].'</td> 
    <td>'.$row["ResearchTitle"].'</td> 
    <td>'.$row["Publisher"].'</td>
    <td>'.$row["RegisterationDate"].'</td>
    <td>'.$row["ApprovalDate"].'</td>
    <td>'.$row["EthicalNumber"].'</td>
    <td>'.$row["JournalName"].'</td>
    <td>'.$row["PublishingYear"].'</td>
    <td>'.$row["Impactfactor"].'</td>
    <td>'.$row["Volume"].'</td>
    <td>'.$row["Issue"].'</td>
    <td>'.$row["Pages"].'</td>
    <td>'.$row["place"].'</td>
    <td>'.$row["DOI"].'</td>
    <td>'.$row["Weblink"].'</td>
    <td>'.$row["PaperType"].'</td>
    <td>'.$row["indexing"].'</td>
    <td>'.$row["Keyword"].'</td>

 </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=International_Journal_Excel.xls');
  echo $output;
 }
}
?>