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
<title>Search Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<!-- Include Chosen plugin styles -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
<link href="multiple-Select.css" rel="stylesheet" />
<link href="paging.css" rel="stylesheet" type="text/css" />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Include Chosen plugin script -->
<script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script src="multiple-Select.js"></script>
<script src="jquery.table.hpaging.min.js"></script>



<script>
    $(document).ready(function () {
        $(".limitedNumbChosen").chosen({
            max_selected_options: 10,
            placeholder_text_multiple: "Which are two of the most productive days of your week"
        }).bind("chosen:maxselected", function () {
            window.alert("You reached your limited number of selections which is 2 selections!");
        });
    });
</script>

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
	echo "<p><a href='SchoolofDentistry/index11.php'><h3>Go to Main Page</h3></a></p>";
		}

		elseif(isset($_SESSION['b'])){
			echo "<p><a href='SchoolofDentistry/checkerpage.php'><h3>Go to Main Page</h3></a></p>";
		  }
	  
		  else{
			echo "<p><a href='SchoolofDentistry/adminpage.php'><h3>Go to Main Page</h3></a></p>";
		  }
    
?>

	<p><img src="123.jpg" width="642" height="150" alt=""/></p>
<table>
 <tr>
  <td class="selection" id="selection" valign="top">
 <form method="post" action="#" id="form1" name="form1">


  <fieldset class="account-info" id="asd">
    <h2>Advance Search Engine </h2>  
     

       
       
       

        <?php
	  $i=0;
	  if(isset($_SESSION['a']))
	  {$i=1;}
	  
    if(isset($_GET['w2'])) {

			
	  ?>
          <label>


      Choose Table for search


<select name="TableType" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="TableType" onchange="showme1(<?=$i;?>)">
    
    <?php 
		if($_GET['w2']==1){
			 if(!isset($_SESSION['a'])){
			
			
		  
		?>
    <option value="" >Table Type...</option>
    <option value="1" selected>Teachers Information</option>
    <option value="2">Journal Information</option>
    <option value="3">Conference Information</option>
    <option value="4">Book Information</option>
	<option value="5">International Journal</option>

<?php 
	  }}

			elseif($_GET['w2']==2){
		?>
    <option value="" >Table Type...</option>
        <?php if(!isset($_SESSION['a'])){?>
    <option value="1">Teachers Information</option>
    <?}?>
    <option value="2" selected>Journal Information</option>
    <option value="3">Conference Information</option>
    <option value="4">Book Information</option>
	<option value="5">International Journal</option>
<?php 
	} 
	
 elseif($_GET['w2']==3){
		?>
    <option value="" >Table Type...</option>
        <?php if(!isset($_SESSION['a'])){?>
    <option value="1">Teachers Information</option>
    <?}?>
    <option value="2" >Journal Information</option>
    <option value="3" selected>Conference Information</option>
    <option value="4">Book Information</option>
	<option value="5">International Journal</option>
<?php
 } 
			elseif($_GET['w2']==4){
		?>
    <option value="" >Table Type...</option>
    <?php if(!isset($_SESSION['a'])){?>
    <option value="1">Teachers Information</option>
    <?}?>
    <option value="2" >Journal Information</option>
    <option value="3" >Conference Information</option>
    <option value="4" selected>Book Information</option>
	<option value="5">International Journal</option>
<?php }

elseif($_GET['w2']==5){
	?>
<option value="" >Table Type...</option>
<?php if(!isset($_SESSION['a'])){?>
<option value="1">Teachers Information</option>
<?}?>
<option value="2" >Journal Information</option>
<option value="3" >Conference Information</option>
<option value="4" >Book Information</option>
<option value="5" selected>International Journal</option>

	<?php
}
	else{
		?>
    <option value="" selected>Table Type...</option>
        <?php if(!isset($_SESSION['a'])){?>
    <option value="1">1Teachers Information</option>
    <?}?>
    <option value="2" >Journal Information</option>
    <option value="3" >Conference Information</option>
    <option value="4" >Book Information</option>
	<option value="5">International Journal</option>
<?}?>
     </select>

   </label>
   <?php 
	  }
	  else
	  {

	  ?>
             <label>
      Choose Table for search
<select name="TableType" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="TableType" onchange="showme1(<?=$i;?>)">
    <option value="" >Table Type...</option>
        <?php if(!isset($_SESSION['a'])){?>
    <option value="1">Teachers Information</option>
    <?}?>
    <option value="2">Journal Information</option>
    <option value="3">Conference Information</option>
    <option value="4">Book Information</option>
	<option value="5">International Journal</option>
</select>

   </label>
   <?}?>
   


      	
      	
      	
      	
       	<label>
      
     <?php if(isset($_GET['w2'])){
	$dl=$_GET['w2'];

			  ?>
			  
	
		Choose type of search
		

<select name="SearchType" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="SearchType" onchange="showme(<?=$dl;?>)">
     
	 
	 <?php
	if($_GET['w2']==1)
	{
	?>
   
   <?php
	
	if(!isset($_SESSION['a'])){
	if($_GET['w1']==1)
	{
	?>
   <option value="">Search Type...</option>
   <option value="1" selected>Author Name</option>
   <option value="5">Department</option>
   <option value="6">Academic Title</option>
   <option value="7">Speciality</option>
   
   <?php
	}
   elseif($_GET['w1']==5)
   {
	?>
    <option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="5" selected>Department</option>
    <option value="6">Academic Title</option>
    <option value="7">Speciality</option>
   <?php
   }
	elseif($_GET['w1']==6)
	{
?>
    <option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="5">Department</option>
    <option value="6" selected>Academic Title</option>
    <option value="7">Speciality</option>
<?php
	}
	elseif($_GET['w1']==7)
	{
?>
    <option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="5">Department</option>
    <option value="6">Academic Title</option>
    <option value="7" selected>Speciality</option>
  <?php
		}
	else
	{
	?>
    <option value="" selected>Search Type...</option>
    <option value="1">Author Name</option>
    <option value="5">Department</option>
    <option value="6">Academic Title</option>
    <option value="7">Speciality</option>
    
   <?php
	}
	}}
	elseif($_GET['w2']==2)
	{
	?>
   <?php
	if($_GET['w1']==1)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1" selected>Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==2)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2" selected>Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>

   <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==3)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3" selected>Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==4)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4" selected>Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
	<?php
		$_GET['w1']="";
	}
		
	elseif($_GET['w1']==8)
	{
		?>
		
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5" selected>Name and Date of publication</option>
	<option value="6">Keyword</option>
	
	<?php	
		$_GET['w1']="";
	}

	elseif($_GET['w1']==9)
	{
		?>
		
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6" selected>Keyword</option>
	<?php	
		$_GET['w1']="";
	}

	else
	{
	?>
	<option value="" selected>Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}
	}
	
	elseif($_GET['w2']==3)
	{
	?>
   <?php
	if($_GET['w1']==1)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1" selected>Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of conference</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==2)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2" selected>Research Title</option>
    <option value="3">Date of conference</option>


   <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==3)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3" selected>Date of conference</option>
    <?php
		$_GET['w1']="";
	}
	else
	{
	?>
	<option value="" selected>Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of conference</option>
    <?php
		$_GET['w1']="";
	}
	}

	elseif($_GET['w2']==4)
	{
	?>
   <?php
	if($_GET['w1']==1)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1" selected>Author Name</option>
    <option value="2">Book Title</option>
    <option value="3">Date of Publish</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==2)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2" selected>Book Title</option>
    <option value="3">Date of Publish</option>

   <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==3)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Book Title</option>
    <option value="3" selected>Date of Publish</option>
    <?php
		$_GET['w1']="";
	}
	else
	{
	?>
	<option value="" selected>Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Book Title</option>
    <option value="3">Date of Publish</option>
    <?php
		$_GET['w1']="";
	}
	}



	elseif($_GET['w2']==5)
	{
	?>
   <?php
	if($_GET['w1']==1)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1" selected>Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==2)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2" selected>Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>

   <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==3)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3" selected>Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}
	elseif($_GET['w1']==4)
	{
	?>
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4" selected>Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
	<?php
		$_GET['w1']="";
	}
		
	elseif($_GET['w1']==8)
	{
		?>
		
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5" selected>Name and Date of publication</option>
	<option value="6">Keyword</option>
	<?php	
		$_GET['w1']="";
	}


	elseif($_GET['w1']==19)
	{
		?>


		
	<option value="">Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6" selected>Keyword</option>

	<?php
		$_GET['w1']="";
	}


	else
	{
	?>
	<option value="" selected>Search Type...</option>
    <option value="1">Author Name</option>
    <option value="2">Research Title</option>
    <option value="3">Date of publication</option>
    <option value="4">Impact Factor</option>
    <option value="5">Name and Date of publication</option>
	<option value="6">Keyword</option>
    <?php
		$_GET['w1']="";
	}

	}

	else{

	}
	?>

</select>
     
   </label>
   <?php
}
	  ?>
 </fieldset>

<fieldset class="account-info" id="asd1">	 
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 <p>&nbsp;</p>
	 
	 

   <?php
	 if (isset($_GET['w1'])){
	?>

 	 <?php
	 	 if($_GET['w1']==1){
	?>
    <label id="a">
      Author Name
        <input type="text" name="AuthorName" placeholder="Miran Hikmat Mohammed" id="AuthorName" />
    </label>
<?php } 
   	 elseif($_GET['w1']==2){
		?>
    <label id="b">
        Title
      <input type="text" name="RsearchTitle" placeholder="General Dentistry" value="" id="RsearchTitle">
    </label>
<?php } 
	elseif($_GET['w1']==3)
	{
		?>
    <label id="c">
      Date of Publication
<input type="date"   placeholder="1/1/2006" value="1/1/2006"
   id="PublicationYear" name="PublicationYear"/> 
   </label>
      	<?php } 
	 elseif($_GET['w1']==4){
		?>
     <label id="d">
      Impact factor
        <input type="number" min="0" max="2099" step="0.1" value="0" placeholder="0.5"
         name="ImpactFactor" id="ImpactFactor"> 
    </label>
    <?php }
	 elseif($_GET['w1']==5){
	?>
     <label id="e">
      Department
	  <select name="Department" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr"
    dir="ltr" id="Department">

	<option value="" selected>Search Type...</option>
    <option value="Periodontics">Periodontics</option>
    <option value="Basic Science">Basic Science</option>
    <option value="Prosthodontics">Prosthodontics</option>
    <option value="Oral and Maxillofacial Surgery">Oral and Maxillofacial Surgery</option>
	<option value="Conservative">Conservative</option>
	<option value="Orthodontics">Orthodontics</option>
	<option value="Oral Diagnosis">Oral Diagnosis</option>
	<option value="Pedodontics and Community Oral Health">	
Pedodontics and Community Oral Health</option>
	 </select>
  <!-- <input type="text" name="Department" placeholder="General Dentistry" value="" id="Department"> -->
    </label>
        <?php }
	 elseif($_GET['w1']==6){
	?>
     <label id="f">
      Academic Title

	  <select name="Academic" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr"
    dir="ltr" id="Academic">
    <option value="">Academic Title...</option>
    <option value="Assistant Lecturer">Assistant Lecturer</option>
    <option value="Lecturer">Lecturer</option>
    <option value="Assistant Professor">Assistant Professor</option>
    <option value="Professor">Professor</option>
</select>


  <!-- <input type="text" name="Academic" placeholder="General Dentistry" value="" id="Academic"> -->
    </label>
        <?php }
	 elseif($_GET['w1']==7){
	?>
    <label id="g">
      Speciality
  <input type="text" name="Speciality" placeholder="General Dentistry" value="" id="Speciality">
    </label>

    <?php
	}
		 
	 elseif($_GET['w1']==8){
	?>
    <label id="h">
      Date of Publication
  <input type="number" name="year" id="year" placeholder="1/1/2006" value="1/1/2011">
    </label>

       <label id="h1">
      Name
  <input type="text" name="AuthorName" placeholder="Ahmed1" value="" id="AuthorName">
    </label>
    <?php
	}	 

	elseif($_GET['w1']==9 or $_GET['w1']==19){

?>

<label>
    Keywords
   <textarea id="multitext" name="multitext" rows="4" cols="50", placeholder="keyword1, keyword2"></textarea>
</label>

<?php

	}
		 
	 else{

echo "nothing";
	 }
	 }
	 ?>
	 
	 
	 
</fieldset>  
 
 <input type="hidden" value="<?=$i;?>" name="hdd" id="hdd"/>
 
  <fieldset class="account-action">
    <input class="btn" type="submit" value="Search" id="Insertdata1" name="Insertdata1"/>
     <input type="reset" value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>
  
</form>
</td>








<td valign="top" id="t1">

<script>

function showme(t){

if(t==2){
var SearchType = document.form1.SearchType;
var AuthorName = document.form1.AuthorName;
var RsearchTitle = document.form1.RsearchTitle;
var PublicationYear = document.form1.PublicationYear;
var ImpactFactor = document.form1.ImpactFactor;
var multitext = document.form1.multitext;

	if( SearchType.selectedIndex == 1 ) {
	var w1=1;
	 $.ajax({
    url: "Panel.php",
	type:"POST",
	data:{
		w1:1
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=1 #asd1');
//$("#asd").load('Panel.php?w1=1&w2=2 #asd');
$("#SearchType").val('1');
    }
  });
}


else if( SearchType.selectedIndex == 2 ) {
	var w1=2;
	 $.ajax({
    url: "Panel.php?w1=2",
	type:"POST",
	data:{
		w1:2
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=2 #asd1');
$("#asd").load('Panel.php?w1=2&w2=2 #asd');
    }
  });
}


else if( SearchType.selectedIndex == 3 ) {
	var w1=3;
	 $.ajax({
    url: "panel.php?w1=3",
	type:"POST",
	data:{
		w1:3
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=3 #asd1');
$("#asd").load('Panel.php?w1=3&w2=2 #asd');
    }
  });
}

else if( SearchType.selectedIndex == 4 ) {
	var w1=4;
	 $.ajax({
    url: "panel.php?w1=4",
	type:"POST",
	data:{
		w1:4
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=4 #asd1');
$("#asd").load('Panel.php?w1=4&w2=2 #asd');
    }
  });
}
	
	
else if( SearchType.selectedIndex == 5 ) {
	var w1=8;
	 $.ajax({
    url: "panel.php?w1=8",
	type:"POST",
	data:{
		w1:8
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=8 #asd1');
$("#asd").load('Panel.php?w1=8&w2=2 #asd');
    }
  });
}


else if( SearchType.selectedIndex == 6 ) {
	var w1=9;
	 $.ajax({
    url: "panel.php?w1=9",
	type:"POST",
	data:{
		w1:9
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=9 #asd1');
$("#asd").load('Panel.php?w1=9&w2=2 #asd');
    }
  });
}
	
	

else{
}	
	
}
	
	
else if(t==1){
var SearchType = document.form1.SearchType;
var AuthorName = document.form1.AuthorName;
var Department = document.form1.Department;
var Academic = document.form1.Academic;
var Speciality = document.form1.Speciality;
	
if( SearchType.selectedIndex == 1 ) {
	var w1=1;
	 $.ajax({
    url: "Panel.php",
	type:"POST",
	data:{
		w1:1
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=1 #asd1');
$("#asd").load('Panel.php?w1=1&w2=1 #asd');
    }
  });
}

	
else if( SearchType.selectedIndex == 2 ) {
	var w1=5;
	 $.ajax({
    url: "Panel.php?w1=5",
	type:"POST",
	data:{
		w1:5
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=5 #asd1');
$("#asd").load('Panel.php?w1=5&w2=1 #asd');
    }
  });
}
	
	
else if( SearchType.selectedIndex == 3 ) {
	var w1=6;
	 $.ajax({
    url: "panel.php?w1=6",
	type:"POST",
	data:{
		w1:6
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=6 #asd1');
$("#asd").load('Panel.php?w1=6&w2=1 #asd');

    }
  });
}

else if( SearchType.selectedIndex == 4 ) {
	var w1=7;
	 $.ajax({
    url: "panel.php?w1=7",
	type:"POST",
	data:{
		w1:7
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=7 #asd1');
$("#asd").load('Panel.php?w1=7&w2=1 #asd');
    }
  });
}

else{
}
}
	
else if(t==3){
var SearchType = document.form1.SearchType;
var AuthorName = document.form1.AuthorName;
var RsearchTitle = document.form1.RsearchTitle;
var PublicationYear = document.form1.PublicationYear;
	
if( SearchType.selectedIndex == 1 ) {
	var w1=1;
	 $.ajax({
    url: "Panel.php",
	type:"POST",
	data:{
		w1:1
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=1 #asd1');
$("#asd").load('Panel.php?w1=1&w2=3 #asd');
    }
  });
}

	
else if( SearchType.selectedIndex == 2 ) {
	var w1=5;
	 $.ajax({
    url: "Panel.php?w1=2",
	type:"POST",
	data:{
		w1:2
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=2 #asd1');
$("#asd").load('Panel.php?w1=2&w2=3 #asd');
    }
  });
}
	
	
else if( SearchType.selectedIndex == 3 ) {
	var w1=3;
	 $.ajax({
    url: "panel.php?w1=3",
	type:"POST",
	data:{
		w1:3
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=3 #asd1');
$("#asd").load('Panel.php?w1=3&w2=3 #asd');

    }
  });

}
else{

}
}


else if(t==5){
var SearchType = document.form1.SearchType;
var AuthorName = document.form1.AuthorName;
var RsearchTitle = document.form1.RsearchTitle;
var PublicationYear = document.form1.PublicationYear;
var ImpactFactor = document.form1.ImpactFactor;
var multitext = document.form1.multitext;

	if( SearchType.selectedIndex == 1 ) {
	var w1=1;
	 $.ajax({
    url: "Panel.php",
	type:"POST",
	data:{
		w1:1
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=1 #asd1');
//$("#asd").load('Panel.php?w1=1&w2=5 #asd');
$("#SearchType").val('1');
    }
  });
}

	
else if( SearchType.selectedIndex == 2 ) {
	var w1=2;
	 $.ajax({
    url: "Panel.php?w1=2",
	type:"POST",
	data:{
		w1:2
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=2 #asd1');
$("#asd").load('Panel.php?w1=2&w2=5 #asd');
    }
  });
}
	
	
else if( SearchType.selectedIndex == 3 ) {
	var w1=3;
	 $.ajax({
    url: "panel.php?w1=3",
	type:"POST",
	data:{
		w1:3
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=3 #asd1');
$("#asd").load('Panel.php?w1=3&w2=5 #asd');

    }
  });

}

else if( SearchType.selectedIndex == 4 ) {
	var w1=4;
	 $.ajax({
    url: "panel.php?w1=4",
	type:"POST",
	data:{
		w1:4
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=4 #asd1');
$("#asd").load('Panel.php?w1=4&w2=5 #asd');

    }
  });

}
	
	
else if( SearchType.selectedIndex == 5 ) {
	var w1=8;
	 $.ajax({
    url: "panel.php?w1=8",
	type:"POST",
	data:{
		w1:8
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=8 #asd1');
$("#asd").load('Panel.php?w1=8&w2=5 #asd');

    }
  });
}

  else if( SearchType.selectedIndex == 6 ) {
	var w1=19;
	 $.ajax({
    url: "panel.php?w1=19",
	type:"POST",
	data:{
		w1:19
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=19 #asd1');
$("#asd").load('Panel.php?w1=19&w2=5 #asd');

    }
  });

}
	
else{
}
}



else if(t==4){
var SearchType = document.form1.SearchType;
var AuthorName = document.form1.AuthorName;
var RsearchTitle = document.form1.RsearchTitle;
var PublicationYear = document.form1.PublicationYear;
	
if( SearchType.selectedIndex == 1 ) {
	var w1=1;
	 $.ajax({
    url: "Panel.php",
	type:"POST",
	data:{
		w1:1
	},
    success: function(data){
$("#asd1").load('Panel.php?w1=1 #asd1');
$("#asd").load('Panel.php?w1=1&w2=4 #asd');
    }
  });
}

	
else if( SearchType.selectedIndex == 2 ) {
	var w1=2;
	 $.ajax({
    url: "Panel.php?w1=2",
	type:"POST",
	data:{
		w1:2
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=2 #asd1');
$("#asd").load('Panel.php?w1=2&w2=4 #asd');
    }
  });

}
	
	
else if( SearchType.selectedIndex == 3 ) {
	var w1=3;
	 $.ajax({
    url: "panel.php?w1=3",
	type:"POST",
	data:{
		w1:3
	},
    success: function(data){

$("#asd1").load('Panel.php?w1=3 #asd1');
$("#asd").load('Panel.php?w1=3&w2=4 #asd');

    }
  });

}	
	
	
else{
}
}

else{
}
	
}


	
</script>






<script>
function showme1(n){

var TableType = document.form1.TableType;

if( TableType.selectedIndex == 1-n ) {
	var w2=1;
	var aa=1;
	 $.ajax({
    url: "teacheraca11.php",
	type:"POST",
	data:
		 {
		aa:aa,
		w2:1	 
		 },
    success: function(data){
      $("#t1").load("teacheraca11.php");
	  $("#asd").load('Panel.php?w2=1 #asd');
    }
  });
		
}



else if( TableType.selectedIndex == 2-n ) {
	var w2=2;
	$.ajax({
    url: "journalteach11.php",
		data:
		 {
		w2:2	 
		 },
    success: function(data){
      $("#t1").load("journalteach11.php?cv=1");
	$("#asd").load('Panel.php?w2=2 #asd');
    }
  });
}


else if( TableType.selectedIndex == 3-n ) {
	var w2=3;
		 $.ajax({
    url: "conferenceinfo11.php",
	method: "POST",
			 	data:
		 {
		w2:3,	 
		 },
    success: function(data){
      $("#t1").load("conferenceinfo11.php?cv=1");
   	  $("#asd").load('Panel.php?w2=3 #asd');
    }
  });
}


else if( TableType.selectedIndex == 4-n ) {
	var w2=4;
		 $.ajax({
    url: "bookinfo11.php",
			 	data:
		 {
		w2:4	 
		 },
    success: function(data){
      $("#t1").load("bookinfo11.php?cv=1");
 	  $("#asd").load('Panel.php?w2=4 #asd');
    }
  });
}

else if( TableType.selectedIndex == 5-n ) {
	var w2=5;
		 $.ajax({
    url: "internationaljournal11.php",
			 	data:
		 {
		w2:5	 
		 },
    success: function(data){
      $("#t1").load("internationaljournal11.php?cv=1");
 	  $("#asd").load('Panel.php?w2=5 #asd');
    }
  });
}


else
	{
		
	}


	return w2;
}

</script>



























<script type="text/javascript">

	
	$(function() {
		
$("#Insertdata1").click(function(e) {
e.preventDefault();
var hdd=$("#hdd").val();
var TableType = document.form1.TableType;
var SearchType = document.form1.SearchType;
	
//Conference Table
if( TableType.selectedIndex == 3-hdd ) {

//Author Name
if( SearchType.selectedIndex == 1 ) {	
var AuthorName=$("#AuthorName").val();
$.ajax({
            type: "POST",
            url: "conferenceinfo11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName:AuthorName
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		}
	});
	
	}
	}

//Research Title
else if( SearchType.selectedIndex == 2 ) {
var RsearchTitle=$("#RsearchTitle").val();
$.ajax({
            type: "POST",
            url: "conferenceinfo11.php",
			async:false,
            data: {
				aa:1, 
				RsearchTitle:RsearchTitle
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}

// Publication year	
else if( SearchType.selectedIndex == 3 ) {
var PublicationYear=$("#PublicationYear").val();
$.ajax({
            type: "POST",
            url: "conferenceinfo11.php",
			async:false,
            data: {
				aa:1, 
				PublicationYear:PublicationYear
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
	
	
	else{
		
	}
		
}
////////////////////////////////////////////////////////////////////////////////


	//Journal
	else if( TableType.selectedIndex == 2-hdd ) {
		//Author Name
	if( SearchType.selectedIndex == 1 ) {
	
var AuthorName=$("#AuthorName").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName:AuthorName
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		}
	});
	
	}
	}

//Research Title
else if( SearchType.selectedIndex == 2 ) {
var RsearchTitle=$("#RsearchTitle").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				RsearchTitle:RsearchTitle
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}

	//Publication Year
	else if( SearchType.selectedIndex == 3 ) {
var PublicationYear=$("#PublicationYear").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				PublicationYear:PublicationYear
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
	
		//Publication Impact factor
	else if( SearchType.selectedIndex == 4 ) {
var ImpactFactor=$("#ImpactFactor").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				ImpactFactor:ImpactFactor
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
		
else if(SearchType.selectedIndex == 5) {
var AuthorName=$("#AuthorName").val();
var year=$("#year").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName1:AuthorName,
				year1:year
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}


	else if(SearchType.selectedIndex == 6) {
var multitext=$("#multitext").val();
var year=$("#year").val();
$.ajax({
            type: "POST",
            url: "journalteach11.php",
			async:false,
            data: {
				aa:1, 
				multitext:multitext,
				//year1:year you can put multi and search from both send data
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
		
		
	
		
	
	else{
		
	}
								   

	}




//International
else if( TableType.selectedIndex == 5-hdd ) {
		//Author Name
	if( SearchType.selectedIndex == 1 ) {
	
var AuthorName=$("#AuthorName").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName:AuthorName
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		}
	});
	
	}
	}

//Research Title
else if( SearchType.selectedIndex == 2 ) {
var RsearchTitle=$("#RsearchTitle").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				RsearchTitle:RsearchTitle
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}

	//Publication Year
	else if( SearchType.selectedIndex == 3 ) {
var PublicationYear=$("#PublicationYear").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				PublicationYear:PublicationYear
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
	
		//Publication Impact factor
	else if( SearchType.selectedIndex == 4 ) {
var ImpactFactor=$("#ImpactFactor").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				ImpactFactor:ImpactFactor
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}
		
else if(SearchType.selectedIndex == 5) {
var AuthorName=$("#AuthorName").val();
var year=$("#year").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName1:AuthorName,
				year1:year
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}


	else if(SearchType.selectedIndex == 6) {
var multitext=$("#multitext").val();
var year=$("#year").val();
$.ajax({
            type: "POST",
            url: "internationaljournal11.php",
			async:false,
            data: {
				aa:1, 
				multitext:multitext,
				//year1:year
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}





		
		
	
		
	
	else{
		
	}
								   

	}
//////////////////////////////////////////////////////////////////////////////////////










//////////////////////////////////////////////////////////////////////////////////////
		//book

	else if( TableType.selectedIndex == 4-hdd) {
	if( SearchType.selectedIndex == 1 ) {
	
var AuthorName=$("#AuthorName").val();
$.ajax({
            type: "POST",
            url: "bookinfo11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName:AuthorName
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		}
	});
	
	}
	}

//Research Title
else if( SearchType.selectedIndex == 2 ) {
var RsearchTitle=$("#RsearchTitle").val();
$.ajax({
            type: "POST",
            url: "bookinfo11.php",
			async:false,
            data: {
				aa:1, 
				RsearchTitle:RsearchTitle
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}

	//Publication Year
else if( SearchType.selectedIndex == 3 ) {
var PublicationYear=$("#PublicationYear").val();
$.ajax({
            type: "POST",
            url: "bookinfo11.php",
			async:false,
            data: {
				aa:1, 
				PublicationYear:PublicationYear
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
}
	else{
		
	}
								   

	}

///////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Teacher

	else if( TableType.selectedIndex == 1-hdd ) {
		
if( SearchType.selectedIndex == 1 ) {
	
var AuthorName=$("#AuthorName").val();
$.ajax({
            type: "POST",
            url: "teacheraca11.php",
			async:false,
            data: {
				aa:1, 
				AuthorName:AuthorName
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		}
	});
	
	}
	}

//Research Title
else if( SearchType.selectedIndex == 2 ) {
var Department=$("#Department").val();
$.ajax({
            type: "POST",
            url: "teacheraca11.php",
			async:false,
            data: {
				aa:1, 
				Department:Department
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
	}

	//Publication Year
else if( SearchType.selectedIndex == 3 ) {
var Academic=$("#Academic").val();
$.ajax({
            type: "POST",
            url: "teacheraca11.php",
			async:false,
            data: {
				aa:1, 
				Academic:Academic
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
}
		
		
else if( SearchType.selectedIndex == 4 ) {
var Speciality=$("#Speciality").val();
$.ajax({
            type: "POST",
            url: "teacheraca11.php",
			async:false,
            data: {
				aa:1, 
				Speciality:Speciality
			},
	success:function(data){
		$('#t1').html(data);
		fromhide1();
		}
});								   
function fromhide1(){
		$.ajax({
		url:"Panel.php",
		type:"POST",
		async:false,
		success:function(data){
		
		}
	});
	
	}
}	
		
	else{
		
	}


	}
	
		else{
			
		}
		
	//Speciality
});
	});



	
</script>
</td>



















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

<script>
    $(document).ready(function () {
        $(".limitedNumbChosen").chosen({
            max_selected_options: 10,
            placeholder_text_multiple: "Which are two of the most productive days of your week"
        }).bind("chosen:maxselected", function () {
            window.alert("You reached your limited number of selections which is 2 selections!");
        });
    });
</script>



</tr>
</table>

</body>

</html>


