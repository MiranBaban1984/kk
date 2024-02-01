<?php
include("connection.php");
if(isset($_SESSION['a']))
{
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
             <table width="96%" class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                <th>Main Author</th>    
                <th width="20%">Book Title</th>
                    <th width="13%">Author Place</th>
                    <th width="11%">Date of Publication</th>
                    <th width="10%">Publication Organization</th>
                    <th width="10%">Publication Place</th>
                    <th width="10%">ISBN</th>
                    <th width="8%">DOI</th>
                    <th width="9%">Weblink</th>
                    <th width="9%">Book Type</th>
                    <th width="9%">Book File</th>   
              </tr>
            </thead>
<?php
$sql_teacher="Select Teacher_ID from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result_journal=mysqli_query($conn,$sql_teacher) or die(mysqli_error($conn));
$row_teacher=mysqli_fetch_array($result_journal);

$sql_teacher11="Select Teacher_ID,TeacherName from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result_journal11=mysqli_query($conn,$sql_teacher11) or die(mysqli_error($conn));
$row_teacher11=mysqli_fetch_array($result_journal11);

if(isset($_POST['dn'])){

$sql333="Select Teacher_ID from teacherinfo where TeacherEmail="."'".$_SESSION['a']."'";
$result333=mysqli_query($conn,$sql333) or die(mysqli_error($conn));
$row333=mysqli_fetch_array($result333);
			   
			   
$sql222="Select ch.CheckerID from checkerinfo ch,teacher t,teacherinfo ti where ch.Department=t.Department AND t.Teacher_ID=ti.Teacher_ID AND ch.CheckerID=t.CheckerID AND ti.TeacherEmail="."'".$_SESSION['a']."'";
$result222=mysqli_query($conn,$sql222) or die(mysqli_error($conn));
$row222=mysqli_fetch_array($result222);	



$files=$_FILES['bookfile'];
$filename=$_FILES['bookfile']['name'];
$fileerror=$_FILES['bookfile']['error'];
$filesize=$_FILES['bookfile']['size'];
$filetmp=$_FILES['bookfile']['tmp_name'];
$fileext=explode(".",$filename);
$fileextactual=strtolower(end($fileext));
$allowed=array('pdf');

if(in_array($fileextactual,$allowed)){
 

  if($fileerror===0){
  
    if($filesize < (11*1024*1024)){
     
      $filenamenew=uniqid('',true).".".$fileextactual;
      $filedest='uploadsBooks/'.$filenamenew;

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




$q5 = $_POST['bookauthorplace'];
$sql_insert_teacher="
insert into books(BookTitle,CoAuthor,PublishYear,Place,Publisher,ISBN,DOI,WebLink,File,BookType,CheckerID,Teacher_ID,MainAuthor) values('$_POST[booktitle]','$q5','$_POST[year111]','$_POST[publicationplace]',
'$_POST[publicationorganization]','$_POST[bookisbn]','$_POST[bookdoi]','$_POST[booklink]',"."'<a href=$filedest target=_blank>view</a>',"."'$_POST[booktype]',$row222[0],$row333[0],'$row_teacher11[1]')";
mysqli_query($conn,$sql_insert_teacher) or die(mysqli_error($conn));
	//echo $sql_insert_teacher;
}
		   
	?>
           
           <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from books where Teacher_ID=$row_teacher[0]";

$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                 
                 <td>
                 <?= $row_teacher11[1];?>
                 </td>
                 
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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>

                    <td>
                    <?= $row[9];?>
                    </td>
                      
                    <?php
if (!isset($_GET['cv'])) {
?>
                    <td width="7%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td>

                     <td width="8%">
                    <button id="<?=$row[0]; ?>" class="selected"> Edit </button>
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
		   ?>
<tbody id="table-body">
              <?php
				$i=0;
			   
			    if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from books b, teacherinfo ti, teacher t,checkerinfo ci
				   where ti.TeacherName like "."'%".$_POST['AuthorName']."%' and ti.Teacher_ID=t.Teacher_ID and 
				   ti.TeacherEmail="."'".$_SESSION['a']."' and b.Teacher_ID=ti.Teacher_ID and ci.CheckerID=b.CheckerID";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select  * from books b, teacherinfo ti, teacher t,checkerinfo ci 
				   where b.BookTitle like "."'%".$_POST['RsearchTitle']."%' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and b.Teacher_ID=ti.Teacher_ID and ci.CheckerID=b.CheckerID";

			   }
			   
			  else{
				   $sql_select_journal="Select  * from books b, teacherinfo ti, teacher t,checkerinfo ci
					where b.PublishYear= "."'".$_POST['PublicationYear']."' and ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."' and b.Teacher_ID=ti.Teacher_ID and ci.CheckerID=b.CheckerID";
			   }
			   
			   
			   
			   
			   
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			   if(mysqli_num_rows($result1)>0){
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

                 <td>
                    <?= $row[13];?>
                    </td>

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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>

                    <td>
                    <?= $row[9];?>
                    </td>
                      
                    
                     </tr>
            
		<?php		
}}
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
                        url : "book_info_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	
					 $('#div1').fadeOut('slow').load('bookinfo11.php').fadeIn("slow");
	
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
						url:"h.php?q2="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },

                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
					 // $("#message11").html(data);

                     
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
           <form method="post" action="exportbook1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
       <div class="container" id="tables">
             <table id="table1" class="table table-bordered table-striped">
            <thead>
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
                    <th>Book File</th>   
              </tr>
            </thead>
           
           <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select * from books b, checkerinfo ch where b.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."'";
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

                 <td>
                    <?= $row[13];?>
                    </td>
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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>

                    <td>
                    <?= $row[9];?>
                    </td>
                      
                    <!-- <td width="7%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td> -->
                 <!--   <td width="8%">
                    <button id="<?=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
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
		   ?>
<tbody id="table-body">
              <?php
				$i=0;
			   
			    if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select * from books b, checkerinfo ch where b.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and MainAuthor like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select * from books b, checkerinfo ch where b.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and BookTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			  else{
				   $sql_select_journal="Select * from books b, checkerinfo ch where b.CheckerID=ch.CheckerID and ch.CheckerEmail="."'".$_SESSION['b']."' and PublishYear= "."'".$_POST['PublicationYear']."'";
			   }
			   

$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
 if(mysqli_num_rows($result1)>0){
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

                 <td>
                    <?= $row[13];?>
                    </td>
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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>


                  <td>
                    <?= $row[9];?>
                    </td>
                      
                    
                     </tr>
            
		<?php		
}}
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
                        url : "book_info_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	
					 $('#div1').fadeOut('slow').load('book11.php').fadeIn("slow");
	
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
						url:"c.php?q2="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },

                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
					 // $("#message11").html(data);

                     
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
           <form method="post" action="exportbook1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
       <div class="container" id="tables">
             <table id="table1" class="table table-bordered table-striped">
            <thead>
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
                    <th>Book File</th>   
              </tr>
            </thead>
           
           <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select * from books";
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

                 <td>
                    <?= $row[13];?>
                    </td>
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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>

                    <td>
                    <?= $row[9];?>
                    </td>
                      
                    <!-- <td width="7%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td> -->
                 <!--   <td width="8%">
                    <button id="<?=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
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
		   ?>
<tbody id="table-body">
              <?php
				$i=0;
			   
			    if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select * from books where  MainAuthor like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select * from books where BookTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			  else{
				   $sql_select_journal="Select * from books b, checkerinfo ch where PublishYear= "."'".$_POST['PublicationYear']."'";
			   }
			   

$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
 if(mysqli_num_rows($result1)>0){
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">

                 <td>
                    <?= $row[13];?>
                    </td>
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
                    <?= $row[5];?>
                    </td>
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
                    <?= $row[10];?>
                    </td>


                  <td>
                    <?= $row[9];?>
                    </td>
                      
                    
                     </tr>
            
		<?php		
}}
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
                        url : "book_info_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	
					 $('#div1').fadeOut('slow').load('book11.php').fadeIn("slow");
	
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
						url:"c.php?q2="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },

                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
					 // $("#message11").html(data);

                     
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


