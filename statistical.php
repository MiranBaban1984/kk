
<html lang="en">
<head>

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



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<link href="paging.css" rel="stylesheet" type="text/css"/>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<body>
<div align="right">
<?php
	if(isset($_SESSION['a'])){
	echo "<p> <h3>Your login with ".$_SESSION['TeacherName']."</h3></p>";
		}

    else{
      echo "<p><h3>Your login with   ".$_SESSION['checker']."</h3></p>";
    }
    
?>
     
     <p><h3><a href='sesdestroy.php'>logout</a></h3></p>
</div>
	
<div align="left">
<?php
if(isset($_SESSION['a'])){
	echo "<p><a href='SchoolofDentistry/index11.php'><h3>Go to Main Page</h3></a></p>";
		}

    else{
      echo "<p><a href='SchoolofDentistry/checkerpage.php'><h3>Go to Main Page</h3></a></p>";
    }
    
?>
</div>
<br/>

<br/>



    <?php include("charts11/b.php"); ?>


<hr/>

    <?php include("charts11/a.php"); ?>

<hr/>


    <?php include("charts11/c.php"); ?>


    <hr/>


<?php include("charts11/e.php"); ?>

</body>
</html>






