<?php  
//export.php  
include("connection.php"); 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM teacher j, checkerinfo c, teacherinfo t 
 where j.CheckerID=c.CheckerID and 
 t.Teacher_ID=j.Teacher_ID and 
 c.CheckerEmail="."'".$_SESSION['b']."'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                          
                         <th>FullName</th>  
                         <th>Email</th>  
						 <th>Mobile</th>  
						 <th>Certificate</th>  
						 <th>AcademicTitle</th>
						 <th>Department</th>
						 <th>Speciality</th>
						 <th>NumberofResearch</th>
						 <th>DateofLastTitle</th>
						 <th>DiplomaTitle</th>
						 <th>MasterTitle</th>
						 <th>PHDTitle</th>
						 <th>NumberofMasterStudent</th>
						 <th>NumberofPHD</th>
						 <th>NumberofDiploma</th>
                               <th>googlescholar</th>
                               <th>ORCID</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
      
                         <td>'.$row["TeaherName"].'</td>  
                         <td>'.$row["TeacherEmail"].'</td>  
       <td>'.$row["Mobile"].'</td>  
       <td>'.$row["Certificate"].'</td>
	   <td>'.$row["AcademicTitle"].'</td>
	   <td>'.$row["Department"].'</td>
	   <td>'.$row["Speciality"].'</td>
	   <td>'.$row["NumberofResearch"].'</td>
	   <td>'.$row["DateofLastTitle"].'</td>
	   <td>'.$row["DiplomaTitle"].'</td>
	   <td>'.$row["MasterTitle"].'</td>
	   <td>'.$row["PHDTitle"].'</td>
	   <td>'.$row["NumberofMasterStudent"].'</td>
	   <td>'.$row["NumberofPHD"].'</td>
	   <td>'.$row["NumberofDiploma"].'</td>
        <td>'.$row["GoogleScholar"].'</td>
	   <td>'.$row["ORCID"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Teacher_Excel.xls');
  echo $output;
 }
}
?>