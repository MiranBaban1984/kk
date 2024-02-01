<?php
if(isset($_SESSION['a']))
{
include("connection.php");
?>
<html>
<head>
<title>Journal Details Form Insertion</title>
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
      <div id="msg"></div> 
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
             <table id="table1" class="table table-bordered table-striped">
            <thead>

                <tr id="lefts">
                    <th>Main Author</th>
                    <th>Author Place</th>
                    <th>Title</th>
                    <th>publisher</th>
                    <th>Registeration Date</th>
                    <th>Ethical Date</th>
                    <th>Ethical Number</th>
                    <th>Journal</th>
                    <th>Date</th>
                    <th>IF</th>
                    <th>Vol.</th>
                    <th>Issue</th>
                    <th>Pages</th>
                    <th>DOI</th>
                    <th>Publication Link</th>
                    <th>Paper Type</th>
                    <th>Keywords</th>
                    <th>File</th>
                    <th>Ethics</th>   
              </tr>
            </thead>




<?php
include("connection.php");

$sql_teacher11="Select Teacher_ID,TeacherName from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result_journal11=mysqli_query($conn,$sql_teacher11) or die(mysqli_error($conn));
$row_teacher11=mysqli_fetch_array($result_journal11);



$sql_teacher="Select Teacher_ID from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result_journal=mysqli_query($conn,$sql_teacher) or die(mysqli_error($conn));
$row_teacher=mysqli_fetch_array($result_journal);
	
	
		   if(isset($_POST['dn'])){

$sql333="Select Teacher_ID from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result333=mysqli_query($conn,$sql333) or die(mysqli_error($conn));
$row333=mysqli_fetch_array($result333);
			   
			   
$sql222="Select ch.CheckerID from checkerinfo ch,teacher t,teacherinfo ti where ch.Department=t.Department AND t.Teacher_ID=ti.Teacher_ID AND ch.CheckerID=t.CheckerID AND ti.TeacherEmail="."'".$_SESSION['a']."'";
$result222=mysqli_query($conn,$sql222) or die(mysqli_error($conn));
$row222=mysqli_fetch_array($result222);




$files=$_FILES['file'];
$filename=$_FILES['file']['name'];
$fileerror=$_FILES['file']['error'];
$filesize=$_FILES['file']['size'];
$filetmp=$_FILES['file']['tmp_name'];
$fileext=explode(".",$filename);
$fileextactual=strtolower(end($fileext));
$allowed=array('pdf');

if(in_array($fileextactual,$allowed)){
 

  if($fileerror===0){
  
    if($filesize < (11*1024*1024)){
     
      $filenamenew=uniqid('',true).".".$fileextactual;
      $filedest='uploads/'.$filenamenew;

      $files1="<a href='$filenamenew'>view</a>";
      move_uploaded_file($filetmp,$filedest);

    }else{
        echo '<script>alert("Your file is bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror')</script>"; 

}









$files2=$_FILES['Ethicfile'];
$filename2=$_FILES['Ethicfile']['name'];
$fileerror2=$_FILES['Ethicfile']['error'];
$filesize2=$_FILES['Ethicfile']['size'];
$filetmp2=$_FILES['Ethicfile']['tmp_name'];
$fileext2=explode(".",$filename2);
$fileextactual2=strtolower(end($fileext2));
$allowed2=array('pdf');

if(in_array($fileextactual2,$allowed2)){
 

  if($fileerror2===0){
  
    if($filesize2 < (11*1024*1024)){
     
      $filenamenew2=uniqid('',true).".".$fileextactual2;
      $filedest2='uploadsEthics/'.$filenamenew2;

      $files2="<a href='$filenamenew2'>view</a>";
      move_uploaded_file($filetmp2,$filedest2);

    }else{
        echo '<script>alert("Your file is bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror2')</script>"; 

}



$q5 = $_POST['authorplace'];	
$sql_insert_teacher="
insert into journals(TeacherName,ResearchTitle,RegisterationDate,ApprovalDate,
EthicalNumber,JournalName,PublishingYear,Impactfactor,Volume,Issue,Pages,DOI,Weblink,File,Ethics,Publisher,PaperType,Keyword,Teacher_ID,CheckerID,MainAuthor) values('$q5','$_POST[papertitle]','$_POST[sciregister]','$_POST[ethical]',
'$_POST[ethicalno]','$_POST[journalname]','$_POST[journalyear]','$_POST[IF]','$_POST[vol]',
'$_POST[no]','$_POST[pages]','$_POST[doi]','$_POST[weblink]',"."'<a href=$filedest target=_blank>view</a>',"."'<a href=$filedest2 target=_blank>view</a>',"."'$_POST[publisher]','$_POST[papertype]','$_POST[multitext]',$row333[0],$row222[0],'$row_teacher11[1]')";	

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
$sql_teacher_journal="Select * from journals where Teacher_ID=$row_teacher[0]";
			   
$result_journal_data=mysqli_query($conn,$sql_teacher_journal) or die(mysqli_error($conn));
			   
while ($row_teacher_data=mysqli_fetch_array($result_journal_data)){
	
           ?>
                 <tr class="delete_mem<?php echo $row_teacher_data[0];?>" id="sd">
                 <td>
                 <?= $row_teacher11[1];?>
                 </td>
                    <td>
                    <?= $row_teacher_data[1];?>
                    </td>
                    <td>
                    <?= $row_teacher_data[2];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[16];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[3];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[4];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[5];?>
                    </td>
                     
                     <td>
                    <?= $row_teacher_data[6];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[7];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[8];?>
                    </td>

                  <td>
                    <?= $row_teacher_data[9];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[10];?>
                    </td>
            
                       <td>
                    <?= $row_teacher_data[11];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[12];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[13];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[17];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[18];?>
                    </td>

                       <td>
                    <?= $row_teacher_data[14];?>
                    </td>

             
                    <td>
                    <?= $row_teacher_data[15];?>
                    </td>

                    <?php
                    if (!isset($_GET['cv'])) {
?>
                    <td width="7%">
                    <button id="<?=$row_teacher_data[0]; ?>" class="delete"> Delete </button>
                    </td>

                     <td width="8%">
                    <button id="<?=$row_teacher_data[0]; ?>" class="selected"> Edit </button>
                    </td>
<?php

    }
?>
              
               </tr>
            
		<?php		
}
		   
?>

</tbody>
<?php
}
?>















 <?php
		   if(isset($_POST['aa']))
		   {
$sql_teacher11="Select Teacher_ID,TeacherName from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result_journal11=mysqli_query($conn,$sql_teacher11) or die(mysqli_error($conn));
$row_teacher11=mysqli_fetch_array($result_journal11);


		   ?>
            <tbody id="table-body">
              <?php
				$i=0;

			   if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci
				   where ti.TeacherName like "."'%".$_POST['AuthorName']."%' and ti.Teacher_ID=t.Teacher_ID and 
				   ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci
				   where js.ResearchTitle like "."'%".$_POST['RsearchTitle']."%' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";

			   }
			   
			   elseif(isset($_POST['PublicationYear'])){
				   $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci 
				   where js.PublishingYear= "."'".$_POST['PublicationYear']."' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";
			   }
			   
			  elseif(isset($_POST['ImpactFactor'])){
				   $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci
				   where js.Impactfactor= "."'".$_POST['ImpactFactor']."' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";
			   }


         elseif(isset($_POST['multitext'])){
          $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci
          where js.Keyword Like "."'%".$_POST['multitext']."%' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";
        }
			   

			  else{
				   $sql_select_journal="Select  * from journals js, teacherinfo ti, teacher t,checkerinfo ci 
				   where ti.TeacherName like "."'%".$_POST['AuthorName1']."%' and js.PublishingYear=".$_POST['year1']." and 
				  ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and ci.CheckerID=js.CheckerID and ti.Teacher_ID=$row_teacher[0] and js.Teacher_ID=ti.Teacher_ID";
           
			   }
			   
			   
			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			  
			   if(mysqli_num_rows($result1)>0){
				   
			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

      

                    <td>
                    <?= $row[21];?>
                    </td>

                    <td>
                    <?= $row[1];?>
                    </td>

                    <td>
                    <?= $row[2];?>
                    </td>


                    <td>
                 <?= $row[16];?>
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


                    <td>
                    <?= $row[13];?>
                    </td>

                    <td>
                    <?= $row[17];?>
                    </td>

                    <td>
                    <?= $row[18];?>
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
                  $('#table1').css('width', $('#lefts').text().length * 5);
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
                        url : "journal_teacher_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {
					 $(".delete_mem" + id).fadeOut('slow');	//$('#div1').fadeOut('slow').load('journalteach11.php').fadeIn("slow");
	
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
						url:"g.php?q123="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },

                  success : function(data) {

					$(".delete_mem" + id2).fadeOut('slow');
					$(".delete_mem" + id2).fadeIn('slow');
					$('#selection').fadeOut('slow');
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
if(isset($_SESSION['b']))
{
include("connection.php");

?>
<html>
<head>
<title>Journal Details Form Insertion</title>
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
      
      <div id="msg"></div> 
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

  <form method="post" action="exportjournal1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
<?php
    // $sql11="select count(distinct DOI) as aa from journals";
    // $result1=mysqli_query($conn,$sql11) or die(mysqli_error($conn));
    // $value = mysqli_fetch_assoc($result1);
    // echo "<b><br/><br/> Number of Research conducted in college: ".$value['aa']."<br/><br/></b>";

    // $sql_teacher_journal="Select count(distinct DOI) as aa from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."'";
    // $result1=mysqli_query($conn,$sql11) or die(mysqli_error($conn));
    // $value = mysqli_fetch_assoc($result1);
    // echo "<b><br/> Number of Research conducted in Department: ".$value['aa']."<br/></b>";


    // $sql11="select sum(distinct DOI) as aa from journals";
    // $result1=mysqli_query($conn,$sql11) or die(mysqli_error($conn));
    // $value = mysqli_fetch_assoc($result1);
    // echo "<b><br/><br/> Total impact factor in in college: ".$value['aa']."<br/></b>";

    // $sql_teacher_journal="Select sum(distinct DOI) as aa from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."'";
    // $result1=mysqli_query($conn,$sql11) or die(mysqli_error($conn));
    // $value = mysqli_fetch_assoc($result1);
    // echo "<b><br/> Total impact factor in Department: ".$value['aa']."<br/><br/></b>"; 
?>

<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                  <th>Main Author</th>
                    <th>Author Place</th>
                    <th>Title</th>
                    <th>publisher</th>
                    <th>Registeration Date</th>
                    <th>Ethical Date</th>
                    <th>Ethical Number</th>
                    <th>Journal</th>
                    <th>Date</th>
                    <th>IF</th>
                    <th>Vol.</th>
                    <th>Issue</th>
                    <th>Pages</th>
                    <th>DOI</th>
                    <th>Publication Link</th>
                    <th>Paper Type</th>
                    <th>Keywords</th>
                    <th>File</th>
                    <th>Ethics</th> 
                    
                    


                    
              </tr>
            </thead>
                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_teacher_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."'";
$result_journal_data=mysqli_query($conn,$sql_teacher_journal) or die(mysqli_error($conn));	   
while ($row_teacher_data=mysqli_fetch_array($result_journal_data)){
	
           ?>
                 <tr class="delete_mem<?php echo $row_teacher_data[0];?>" id="sd">
     
           
                    <td>
                    <?= $row_teacher_data[21];?>
                    </td>
                    <td>
                    <?= $row_teacher_data[1];?>
                    </td>
                    <td>
                    <?= $row_teacher_data[2];?>
                    </td>

                    <td>
                 <?= $row_teacher_data[16];?>
                 </td>


                      <td>
                    <?= $row_teacher_data[3];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[4];?>
                    </td>
                     
                     <td>
                    <?= $row_teacher_data[5];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[6];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[7];?>
                    </td>

                  <td>
                    <?= $row_teacher_data[8];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[9];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[10];?>
                    </td>
         
                       <td>
                    <?= $row_teacher_data[11];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[12];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[13];?>
                    </td>


                    <td>
                    <?= $row_teacher_data[17];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[18];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[14];?>
                    </td>
        

                    <td>
                    <?= $row_teacher_data[15];?>
                    </td>


                    <!-- <td width="7%">
                    <button id="//$row_teacher_data[0]; ?>" class="delete"> Delete </button>
                    </td> -->
               </tr>
            
		<?php		
}
		   }
?>

 <?php
		   if(isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;

			   if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and MainAuthor like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and ResearchTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			   elseif(isset($_POST['PublicationYear'])){
				   $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and PublishingYear= "."'".$_POST['PublicationYear']."'";
			   }
			   
			  elseif(isset($_POST['ImpactFactor'])){
				   $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and Impactfactor= "."'".$_POST['ImpactFactor']."'";
			   }


         else if(isset($_POST['multitext'])){
          $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and Keyword like "."'%".$_POST['multitext']."%'";

        }
			   
			   else{
	  $sql_select_journal="Select * from journals j, checkerinfo ch where j.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and MainAuthor like "."'%".$_POST['AuthorName1']."%' and 
	  PublishingYear= "."'".$_POST['year1']."'";



			   }
			   
			   
			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			  
			   if(mysqli_num_rows($result1)>0){
				   
				   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

     

                    <td>
                    <?= $row[21];?>
                    </td>

                    <td>
                    <?= $row[1];?>
                    </td>

                    <td>
                    <?= $row[2];?>
                    </td>

                    <td>
                    <?= $row[16];?>
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
                       <td>
                    <?= $row[13];?>
                    </td>

                    <td>
                    <?= $row[17];?>
                    </td>

                    <td>
                    <?= $row[18];?>
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
                        url : "journal_teacher_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {
					 $(".delete_mem" + id).fadeOut('slow');	//$('#div1').fadeOut('slow').load('journalteach11.php').fadeIn("slow");
	
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
						url:"g.php?q123="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },
                  success : function(data) {
					$('#selection').fadeOut('slow');
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
<title>Journal Details Form Insertion</title>
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
      
      <div id="msg"></div> 
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

  <form method="post" action="exportjournal1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>


<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                  <th>Main Author</th>
                    <th>Author Place</th>
                    <th>Title</th>
                    <th>publisher</th>
                    <th>Registeration Date</th>
                    <th>Ethical Date</th>
                    <th>Ethical Number</th>
                    <th>Journal</th>
                    <th>Date</th>
                    <th>IF</th>
                    <th>Vol.</th>
                    <th>Issue</th>
                    <th>Pages</th>
                    <th>DOI</th>
                    <th>Publication Link</th>
                    <th>Paper Type</th>
                    <th>Keywords</th>
                    <th>File</th>
                    <th>Ethics</th> 
                    
                    


                    
              </tr>
            </thead>
                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_teacher_journal="Select * from journals";
$result_journal_data=mysqli_query($conn,$sql_teacher_journal) or die(mysqli_error($conn));	   
while ($row_teacher_data=mysqli_fetch_array($result_journal_data)){
	
           ?>
                 <tr class="delete_mem<?php echo $row_teacher_data[0];?>" id="sd">
     
           
                    <td>
                    <?= $row_teacher_data[21];?>
                    </td>
                    <td>
                    <?= $row_teacher_data[1];?>
                    </td>
                    <td>
                    <?= $row_teacher_data[2];?>
                    </td>

                    <td>
                 <?= $row_teacher_data[16];?>
                 </td>


                      <td>
                    <?= $row_teacher_data[3];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[4];?>
                    </td>
                     
                     <td>
                    <?= $row_teacher_data[5];?>
                    </td>
                      <td>
                    <?= $row_teacher_data[6];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[7];?>
                    </td>

                  <td>
                    <?= $row_teacher_data[8];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[9];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[10];?>
                    </td>
         
                       <td>
                    <?= $row_teacher_data[11];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[12];?>
                    </td>
                       <td>
                    <?= $row_teacher_data[13];?>
                    </td>


                    <td>
                    <?= $row_teacher_data[17];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[18];?>
                    </td>

                    <td>
                    <?= $row_teacher_data[14];?>
                    </td>
        

                    <td>
                    <?= $row_teacher_data[15];?>
                    </td>


                    <!-- <td width="7%">
                    <button id="//$row_teacher_data[0]; ?>" class="delete"> Delete </button>
                    </td> -->
               </tr>
            
		<?php		
}
		   }
?>

 <?php
		   if(isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;

			   if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select * from journals where MainAuthor like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select * from journals where ResearchTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			   elseif(isset($_POST['PublicationYear'])){
				   $sql_select_journal="Select * from journals where PublishingYear= "."'".$_POST['PublicationYear']."'";
			   }
			   
			  elseif(isset($_POST['ImpactFactor'])){
				   $sql_select_journal="Select * from journals where Impactfactor= "."'".$_POST['ImpactFactor']."'";
			   }


         else if(isset($_POST['multitext'])){
          $sql_select_journal="Select * from journals where Keyword like "."'%".$_POST['multitext']."%'";

        }
			   
			   else{
	  $sql_select_journal="Select * from journals where MainAuthor like "."'%".$_POST['AuthorName1']."%' and 
	  PublishingYear= "."'".$_POST['year1']."'";



			   }
			   
			   
			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			  
			   if(mysqli_num_rows($result1)>0){
				   
				   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

     

                    <td>
                    <?= $row[21];?>
                    </td>

                    <td>
                    <?= $row[1];?>
                    </td>

                    <td>
                    <?= $row[2];?>
                    </td>

                    <td>
                    <?= $row[16];?>
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
                       <td>
                    <?= $row[13];?>
                    </td>

                    <td>
                    <?= $row[17];?>
                    </td>

                    <td>
                    <?= $row[18];?>
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
                        url : "journal_teacher_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {
					 $(".delete_mem" + id).fadeOut('slow');	//$('#div1').fadeOut('slow').load('journalteach11.php').fadeIn("slow");
	
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
						url:"g.php?q123="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },
                  success : function(data) {
					$('#selection').fadeOut('slow');
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
