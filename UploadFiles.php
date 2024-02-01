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
<title> Scientific Committee Upload Files</title>

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
if(!isset($_GET['q1']) && !isset($_SESSION['b']) && isset($_SESSION['admins'])){
?>
<td class="selection" id="selection">
 <form method="post" action="#" id="loginForm" enctype="multipart/form-data">
  <fieldset class="account-info">
   <legend><h2>Teacher Details Form Insertion</h2></legend>


    <label>
      Research Paper Registeration Form
      <input type="file" name="paper" id="paper" accept=".pdf, .docx" required />
    </label>

    <label>
      Msc - Template
      <input type="file" name="msc" id="msc" accept=".pdf, .docx" required />
    </label>

    <label>
    PhD - Template
      <input type="file" name="phd" id="phd" accept=".pdf, .docx" required />
    </label>


    <label>
    Undergraduate Template
      <input type="file" name="under" id="under" accept=".pdf, .docx" required />
    </label>

    <label>
    Research Proposal Template
      <input type="file" name="proposal" id="proposal" accept=".pdf, .docx" required />
    </label>

</fieldset>  
 


  <fieldset class="account-action" id="dfg">
    <input class="btn" type="submit"  value="Add" id="Insertdata"/>
     <input type="reset"  value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>


	  
	  </form>
 
<script type="text/javascript">
	$("#Insertdata").click(function(e) {
   // alert("aaa");
e.preventDefault();

  var fileInput = $('#under')[0];
  var under = fileInput.files[0];

  var LastfileInput = $('#paper')[0];
  var paper = LastfileInput.files[0];

  var LastfileInput = $('#msc')[0];
  var msc = LastfileInput.files[0];

  var LastfileInput = $('#phd')[0];
  var phd = LastfileInput.files[0];

  var LastfileInput = $('#proposal')[0];
  var proposal = LastfileInput.files[0];

  var done=1;



  if (
    under === "" ||
    msc === "" ||
    phd === "" ||
    proposal === "" ||
    paper === ""
    ) {
        alert("Please fill in all required fields.");
        return false;
    }



    var formData = new FormData();
    formData.append('done', done);
    formData.append('under', under);
    formData.append('paper', paper);
    formData.append('msc', msc);
    formData.append('phd', phd);
    formData.append('proposal', proposal);


    $.ajax({
        url: "UploadFiles11.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {


    
            $("#msg").html(data);
            fromhide1();
        }
    });
	
	 });


	  
function fromhide1(){
		$.ajax({
		url:"UploadFiles.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('UploadFiles11.php').fadeIn("slow");
    window.location.href = "UploadFiles.php";
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
	
	include("UploadFiles11.php");
		
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

