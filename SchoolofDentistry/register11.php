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
<title>Registeration Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="multiple-Select.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
<link href="paging.css" rel="stylesheet" type="text/css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="multiple-Select.js"></script>
<script src="jquery.table.hpaging.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>


</head>
<body>
<div align="center" id="registery">
<p align="center"><img src="123.jpg" width="607" height="150" alt=""/></p>

<table align="center">
	<tr>

	  <td class="selection">

	  <form method="post" action="#" id="loginForm">
  <fieldset class="account-info">
   <legend>
   <h2 align="center">Register Login</h2>
   </legend>
   
          <label>
     Email Address
     
        		<?php
				if(isset($_GET['d'])){
					echo "<lable>".$_GET['d']."</label>";
				}
				?>
     
     <?php
				if(isset($_SESSION['nnn'])){
          $a=$_SESSION['nnn'];
					echo "<font color='red'><lable>".$a."</label></font>";
          unset($_SESSION['nnn']);
				}
				?>
     
     <input type=email name="email" placeholder="name@domain.com" id="email" pattern=".+@univsul\.edu\.iq" formnovalidate required />
</label>
     
   <label>
      Password
      <input type=password name="password" placeholder="****" id="password" formnovalidate required />
    </label>
     
      <label>
     Full Name
     <input type=text name="fullname" placeholder="XXXXX XXXX XXXX" id="fullname" formnovalidate required />
</label>
  
     <label>
     Mobile
     <input type=tel name="mobile" placeholder="0096477015xxxx" id="mobile" formnovalidate required />
</label>

  </fieldset>  
 
  <fieldset class="account-action">
    <input class="btn" type="button"  value="Register" id="logins11" name="logins11">
     <input type="reset" value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>

</form>


<script type="text/javascript">
$("#logins11").click(function(e) {
e.preventDefault();
    var email=$("#email").val();
    var password=$("#password").val();
    var fullname=$("#fullname").val();
    var mobile=$("#mobile").val();
    var isValid = $("#email")[0].checkValidity();


    if (
      email === "" || 
      password === "" ||  
      fullname === "" ||  
      mobile ===  ""
    ) {
        alert("Please fill in all the required fields.");
        return false;
    }

    if (!isValid) {
  alert('Please enter a valid email address with the domain @univsul.edu.iq');
  return false;
}


	  
// AJAX code to send data to php file.
                    $.ajax({
                        type:"POST",
                        url:'../teacher_register.php',
                        dataType: "json",
						// async:false,
            data:{
				done:1, 
				email:email,
				password:password,
				fullname:fullname,
				mobile:mobile
			},
      success: function(response) {
                    if (response.status === "success") {
                        alert(response.message);
                        //window.location.href = "../teacheracad.php"; // Redirect to login page on success
                        window.open('../teacheracad.php', '_blank');
                    } else {
                        alert(response.message);
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while processing your request.");
                },
              });
            
            });

        // $('#registery').fadeOut('slow').load('../teacheracad.php').fadeIn("slow");


  </script>
</td>



</tr>
</table>
	<a href=index.php>Go back to home page</a>
</div>
</body>
</html>


