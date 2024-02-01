<?php
include("connection.php");
?>
<!doctype html>
<html>
<head>
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
.limitedNumbChosen, .limitedNumbSelect2{  width: 900px;}

	</style>
<meta charset="utf-8">
<title>Teacher Details Form Insertion</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="multiple-Select.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
 <link href="paging.css" rel="stylesheet" type="text/css"/>

  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 <script src="multiple-Select.js"></script>
	 <script src="jquery.table.hpaging.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

</head>

<body>
 <div align="right">
<?php
	if(isset($_SESSION['a'])){
	echo "<p> <h3>Your login with ".$_SESSION['TeacherName']."<h3> </p>";
		}

    elseif(isset($_SESSION['b'])){
      echo "<p> <h3>Your login with   ".$_SESSION['checker']."<h3> </p>";
    }

    else{
      echo "<p> <h3>Your login with   ".$_SESSION['admins']."<h3> </p>";
    }
    
?>   
     <p><a href='sesdestroy.php'>logout</a></p>
     </div>

     <?php
if(isset($_SESSION['a'])){
	//echo "<p><a href='SchoolofDentistry/index11.php'><h3>Go to Main Page</h3></a></p>";


  $sqlTeacherLogin="Select t.TeacherID from teacher t, teacherinfo ti where ti.Teacher_ID=t.Teacher_ID and ti.TeacherEmail="."'".$_SESSION['a']."'";
  $result111 = mysqli_query($conn, $sqlTeacherLogin) or die(mysqli_error($conn));

if (mysqli_num_rows($result111) > 0) {
   echo "<p><a href='SchoolofDentistry/index11.php'><h3>Go to Main Page</h3></a></p>";
}

else{
echo "<p><h3>Your Registeration is not completed</h3></p>";
}
		}

    elseif(isset($_SESSION['b'])){
      echo "<p><a href='SchoolofDentistry/checkerpage.php'><h3>Go to Main Page</h3></a></p>";
    }

    else{
      echo "<p><a href='SchoolofDentistry/adminpage.php'><h3>Go to Main Page</h3></a></p>";
    }
    
?>
<img src="123.jpg" width="642" height="150" alt=""/>

<div align="left">
<table>
	<tr>
	  <p id="ss1" class="ss1">
	    <?php		
if(!isset($_GET['q1']) && !isset($_SESSION['b']) && !isset($_SESSION['admins'])){
?>
<td class="selection" id="selection">
 <form method="post" action="#" id="loginForm" enctype="multipart/form-data">
  <fieldset class="account-info">
   <legend><h2>Teacher Details Form Insertion</h2></legend>
   <label>
     Last Certificate
  <select name="certificate" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="certificate">
    <option value="">Certificate...</option>
    <option value="Bachelor">Bachelor</option>
    <option value="High Diploma">High Diploma</option>
    <option value="Master of Science">Master of Science</option>
    <option value="Doctor of Philosophy">Doctor of Philosophy</option>
    <option value="Academic Board">Academic Board</option>
</select>
       <script>
	$(document).ready(function(){
  $(".limitedNumbChosen").chosen({
        max_selected_options: 10,
    placeholder_text_multiple: "Which are two of most productive days of your week"
    })
    .bind("chosen:maxselected", function (){
        window.alert("You reached your limited number of selections which is 2 selections!");
    })

});
		</script>
  </label>
    
    <label>
      Academic Title
<select name="title" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr"
    dir="ltr" id="title">
    <option value="">Academic Title...</option>
    <option value="Assistant Researcher">Assistant Researcher</option>
    <option value="Assistant Lecturer">Assistant Lecturer</option>
    <option value="Lecturer">Lecturer</option>
    <option value="Assistant Professor">Assistant Professor</option>
    <option value="Professor">Professor</option>
</select>
  
      <script>
	$(document).ready(function(){
  //Chosen
  $(".limitedNumbChosen").chosen({
        max_selected_options: 10,
    placeholder_text_multiple: "Which are two of most productive days of your week"
    })
    .bind("chosen:maxselected", function (){
        window.alert("You reached your limited number of selections which is 2 selections!");
    })
});
	
	</script>
   </label>
    
    <label>
      Department
        <select name="department" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="department">
    <option value="">Department...</option>
    <option value="Basic Science">Basic Science</option>
    <option value="Prosthodontics">Prosthodontics</option>
    <option value="Periodontics">Periodontics</option>
    <option value="Oral and Maxillofacial Surgery">Oral and Maxillofacial Surgery</option>
	<option value="Oral Diagnosis">Oral Diagnosis</option>
	<option value="Orthodontics">Orthodontics</option>
	<option value="Conservative">Conservative</option>
  <option value="Pedodontics and Community Oral Health">Pedodontics and Community Oral Health</option>
</select>
      <script>
	$(document).ready(function(){
  //Chosen
  $(".limitedNumbChosen").chosen({
        max_selected_options: 10,
    placeholder_text_multiple: "Which are two of most productive days of your week"
    })
    .bind("chosen:maxselected", function (){
        window.alert("You reached your limited number of selections which is 2 selections!");
    })

});
	
	</script>
   </label>

    <label>
      Speciality
      <input type="text" name="speciality" placeholder="Orthodontics" id="speciality"/>
    </label>
    
    <!-- <label>
      Number of researches after last title
        <input type="number" min="0" max="2099" step="1" value="0" name="NoResearch" id="NoResearch"/> 
    </label> -->

    <label>
      Date of Last Academic Title
      <input type="date" name="date" placeholder="14-11-1984" id="date"/>
    </label>

    <label>
      Last promotion file
      <input type="file" id="Lastfile22" accept=".pdf" name="Lastfile22" required />
    </label>

    <label>
      High  diploma Research Title
        <input type="text" name="dresearch" placeholder="Orthodontics" value="" id="dresearch"/>
    </label>

    <label>
      Master Research Title 
      <input type="text" name="mresearch" placeholder="Orthodontics" value="" id="mresearch">
    </label>

    <label>
      PhD Research Title
      <input type="text" name="presearch" placeholder="Orthodontics" value="" id="presearch">
    </label>
    
    <label>
      Number of High Diploma Student Supervision
        <input type="number" min="0" max="2099" step="1" value="0" name="dstudent" id="dstudent"> 
    </label>
    
    <label>
      Number of MSc. Student Supervision
      <input type="number" min="0" max="2099" step="1" value="0" name="mstudent" id="mstudent"> 
    </label>
    
     <label>
      Number of PhD. Student Supervision
      <input type="number" min="0" max="2099" step="1" value="0" name="pstudent" id="pstudent"> 
    </label>


    <label>
      Google Scholar Link
      <input type="text" placeholder="www.googlescholar" name="googlescholar" id="googlescholar"> 
    </label>

    <label>
      ORCID Link
      <input type="text" placeholder="https://orcid.org/0000-0002-1825-0097" name="orcid" id="orcid"> 
    </label>

    <label>
      CV File
      <input type="file" name="CV" id="CV" accept=".pdf" required />
    </label>

</fieldset>  
 
 <?php
 $sql_select_journal="Select  * from teacher t, teacherinfo ti where t.Teacher_ID=ti.Teacher_ID and
ti.TeacherEmail in(Select TeacherEmail from teacherinfo where TeacherEmail="."'".$_SESSION['a']."')";
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
	
	if(mysqli_num_rows($result1)==0)
	{
	
	 ?>
  <fieldset class="account-action" id="dfg">
    <input class="btn" type="submit"  value="Add" id="Insertdata"/>
     <input type="reset"  value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>

	 <?php
}
	 ?>
	  
	  </form>
 
<script type="text/javascript">
	$("#Insertdata").click(function(e) {
    //alert("aaa");
e.preventDefault();
    var certificate=$("#certificate").val();
	var title=$("#title").val();
    var department=$("#department").val();
    var speciality=$("#speciality").val();
	//var NoResearch=$("#NoResearch").val();
    var date=$("#date").val();
    var dresearch=$("#dresearch").val();
	var mresearch=$("#mresearch").val();
	var presearch=$("#presearch").val();
	var mstudent=$("#mstudent").val();
	var pstudent=$("#pstudent").val();
	var dstudent=$("#dstudent").val();
  var googlescholar=$("#googlescholar").val();
  var orcid=$("#orcid").val();
  var fileInput = $('#CV')[0];
  var CV = fileInput.files[0];
  var LastfileInput = $('#Lastfile22')[0];
  var Lastfile22 = LastfileInput.files[0];
  var done=1;



  if (
    certificate === "" ||
    title === "" ||
    department === "" ||
    speciality === "" ||
  
    date === "" ||
    dresearch === "" ||
    mresearch === "" ||
    presearch === "" ||
    mstudent === "" ||
    pstudent === "" ||
    dstudent === "" ||
    Lastfile22 === "" ||
    googlescholar === "" ||
    orcid === "" ||
    CV === ""
    ) {
        alert("Please fill in all required fields.");
        return false;
    }



    var formData = new FormData();
    formData.append('done', done);
    formData.append('certificate', certificate);
    formData.append('title', title);
    formData.append('Lastfile22', Lastfile22);
    formData.append('department', department);
    formData.append('speciality', speciality);
    //formData.append('NoResearch', NoResearch);
    formData.append('date', date);
    formData.append('dresearch', dresearch);
    formData.append('mresearch', mresearch);
    formData.append('presearch', presearch);
    formData.append('mstudent', mstudent);
    formData.append('pstudent', pstudent);
    formData.append('dstudent', dstudent);
    formData.append('googlescholar', googlescholar);
    formData.append('orcid', orcid);
    formData.append('CV', CV);

   // alert(Lastfile22);

    $.ajax({
        url: "teacheraca11.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

          //alert(data);
    
            $("#msg").html(data);
            fromhide1();
        }
    });
	
	 });



	  
// AJAX code to send data to php file.
//         $.ajax({
//             type: "POST",
//             url: "teacheraca11.php",
// 			async:false,
//             data: {
// 				done:1, 
// 				certificate:certificate,
// 				title:title,
// 				department:department,
//    			    speciality:speciality,
// 				NoResearch:NoResearch,
// 				date:date,
// 				dresearch:dresearch,
// 				mresearch:mresearch,
// 				presearch:presearch,
// 				mstudent:mstudent,
// 				pstudent:pstudent,
// 				dstudent:dstudent,
//         googlescholar:googlescholar,
//         CV:CV
// 			},
//             success:function(data){
// 				$("#msg").html(data);
// 			fromhide1();
// 		}

// });
	
// 	 });
	  
function fromhide1(){
		$.ajax({
		url:"teacheracad.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
    window.location.href = "teacheracad.php";
		$('#dfg').fadeOut('slow');
		
		}
	});
	
	}
  </script>

<?php
}
	?>
</td>

	<td valign="top" id="t1">

<?php
	
	include("teacheraca11.php");
		
?>     
                                        
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
</td>
</p>
</tr>
</table>

</div>
 </body>
</html>

