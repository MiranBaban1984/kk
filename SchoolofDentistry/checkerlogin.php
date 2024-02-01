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
<p align="center"><img src="123.jpg" width="607" height="150" alt=""/></p>
<p align="center">&nbsp;</p>
<div align="center">
<table align="center">
	<tr>
	  <p id="ss1" class="ss1">
	  <td class="selection" id="selection1">
	  <form id="loginForm" enctype="multipart/form-data" method="post" action="testchecker.php">
  <fieldset class="account-info">
   <legend>
   <h2 align="center">Branch Checker  Login</h2>
   </legend>
   
   		<?php
				if(isset($_GET['c'])){
					echo "<lable>".$_GET['c']."</label>";
				}
				?>
   
   
   <label>
     Email Address
     <input type=email name="email" placeholder="name@domain.com" id="email" formnovalidate />
  </label>

    
        <label>
      Password
      <input type=password name="password" placeholder="****" id="password" formnovalidate />
    </label>
        <label>
          <input type="hidden" id="hid" name="login" value="hid"/>
  </label>


  </fieldset>  
 
  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Login as member" id="login"/>
      <input type="reset"  value="Clear All" class="btn" id="clear" onClick="Reset()"> 
     <!-- <input type="button" value="Register as new user" class="btn" id="register" name="register"> -->
  </fieldset>
</form>
</td>

<script type="text/javascript">
 
$("#register").click(function(e) {
e.preventDefault();
    var register=$("#register").val();
	  
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "register.php",
			async:false,
            data: {
				done:1,
				register:register
			},
            success:function(data){
			$('#selection1').fadeOut('slow').load('register.php #selection11').fadeIn("slow");
		}
});
	
	 });
	
  </script>

<script type="text/javascript">
 

$("#Insertdata").click(function(e) {
e.preventDefault();
    

    var email=$("#email").val();
    var password=$("#password").val();

	  
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "teacher11.php",
			async:false,
            data: {
				done:1, 
				email:email,
				password:password
			},
            success:function(data){
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
		}
	});
	
	}
	    function Reset() {
//$('#country').find('option').prop("selected", false);
			$('#bookauthor').val('').trigger('chosen:updated');
			$('#publicationplace').val('').trigger('chosen:updated');
    }
	
  </script>



</p>
</tr>
</table>
<a href=../index.php>Go back to home page</a>
</div>
</body>
</html>


