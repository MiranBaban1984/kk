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
	echo "<p> <h3>Your login with ".$_SESSION['a']."<h3> </p>";
		}
?>
     
     <p><a href='sesdestroy.php'>logout</a></p>
     </div>
	
	

<img src="123.jpg" width="642" height="150" alt=""/>

<div align="left">
<table>
	<tr>
	  <p id="ss1" class="ss1">
	    <?php		
if(!isset($_GET['q1']) && !isset($_SESSION['b'])){
?>
<td class="selection" id="selection">
 <form method="post" action="#" id="loginForm">
  <fieldset class="account-info">
   <legend>
   <h2>Teacher Basic Information</h2>
   </legend>
    <label>
      Full Name
      <input type="text" name="fullname" placeholder="Miran Hikmat Mohammed" id="fullname" />
    </label>
       
    <label>
      Email Address
      <input type="text" name="email" placeholder="name@domain.com" id="email" />
    </label>
    
       <label>
Password
    <input type="password" name="password" placeholder="******" id="password">
    </label>
    
    <label>
      Mobile Number
      <input type="text" name="mobile" placeholder="(+964)-7701547929" id="mobile">
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
	  
        $.ajax({
            type: "POST",
            url: "teacheraca11.php",
			async:false,
            data: {
				done:1, 
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
		url:"teacheracad.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
	    //$("#journalauthor").multiSelect("clearSelection");
        //$("#journalauthor").multiSelect( 'refresh' );
		
		fromhide2();
		}
	});
	
	}
	
	function fromhide2(){
		$.ajax({
		url:"teacheracad.php",
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
	
  </script>

<?php
}
	?>
</td>

	<td valign="top" id="t1">

<?php
	
	include("teacherinfo11.php");
		
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


