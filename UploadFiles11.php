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
            
               <?php
		   if(!isset($_POST['dd'])){

		       ?>
               <thead>
                <tr id="lefts">
                    <th>MSc Guideline</th>
                    <th>PhD Guideline</th>
                    <th>Undergraduate Guideline</th>
                    <th>Research Paper Registeration</th>
                    <th>Research Proposal Template</th>
        
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
                    <th>MSc Guideline</th>
                    <th>PhD Guideline</th>
                    <th>Undergraduate Guideline</th>
                    <th>Research Paper Registeration</th>
                    <th>Research Proposal Template</th>
        
              </tr>
            </thead>
            
            <?php
		   }
	?>
            
            
            
<?php

if(isset($_POST['done'])){




////////////////////////////////////////////////////////////////////////////////////////////////
$files33=$_FILES['under'];
$filename33=$_FILES['under']['name'];
$fileerror33=$_FILES['under']['error'];
$filesize33=$_FILES['under']['size'];
$filetmp33=$_FILES['under']['tmp_name'];
$fileext33=explode(".",$filename33);
$fileextactual33=strtolower(end($fileext33));
$allowed33=array('pdf','docx');

if(in_array($fileextactual33,$allowed33)){
 

  if($fileerror33===0){
  
    if($filesize33 < (11*1024*1024)){
     
      $filenamenew33=uniqid('',true).".".$fileextactual33;
      $filedest33='ScientificFiles/'.$filenamenew33;

      $files33="<a href='$filenamenew33'>view</a>";
      move_uploaded_file($filetmp33,$filedest33);

    }else{
        echo '<script>alert("Your file is'. $filesize33 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror33')</script>"; 

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$files22=$_FILES['msc'];
$filename22=$_FILES['msc']['name'];
$fileerror22=$_FILES['msc']['error'];
$filesize22=$_FILES['msc']['size'];
$filetmp22=$_FILES['msc']['tmp_name'];
$fileext22=explode(".",$filename22);
$fileextactual22=strtolower(end($fileext22));
$allowed22=array('pdf','docx');

if(in_array($fileextactual22,$allowed22)){
 

  if($fileerror22===0){
  
    if($filesize22 < (11*1024*1024)){
     
      $filenamenew22=uniqid('',true).".".$fileextactual22;
      $filedest22='ScientificFiles/'.$filenamenew22;

      $files22="<a href='$filenamenew22'>view</a>";
      move_uploaded_file($filetmp22,$filedest22);

    }else{
        echo '<script>alert("Your file is'. $filesize22 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror22')</script>"; 

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$files44=$_FILES['phd'];
$filename44=$_FILES['phd']['name'];
$fileerror44=$_FILES['phd']['error'];
$filesize44=$_FILES['phd']['size'];
$filetmp44=$_FILES['phd']['tmp_name'];
$fileext44=explode(".",$filename44);
$fileextactual44=strtolower(end($fileext44));
$allowed44=array('pdf','docx');

if(in_array($fileextactual44,$allowed44)){
 

  if($fileerror44===0){
  
    if($filesize44 < (11*1024*1024)){
     
      $filenamenew44=uniqid('',true).".".$fileextactual44;
      $filedest44='ScientificFiles/'.$filenamenew44;

      $files44="<a href='$filenamenew44'>view</a>";
      move_uploaded_file($filetmp44,$filedest44);

    }else{
        echo '<script>alert("Your file is'. $filesize44 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror44')</script>"; 

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$files55=$_FILES['paper'];
$filename55=$_FILES['paper']['name'];
$fileerror55=$_FILES['paper']['error'];
$filesize55=$_FILES['paper']['size'];
$filetmp55=$_FILES['paper']['tmp_name'];
$fileext55=explode(".",$filename55);
$fileextactual55=strtolower(end($fileext55));
$allowed55=array('pdf','docx');

if(in_array($fileextactual55,$allowed55)){
 

  if($fileerror55===0){
  
    if($filesize55 < (11*1024*1024)){
     
      $filenamenew55=uniqid('',true).".".$fileextactual55;
      $filedest55='ScientificFiles/'.$filenamenew55;

      $files55="<a href='$filenamenew55'>view</a>";
      move_uploaded_file($filetmp55,$filedest55);

    }else{
        echo '<script>alert("Your file is'. $filesize55 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror55')</script>"; 

}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$files77=$_FILES['proposal'];
$filename77=$_FILES['proposal']['name'];
$fileerror77=$_FILES['proposal']['error'];
$filesize77=$_FILES['proposal']['size'];
$filetmp77=$_FILES['proposal']['tmp_name'];
$fileext77=explode(".",$filename77);
$fileextactual77=strtolower(end($fileext77));
$allowed77=array('pdf','docx');

if(in_array($fileextactual77,$allowed77)){
 

  if($fileerror77===0){
  
    if($filesize77 < (11*1024*1024)){
     
      $filenamenew77=uniqid('',true).".".$fileextactual77;
      $filedest77='ScientificFiles/'.$filenamenew77;

      $files77="<a href='$filenamenew77'>view</a>";
      move_uploaded_file($filetmp77,$filedest77);

    }else{
        echo '<script>alert("Your file is'. $filesize77 . 'bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror77')</script>"; 

}











$sql_insert_teacher="insert into uploadfiles(Paper,MSc,PhD,Undergraduate,Proposal) 
values(".
"'<a href=$filedest55 target=_blank>view</a>',".
"'<a href=$filedest22 target=_blank>view</a>',".
"'<a href=$filedest44 target=_blank>view</a>',".
"'<a href=$filedest33 target=_blank>view</a>',".
"'<a href=$filedest77 target=_blank>view</a>'".")";
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
$sql_select_journal="Select  * from uploadfiles";

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
    
                   <td width="8%">
                    <button id="<?=$row[0]; ?>" class="delete" > Delete </button>
                    </td>
               
               </tr> 
		<?php		
}
			
?>

</tbody>

<?php
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
                        url : "file_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('UploadFiles11.php').fadeIn("slow");
	
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
						url:"e1.php?q1="+id2,
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
if(isset($_SESSION['a']))		 
{
	include("connection.php");
?>

<html>
<head>
<title>Scientific Committee Files</title>
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
                    <th>MSc Guideline</th>
                    <th>PhD Guideline</th>
                    <th>Undergraduate Guideline</th>
                    <th>Research Paper Registeration</th>
                    <th>Research Proposal Template</th>
        
              </tr>
            </thead>

                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from uploadfiles";

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

