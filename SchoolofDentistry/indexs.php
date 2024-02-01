<?php
include("../connection.php");
?>
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
<title>Login Form</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="multiple-Select.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
 <link href="paging.css" rel="stylesheet" type="text/css"/>

 <script src="jquery-3.3.1.min.js"></script>


</head>
<body>
<div align="center" id="logining">
<p align="center"><img src="123.jpg" width="607" height="150" alt=""/></p>
<table align="center">
	<tr>
  	  <td class="selection">
	  <form id="loginForm" method="post" action="test.php">
  <fieldset class="account-info">
   <legend>
   <h2 align="center">Teacher Login</h2>
   </legend>
   
   		<?php
				if(isset($_GET['c'])){
					echo "<lable>".$_GET['c']."</label>";
				}
				?>
   
   
   <label>
     Email Address
     <input type=email name="email" placeholder="name@domain.com" id="email" formnovalidate required />
  </label>

    
        <label>
      Password
      <input type=password name="password" placeholder="****" id="password" formnovalidate required />
    </label>


        <label>
      <input type="hidden" value="zz" id="zz1" name="zz1"/>
    </label>


  </fieldset>  
 
  <fieldset class="account-action">
    <input class="btn" type="submit" value="Login as member" id="loginss">
    <input type="reset" value="Clear All" class="btn" id="clear" onClick="Reset()"/> 
  </fieldset>
</form>

</td>

</tr>
</table>
<a href=../index.php>Go back to home page</a>
</div>
</body>
</html>


