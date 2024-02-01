<?php
if(isset($_SESSION['a']))
{
include("connection.php");

?>
<html>
<head>
<title>Teacher Details Form Insertion</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*,
*:before,
*:after {
   box-sizing: border-box;
}
form {
  border: 1px solid #c6c7cc;
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  overflow: hidden;
  width: 500px;
align-self: center
}
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}
input {
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0;
}
	
.account-info {
  padding: 20px 20px 0 20px;
}
.account-info label {
  color: #395870;
  display: block;
  font-weight: bold;
  margin-bottom: 20px;
}
.account-info input {
  background: #fff;
  border: 1px solid #c6c7cc;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
  color: #636466;
  padding: 6px;
  margin-top: 6px;
  width: 100%;
}
.account-action {
  background: #f0f0f2;
  border-top: 1px solid #c6c7cc;
  padding: 20px;
}
.account-action .btn {
	background: linear-gradient(#49708f, #293f50);
	border: 0;
	color: #fff;
	cursor: pointer;
	font-weight: bold;
	float: left;
	padding: 8px 16px;
	font-size: 14px;
}
.account-action label {
  color: #7c7c80;
  font-size: 12px;
  float: left;
  margin: 10px 0 0 20px;
}	
	
	body { background-color:#fafafa;}
.container { margin:10px auto; font-family:'Roboto';}
table { margin:10px 0;}

.limitedNumbChosen, .limitedNumbSelect2{
  width: 900px;
}
</style>
    
     <body>

      <div align="left">
      
      <table>
	<tr valign="top">
	<p id="ss1" class="ss1">
		<td class="selection" id="selection">
      
      <p id="msg"></p> 
		</td>
     <td valign="top">
      <div id="div1">
       <table>
        <tr>
                <td>
                  <input id="pglmt" placeholder="Page Limit" title="Page Limit" value="10" class="form-control">
                </td>
                <td>
                    <button id="btnApply" class="btn btn-danger">Apply</button>
                </td>
    </tr>
  </table>
             
<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            
               <?php
		   if(!isset($_POST['dd'])){

		       ?>
               <thead>
                <tr id="lefts">
                    <th>Last Certificate</th>
                    <th>Academic Title</th>
                    <th>Department Staff</th>
                    <th>Speciality</th>
                    <th>Last Title</th>
                    <th>Diploma Title</th>
                    <th>Master Title</th>
                    <th>PhD Title</th>
                    <th>Diploma Students</th>
                    <th>Master Students</th>
                    <th>PhD Students</th>
                    <th>googlescholar</th>
                    <th>ORCID</th>
                    <th>CV File</th>
                    <th>Promotion</th>
              </tr>
            </thead>
            <?php
		   }
		   ?>
           
                                 <?php
		   if(isset($_POST['dd'])){

		       ?>
                      
                       <thead>
                <tr id="lefts">
                    <th>FullName</th>
                    <th>Email Address</th>
                    <th>Mobile Number</th>
                    <th>Last Certificate</th>
                    <th>Academic Title</th>
                    <th>Department Staff</th>
                    <th>Speciality</th>
               
                    <th>Last Title</th>
                    <th>Diploma Title</th>
                    <th>Master Title</th>
                    <th>PhD Title</th>
                    <th>Diploma Students</th>
                    <th>Master Students</th>
                    <th>PhD Students</th>
                    <th>googlescholar</th>
                    <th>ORCID</th>
                    <th>CV File</th>
                    <th>Promotion</th>
              </tr>
            </thead>
            
            <?php
		   }
	?>
            
            
            
<?php

if(isset($_POST['done'])){
$sql333="Select Teacher_ID from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result333=mysqli_query($conn,$sql333) or die(mysqli_error($conn));
$row333=mysqli_fetch_array($result333);

$sql222="Select ch.CheckerID from checkerinfo ch,teacherinfo ti where ch.Department='$_POST[department]' 
and ti.TeacherEmail="."'".$_SESSION['a']."'";
$result222=mysqli_query($conn,$sql222) or die(mysqli_error($conn));
$row222=mysqli_fetch_array($result222);	

$files1=$_FILES['Lastfile22'];
$filename1=$_FILES['Lastfile22']['name'];
$fileerror1=$_FILES['Lastfile22']['error'];
$filesize1=$_FILES['Lastfile22']['size'];
$filetmp1=$_FILES['Lastfile22']['tmp_name'];
$fileext1=explode(".",$filename1);
$fileextactual1=strtolower(end($fileext1));
$allowed1=array('pdf');

if(in_array($fileextactual1,$allowed1)){
 

  if($fileerror1===0){
  
    if($filesize1 < (11*1024*1024)){
     
      $filenamenew1=uniqid('',true).".".$fileextactual1;
      $filedest1='uploadsPromotion/'.$filenamenew1;

      $files1="<a href='$filenamenew1'>view</a>";
      move_uploaded_file($filetmp1,$filedest1);

    }else{
        echo '<script>alert("Your file is'. $filesize1 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror1')</script>"; 

}






$files=$_FILES['CV'];
$filename=$_FILES['CV']['name'];
$fileerror=$_FILES['CV']['error'];
$filesize=$_FILES['CV']['size'];
$filetmp=$_FILES['CV']['tmp_name'];
$fileext=explode(".",$filename);
$fileextactual=strtolower(end($fileext));
$allowed=array('pdf');

if(in_array($fileextactual,$allowed)){
 

  if($fileerror===0){
  
    if($filesize < (11*1024*1024)){
     
      $filenamenew=uniqid('',true).".".$fileextactual;
      $filedest='CV/'.$filenamenew;

      $files1="<a href='$filenamenew'>view</a>";
      move_uploaded_file($filetmp,$filedest);

    }else{
        echo '<script>alert("Your file is'. $filesize . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror')</script>"; 

}





	
	
$length = 6;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

$sql_insert_teacher="insert into teacher(TeacherID,Certificate,AcademicTitle,Department,Speciality,
DateofLastTitle,DiplomaTitle,MasterTitle,PHDTitle,NumberofMasterStudent,NumberofPHD,NumberofDiploma,GoogleScholar,ORCID,CV,Promotion,
Teacher_ID,CheckerID) values('$randomString','$_POST[certificate]','$_POST[title]','$_POST[department]','$_POST[speciality]','$_POST[date]','$_POST[dresearch]','$_POST[mresearch]','$_POST[presearch]',
'$_POST[mstudent]','$_POST[pstudent]','$_POST[dstudent]','$_POST[googlescholar]','$_POST[orcid]',"."'<a href=$filedest target=_blank>view</a>',"."'<a href=$filedest1 target=_blank>view</a>',"."$row333[0],$row222[0])";
//echo $sql_insert_teacher;
mysqli_query($conn,$sql_insert_teacher) or die(mysqli_error($conn));
	
}   
	?>
                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from teacher t, teacherinfo ti where t.Teacher_ID=ti.Teacher_ID and
ti.TeacherEmail in(Select TeacherEmail from teacherinfo where TeacherEmail="."'".$_SESSION['a']."')";

			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));

			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                     
                      <td>
                    <?= $row[1];?>
                    </td>
                      <td>
                    <?= $row[2];?>
                    </td>
                      <td>
                    <?= $row[3];?>
                    </td>
                       <td>
                    <?= $row[4];?>
                    </td>

                  <td>
                    <?= $row[5];?>
                    </td>
    
                       <td>
                    <?= $row[6];?>
                    </td>
                       <td>
                    <?= $row[7];?>
                    </td>
                       <td>
                    <?= $row[8];?>
                    </td>
                       <td>
                    <?= $row[11];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>
                    
                 <td>
                    <?= $row[10];?>
                    </td>

                    <td>
                    <a href='<?= $row[12];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row[13];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[14];?>
                    </td>
                    <td>
                    <?= $row[15];?>
                    </td>


                 <!--   <td width="8%">
                    <button id="<?//=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
                     <td width="8%">
                    <button id="<?=$row[0]; ?>" class="selected"> Edit </button>
                    </td>

              
               </tr>
            
		<?php		
}
			
?>

</tbody>

<?php
 }?>
 
 <?php
		   if(isset($_POST['aa'])){
?> 
 
 
 <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from teacher where FullName like "."'%".$_POST['AuthorName']."%'";
			   
			   	 if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from teacher where FullName like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select  * from journals where Department like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			   elseif(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select  * from journals where AcademicTitle= "."'".$_POST['PublicationYear']."'";
			   }
			   
			  else{
				   $sql_select_journal="Select  * from journals where Speciality= "."'".$_POST['mpactFactor']."'";
			   }
			   
			   
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			   if(mysqli_num_rows($result1)>0){
		
			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                      <td>
                    <?= $row[4];?>
                    </td>
     
                      <td>
                    <?= $row[6];?>
                    </td>
                       <td>
                    <?= $row[7];?>
                    </td>

                  <td>
                    <?= $row[8];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>
                       <td>
                    <?= $row[10];?>
                    </td>
                       <td>
                    <?= $row[11];?>
                    </td>
                       <td>
                    <?= $row[12];?>
                    </td>
                       <!-- <td>
                    <?//= $row[13];?>
                    </td>
                       <td>-->
                    <?//= $row[14];?>
                    </td>
                    
                 <td>
                    <?= $row[15];?>
                    </td>


                         <td>
                         <?= $row[16];?>
                    </td>


                    <td>
                    <a href='<?= $row[13];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row[14];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[15];?>
                    </td>




               </tr>
            
		<?php		
}
		   }
		   
		   else{
			   echo "No result founds";
		   }
		  
?>
</tbody>
<?php
		   }
		   ?>
 
 
 </table>  
 
</div>

<script>
  $(document).ready(function() {
                  $('#table1').css('width', $('#lefts').text().length * 7);
          })
</script>
</div>
</td>
<script type="text/javascript" >
        $(function() {
		    $(".delete").click(function(e) {
				e.preventDefault();
                var id = $(this).attr("id");
               
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "teacheraca_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
	
                        }
                    });
                  
                }
                return false;
            });
        });
 </script>

 
<script type="text/javascript" >
        $(function() {
		    $(".selected").click(function(e) {
				e.preventDefault();
                var id2 = $(this).attr("id");
                    $.post({
                        type:"POST",
						url:"e.php?q1="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },
                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
                     
			} 
});	
                //return false;
            });
        });
 </script>

		 </div>
</body>
</html>
            <script type="text/javascript">
        $(function () {
            $("#table1").hpaging({ "limit": 10 });
        });

        $("#btnApply").click(function () {
            var lmt = $("#pglmt").val();
            $("#table1").hpaging("newLimit", lmt);
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php
}?>









<?php
if(isset($_SESSION['b']))		 
{
	include("connection.php");
?>

<html>
<head>
<title>Teacher Details Form Insertion</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*,
*:before,
*:after {
   box-sizing: border-box;
}
form {
  border: 1px solid #c6c7cc;
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  overflow: hidden;
  width: 500px;
align-self: center
}
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}
input {
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0;
}
	
.account-info {
  padding: 20px 20px 0 20px;
}
.account-info label {
  color: #395870;
  display: block;
  font-weight: bold;
  margin-bottom: 20px;
}
.account-info input {
  background: #fff;
  border: 1px solid #c6c7cc;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
  color: #636466;
  padding: 6px;
  margin-top: 6px;
  width: 100%;
}
.account-action {
  background: #f0f0f2;
  border-top: 1px solid #c6c7cc;
  padding: 20px;
}
.account-action .btn {
	background: linear-gradient(#49708f, #293f50);
	border: 0;
	color: #fff;
	cursor: pointer;
	font-weight: bold;
	float: left;
	padding: 8px 16px;
	font-size: 14px;
}
.account-action label {
  color: #7c7c80;
  font-size: 12px;
  float: left;
  margin: 10px 0 0 20px;
}	
	
	body { background-color:#fafafa;}
.container { margin:10px auto; font-family:'Roboto';}
table { margin:10px 0;}

.limitedNumbChosen, .limitedNumbSelect2{
  width: 900px;
}
</style>
    
     <body>

      <div align="left">
      
      <table>
	<tr valign="top">
	<p id="ss1" class="ss1">
		<td class="selection" id="selection">
      
      <p id="msg"></p> 
		</td>
     <td valign="top">
      <div id="div1">
       <table>
        <tr>
                <td>
                  <input id="pglmt" placeholder="Page Limit" title="Page Limit" value="10" class="form-control">
                </td>
                <td>
                    <button id="btnApply" class="btn btn-danger">Apply</button>
                </td>
    </tr>
  </table>
             
<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                    <th>Fullname</th>
                    <th>Last Certificate</th>
                    <th>Academic Title</th>
                    <th>Department</th>
                    <th>Speciality</th>
              
                    <th>Last Title</th>
                    <th>Diploma Title</th>
                    <th>Master Title</th>
                    <th>PhD Title</th>
                    <th>Diploma Students</th>
                    <th>Master Students</th>
                    <th>PhD Students</th>
                    <th>GoogleScholar</th>
                    <th>ORCID</th>
                    <th>CV File</th>
                    <th>Promotion</th>


              </tr>
            </thead>

                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from teacher t,checkerinfo ci, teacherinfo ti where t.Teacher_ID=ti.Teacher_ID and ci.CheckerID=t.CheckerID and CheckerEmail="."'".$_SESSION['b']."'";

			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));

			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                     
              <td>
                    <?= $row['TeacherName'];?>
                    </td>
                     
                      <td>
                    <?= $row['Certificate'];?>
                    </td>
                      <td>
                    <?= $row['AcademicTitle'];?>
                    </td>
                      <td>
                    <?= $row[3];?>
                    </td>
                       <td>
                    <?= $row['Speciality'];?>
                    </td>

                       <td>
                    <?= $row['DateofLastTitle'];?>
                    </td>
                       <td>
                    <?= $row['DiplomaTitle'];?>
                    </td>
                       <td>
                    <?= $row['MasterTitle'];?>
                    </td>
                       <td>
                    <?= $row['PHDTitle'];?>
                    </td>
                       <td>
                    <?= $row['NumberofDiploma'];?>
                    </td>
                       <td>
                    <?= $row['NumberofMasterStudent'];?>
                    </td>
                    
                 <td>
                    <?= $row['NumberofPHD'];?>
                    </td>

                    <td>
                    <a href='<?= $row['GoogleScholar'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row['ORCID'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[14];?>
                    </td>

                        <td>
                        <?= $row[15];?>
                    </td>

                 <!--   <td width="8%">
                    <button id="<?//=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
                     <td width="8%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td>

              
               </tr>
            
		<?php		
}
			
?>

</tbody>

<?php
 }?>
 
 <?php
		   if(isset($_POST['aa'])){
?> 
 
 
 <tbody id="table-body">
              <?php
				$i=0;

			   
			   	 if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from teacher t, checkerinfo ci, teacherinfo ins  
				   where ins.TeacherName like "."'%".$_POST['AuthorName']."%' and ins.Teacher_ID=t.Teacher_ID 
				   and ci.CheckerID=t.CheckerID";
					
			   }
			   
						   
			  else if(isset($_POST['Department'])){
				   $sql_select_journal="Select  * from teacher t, checkerinfo ci, teacherinfo ins
				   where t.Department like "."'%".$_POST['Department']."%' and ins.Teacher_ID=t.Teacher_ID 
				   and ci.CheckerID=t.CheckerID";

			   }
			   
			   elseif(isset($_POST['Academic'])){
				   $sql_select_journal="Select  * from teacher t, checkerinfo ci, teacherinfo ins
				   where t.AcademicTitle like "."'".$_POST['Academic']."' and ins.Teacher_ID=t.Teacher_ID 
				   and ci.CheckerID=t.CheckerID";
			   }
			   
			  else{
				   $sql_select_journal="Select  * from teacher t, checkerinfo ci, teacherinfo ins 
				   where t.Speciality like "."'%".$_POST['Speciality']."%' and ins.Teacher_ID=t.Teacher_ID 
				   and ci.CheckerID=t.CheckerID";
			   }
			   
			   
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			   if(mysqli_num_rows($result1)>0){
		
			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row['TeacherName'];?>
                    </td>
                     
                      <td>
                    <?= $row['Certificate'];?>
                    </td>
                      <td>
                    <?= $row['AcademicTitle'];?>
                    </td>
                      <td>
                    <?= $row[3];?>
                    </td>
                       <td>
                    <?= $row['Speciality'];?>
                    </td>

                       <td>
                    <?= $row['DateofLastTitle'];?>
                    </td>
                       <td>
                    <?= $row['DiplomaTitle'];?>
                    </td>
                       <td>
                    <?= $row['MasterTitle'];?>
                    </td>
                       <td>
                    <?= $row['PHDTitle'];?>
                    </td>
                       <td>
                    <?= $row['NumberofDiploma'];?>
                    </td>
                       <td>
                    <?= $row['NumberofMasterStudent'];?>
                    </td>
                    
                 <td>
                    <?= $row['NumberofPHD'];?>
                    </td>

                    <td>
                    <a href='<?= $row['GoogleScholar'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row['ORCID'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[14];?>
                    </td>

                    <td>
                    <?= $row[15];?>
                    </td>



               </tr>
            
		<?php		
}
		   }
		   
		   else{
			   echo "No result founds";
		   }
		  
?>
</tbody>
<?php
		   }
		   ?>
 
 
 </table>  
 
</div>

<script>
  $(document).ready(function() {
                  $('#table1').css('width', $('#lefts').text().length * 7);
          })
</script>
</div>
</td>
<script type="text/javascript" >
        $(function() {
		    $(".delete").click(function(e) {
				e.preventDefault();
                var id = $(this).attr("id");
               
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "teacheraca_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
	
                        }
                    });
                  
                }
                return false;
            });
        });
 </script>

 
<script type="text/javascript" >
        $(function() {
		    $(".selected").click(function(e) {
				e.preventDefault();
                var id2 = $(this).attr("id");
                    $.post({
                        type:"POST",
						url:"e.php?q1="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },
                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
                     
			} 
});	
                //return false;
            });
        });
 </script>

		 </div>
</body>
</html>
            <script type="text/javascript">
        $(function () {
            $("#table1").hpaging({ "limit": 10 });
        });

        $("#btnApply").click(function () {
            var lmt = $("#pglmt").val();
            $("#table1").hpaging("newLimit", lmt);
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php
}
?>




















<?php
if(isset($_SESSION['admins']))		 
{
	include("connection.php");
?>

<html>
<head>
<title>Teacher Details Form Insertion</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*,
*:before,
*:after {
   box-sizing: border-box;
}
form {
  border: 1px solid #c6c7cc;
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  overflow: hidden;
  width: 500px;
align-self: center
}
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}
input {
  border-radius: 5px;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0;
}
	
.account-info {
  padding: 20px 20px 0 20px;
}
.account-info label {
  color: #395870;
  display: block;
  font-weight: bold;
  margin-bottom: 20px;
}
.account-info input {
  background: #fff;
  border: 1px solid #c6c7cc;
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1);
  color: #636466;
  padding: 6px;
  margin-top: 6px;
  width: 100%;
}
.account-action {
  background: #f0f0f2;
  border-top: 1px solid #c6c7cc;
  padding: 20px;
}
.account-action .btn {
	background: linear-gradient(#49708f, #293f50);
	border: 0;
	color: #fff;
	cursor: pointer;
	font-weight: bold;
	float: left;
	padding: 8px 16px;
	font-size: 14px;
}
.account-action label {
  color: #7c7c80;
  font-size: 12px;
  float: left;
  margin: 10px 0 0 20px;
}	
	
	body { background-color:#fafafa;}
.container { margin:10px auto; font-family:'Roboto';}
table { margin:10px 0;}

.limitedNumbChosen, .limitedNumbSelect2{
  width: 900px;
}
</style>
    
     <body>

      <div align="left">
      
      <table>
	<tr valign="top">
	<p id="ss1" class="ss1">
		<td class="selection" id="selection">
      
      <p id="msg"></p> 
		</td>
     <td valign="top">
      <div id="div1">
       <table>
        <tr>
                <td>
                  <input id="pglmt" placeholder="Page Limit" title="Page Limit" value="10" class="form-control">
                </td>
                <td>
                    <button id="btnApply" class="btn btn-danger">Apply</button>
                </td>
    </tr>
  </table>
             
<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                    <th>Fullname</th>
                    <th>Last Certificate</th>
                    <th>Academic Title</th>
                    <th>Department</th>
                    <th>Speciality</th>
                    <th>Last Title</th>
                    <th>Diploma Title</th>
                    <th>Master Title</th>
                    <th>PhD Title</th>
                    <th>Diploma Students</th>
                    <th>Master Students</th>
                    <th>PhD Students</th>
                    <th>GoogleScholar</th>
                    <th>ORCID</th>
                    <th>CV File</th>
                    <th>Promotion</th>


              </tr>
            </thead>

                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from teacher t, teacherinfo ti where t.Teacher_ID=ti.Teacher_ID";

			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));

			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                     
              <td>
                    <?= $row['TeacherName'];?>
                    </td>
                     
                      <td>
                    <?= $row['Certificate'];?>
                    </td>
                      <td>
                    <?= $row['AcademicTitle'];?>
                    </td>
                      <td>
                    <?= $row[3];?>
                    </td>
                       <td>
                    <?= $row['Speciality'];?>
                    </td>

                       <td>
                    <?= $row['DateofLastTitle'];?>
                    </td>
                       <td>
                    <?= $row['DiplomaTitle'];?>
                    </td>
                       <td>
                    <?= $row['MasterTitle'];?>
                    </td>
                       <td>
                    <?= $row['PHDTitle'];?>
                    </td>
                       <td>
                    <?= $row['NumberofDiploma'];?>
                    </td>
                       <td>
                    <?= $row['NumberofMasterStudent'];?>
                    </td>
                    
                 <td>
                    <?= $row['NumberofPHD'];?>
                    </td>

                    <td>
                    <a href='<?= $row['GoogleScholar'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row['ORCID'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[14];?>
                    </td>

                        <td>
                        <?= $row[15];?>
                    </td>

                 <!--   <td width="8%">
                    <button id="<?//=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
                     <td width="8%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td>

              
               </tr>
            
		<?php		
}
			
?>

</tbody>

<?php
 }?>
 
 <?php
		   if(isset($_POST['aa'])){
?> 
 
 
 <tbody id="table-body">
              <?php
				$i=0;

			   
			   	 if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from teacher t, teacherinfo ins  
				   where ins.TeacherName like "."'%".$_POST['AuthorName']."%' and ins.Teacher_ID=t.Teacher_ID";
					
			   }
			   
						   
			  else if(isset($_POST['Department'])){
				   $sql_select_journal="Select  * from teacher t, teacherinfo ins
				   where t.Department like "."'%".$_POST['Department']."%' and ins.Teacher_ID=t.Teacher_ID";

			   }
			   
			   elseif(isset($_POST['Academic'])){
				   $sql_select_journal="Select  * from teacher t, teacherinfo ins
				   where t.AcademicTitle like "."'".$_POST['Academic']."' and ins.Teacher_ID=t.Teacher_ID";
			   }
			   
			  else{
				   $sql_select_journal="Select  * from teacher t, teacherinfo ins 
				   where t.Speciality like "."'%".$_POST['Speciality']."%' and ins.Teacher_ID=t.Teacher_ID";
			   }
			   
			   
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			   if(mysqli_num_rows($result1)>0){
		
			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row['TeacherName'];?>
                    </td>
                     
                      <td>
                    <?= $row['Certificate'];?>
                    </td>
                      <td>
                    <?= $row['AcademicTitle'];?>
                    </td>
                      <td>
                    <?= $row[3];?>
                    </td>
                       <td>
                    <?= $row['Speciality'];?>
                    </td>

                       <td>
                    <?= $row['DateofLastTitle'];?>
                    </td>
                       <td>
                    <?= $row['DiplomaTitle'];?>
                    </td>
                       <td>
                    <?= $row['MasterTitle'];?>
                    </td>
                       <td>
                    <?= $row['PHDTitle'];?>
                    </td>
                       <td>
                    <?= $row['NumberofDiploma'];?>
                    </td>
                       <td>
                    <?= $row['NumberofMasterStudent'];?>
                    </td>
                    
                 <td>
                    <?= $row['NumberofPHD'];?>
                    </td>

                    <td>
                    <a href='<?= $row['GoogleScholar'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <a href='<?= $row['ORCID'];?>' target='_blank'>view</a>
                    </td>

                    <td>
                    <?= $row[14];?>
                    </td>

                    <td>
                    <?= $row[15];?>
                    </td>



               </tr>
            
		<?php		
}
		   }
		   
		   else{
			   echo "No result founds";
		   }
		  
?>
</tbody>
<?php
		   }
		   ?>
 
 
 </table>  
 
</div>

<script>
  $(document).ready(function() {
                  $('#table1').css('width', $('#lefts').text().length * 7);
          })
</script>
</div>
</td>
<script type="text/javascript" >
        $(function() {
		    $(".delete").click(function(e) {
				e.preventDefault();
                var id = $(this).attr("id");
               
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "teacheraca_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
	
                        }
                    });
                  
                }
                return false;
            });
        });
 </script>

 
<script type="text/javascript" >
        $(function() {
		    $(".selected").click(function(e) {
				e.preventDefault();
                var id2 = $(this).attr("id");
                    $.post({
                        type:"POST",
						url:"e.php?q1="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },
                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
                     
			} 
});	
                //return false;
            });
        });
 </script>

		 </div>
</body>
</html>
            <script type="text/javascript">
        $(function () {
            $("#table1").hpaging({ "limit": 10 });
        });

        $("#btnApply").click(function () {
            var lmt = $("#pglmt").val();
            $("#table1").hpaging("newLimit", lmt);
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php
}
?>



