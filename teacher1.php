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
<img src="123.jpg" width="642" height="150" alt=""/>

<div align="left">
<table>
	<tr>
	  <p id="ss1" class="ss1">
	    <?php		
if(!isset($_GET['q1'])){
?>
<td class="selection" id="selection">
 <form method="post" action="#" id="loginForm">
  <fieldset class="account-info">
   <legend><h2>Teacher Details Form Insertion</h2></legend>
    <label>
      Full Name
      <input type="text" name="fullname" placeholder="Miran Hikmat Mohammed" id="fullname" />
    </label>
       
    <label>
      Email Address
      <input type="text" name="email" placeholder="name@domain.com" id="email" />
    </label>
    
    <label>
      Mobile Number
      <input type="text" name="mobile" placeholder="(+964)-7701547929" id="mobile">
    </label>
    
    <label>
      Last Certificate
<select name="certificate" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="certificate">
    <option value="">Certificate...</option>
    <option value="High Diploma Certificate">High Diploma Certificate</option>
    <option value="Master of Science Certificate">Master of Science Certificate</option>
    <option value="Doctor of Philosophy Certificate">Doctor of Philosophy Certificate</option>
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
    <option value="Prosthetic">Prosthodontics</option>
    <option value="Periodontic">Periodontics</option>
    <option value="Oral Surgery">Oral and Maxillofacial Surgery</option>
	<option value="Oral Diagnosis">Oral Diagnosis</option>
	<option value="P.O.P">P.O.P</option>
	<option value="P.O.P">Conservative</option>
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
    
    <label>
      Number of researches after last title
        <input type="number" min="0" max="2099" step="1" value="0" name="NoResearch" id="NoResearch"/> 
    </label>

    <label>
      Date of Last Title
      <input type="date" name="date" placeholder="14-11-1984" id="date"/>
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
</fieldset>  
 
  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Insert Data" id="Insertdata"/>
     <input type="reset"  value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>
</form>
 
<script type="text/javascript">
	$("#Insertdata").click(function(e) {
e.preventDefault();
    var fullname=$("#fullname").val();
    var email=$("#email").val();
    var mobile=$("#mobile").val();
    var certificate=$("#certificate").val();
	var title=$("#title").val();
    var department=$("#department").val();
    var speciality=$("#speciality").val();
	var NoResearch=$("#NoResearch").val();
    var date=$("#date").val();
    var dresearch=$("#dresearch").val();
	var mresearch=$("#mresearch").val();
	var presearch=$("#presearch").val();
	var mstudent=$("#mstudent").val();
	var pstudent=$("#pstudent").val();
	var dstudent=$("#dstudent").val();
	  
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "teacher11.php",
			async:false,
            data: {
				done:1, 
				fullname:fullname,
				email:email,
				mobile:mobile,
				certificate:certificate,
				title:title,
				department:department,
   			    speciality:speciality,
				NoResearch:NoResearch,
				date:date,
				dresearch:dresearch,
				mresearch:mresearch,
				presearch:presearch,
				mstudent:mstudent,
				pstudent:pstudent,
				dstudent:dstudent
			},
            success:function(data){
				$("#msg").html(data);
			fromhide1();
		}

});
	
	 });
	  
function fromhide1(){
		$.ajax({
		url:"teacher1.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('teacher11.php').fadeIn("slow");
	    //$("#journalauthor").multiSelect("clearSelection");
        //$("#journalauthor").multiSelect( 'refresh' );
		
		fromhide2();
		}
	});
	
	}
	
	function fromhide2(){
		$.ajax({
		url:"teacher1.php",
		type:"POST",
		async:false,
		success:function(data){
			document.getElementById("loginForm").reset();
			$("#loginForm")[0].reset();
			$("form").trigger("reset");
	//$('#journalauthor').fadeOut('slow');
	//$('#journalauthor').fadeOut('slow').load('journal_insert.php #limitedNumbChosen').fadeIn("slow");

		}
	});
	
	}
	
	    function Reset() {
//$('#country').find('option').prop("selected", false);
		//	$('#journalauthor').val('').trigger('chosen:updated');
		//	$('#country').val('').trigger('chosen:updated');
    }
  </script>

<?php
}
	?>
</td>

	<td valign="top" id="t1">

<?php
	
	include("teacher11.php");
		
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


