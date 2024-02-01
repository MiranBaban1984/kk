<?php
include("connection.php");
?>
<html>
<head>
<title>Journal Details Form Insertion</title>
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
<link href="multiple-Select.css" rel="stylesheet"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
<link href="paging.css" rel="stylesheet" type="text/css"/>
<link rel="sylesheet" href="https://maxcdn.bootstarp.com/bootstrap/3.3.6/css/bootsrapt/.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstarpcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="jquery-3.3.1.min.js"></script>
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
	echo "<p> <h3>Your login with ".$_SESSION['TeacherName']."</h3> </p>";
		}

    elseif(isset($_SESSION['b'])){
      echo "<p> <h3>Your login with   ".$_SESSION['checker']."<h3> </p>";
    }

    else{
      echo "<p> <h3>Your login with   ".$_SESSION['admins']."<h3> </p>";
    }
    
?>
     
     <p><h3><a href='sesdestroy.php'>logout</a></h3></p>
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



<img src="123.jpg" width="642" height="150" alt=""/></div></p>

<div align="left">

<table>
	<tr>
    <td>
	  <p id="ss1" class="ss1">
	  <?php
	
if(!isset($_GET['q123']) && !isset($_SESSION['b']) && !isset($_SESSION['admins'])){
 ?>
<td class="selection" id="selection">
  <form  id="loginForm" name="loginForm" action="#" method="post">
	  <fieldset class="account-info">
   <legend>
   <h2>Local Journal Details Insertion Form</h2>
   </legend>
   

   <label>
      Paper Type
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="papertype" name="papertype" required>
<option value="Original Article">Original Article</option>
<option value="Review Article">Review Article</option>
<option value="Systematic Review">Systematic Review</option>
<option value="Case Series">Case Series</option>
<option value="Case Report">Case Report</option>
			</select>
    </label>


    <label>
      Paper Title
        <input type="text" placeholder="ICET (Internation conference Electronical Technology)" id="papertitle" required name="papertitle" />
    </label>
          
              <label>
              Order of Author Place
      <input type="number" required min="0" max="1000" step="1" value="0"  id="authorplace" name="authorplace" required/>
   </label>



    <script>
	$(document).ready(function(){
  //Chosen

  $(".limitedNumbChosen").chosen({
    max_selected_options: 10,
    placeholder_text_multiple: "Choose Author/s"
    })
    .bind("chosen:maxselected", function (){
        window.alert("You reached your limited number of selections which is 10 selections!");
    })
});
	
	</script>
      
        <label>
      Journal Fullname
        <input type="text"  placeholder="International journal of Informatic" id="journalname" name="journalname" required />
    </label>

    <label>
      Publisher (Organization)
        <input type="text"  placeholder="Springer" id="publisher" name="publisher" required />
    </label>
    
    <label>
      Date of Publication
<input type="date" name="journalyear" placeholder="14-11-1984" id="journalyear"/> 

   </label>
   
    <label>
    Impact Factor
<input type="number" min="0.0" max="1000" step="0.1" value="0"  id="IF" name="IF" required /> 

   </label>


   <label>
    Keywords
   <textarea id="multitext" name="multitext" rows="4" cols="50", placeholder="keyword1, keyword2"></textarea>
</label>
   
       <label>
      Volume 
<input type="number" min="1" max="1000" step="1" value="1"  id="vol" name="vol" required /> 
    </label>
          
     <label>
      Issue
<input type="number" min="1" max="1000" step="1" value="1" id="no" name="no" required /> 
    </label>
   
        <label>
      Number of Pages
<input type="text" placeholder="21 - 32" id="pages" name="pages" required /> 

    </label>
   
        <label>
    Scientific Registeration Date
<input type="date" placeholder="14-11-1984"  id="sciregister" name="sciregister" required /> 
    </label>

         <label>
     Ethical Reference Date
<input type="date" placeholder="14-11-1984"  id="ethical" name="ethical" required /> 
    </label>
   
      
         <label>
     Ethical Reference Number
<input type="text" placeholder="17/59/1234"  id="ethicalno" name="ethicalno" required /> 
    </label>
   


        <label>
      DOI(If present)
      <input type="text" name="doi" placeholder="ICET/1254/ICETJ1" value="" id="doi" name="doi" required />
    </label>
    
        <label>
        Publication link
      <input type="text" name="weblink" placeholder="http://www.example.com" value="" id="weblink" name="weblink" required />
    </label>

        <label>
         Paper File (PDF File. Max 10MB)
      <input type="file" name="file" id="file" accept=".pdf" name="file" required />
    </label>

    <label>
     Ethic file (PDF File. Max 10MB)
      <input type="file" name="Ethicfile" id="Ethicfile" accept=".pdf" name="Ethicfile" required />
    </label>

</fieldset>  
			
			
  <fieldset class="account-action">
    <input class="btn" type="submit" value="Add" id="Insertdata" name="Insertdata"/>
     <input type="reset"  value="Clear All" class="btn" id="clear" onClick="Reset()">
  </fieldset>

</form>


<script type="text/javascript">

	$("#Insertdata").click(function(e) {

e.preventDefault();

    var authorplace=$("#authorplace").val();
    var papertitle=$("#papertitle").val();
    var sciregister=$("#sciregister").val();
    var ethical=$("#ethical").val();
	var journalname=$("#journalname").val();
    var journalyear=$("#journalyear").val();
    var IF=$("#IF").val();
	var vol=$("#vol").val();
    var no=$("#no").val();
    var pages=$("#pages").val();
	var doi=$("#doi").val();
	var weblink=$("#weblink").val();
	var ethicalno=$("#ethicalno").val();
  var publisher=$("#publisher").val();
  var papertype=$("#papertype").val();
  var multitext=$("#multitext").val();
  var fileInput = $('#file')[0];
  var file = fileInput.files[0];
  var EthicfileInput = $('#Ethicfile')[0];
  var Ethicfile = EthicfileInput.files[0];
	var dn=1;


  if (
        papertitle === "" ||
        authorplace === "" ||
        journalname === "" ||
        publisher === "" ||
        journalyear === "" ||
        IF === "" ||
        vol === "" ||
        no === "" ||
        pages === "" ||
        sciregister === "" ||
        ethical === "" ||
        ethicalno === "" ||
        doi === "" ||
        weblink === "" ||
        file === "" ||
        multitext === "" ||
        Ethicfile === ""
    ) {
        alert("Please fill in all required fields.");
        return false;
    }



  var formData = new FormData();
    formData.append('dn', dn);
    formData.append('authorplace', authorplace);
    formData.append('papertitle', papertitle);
    formData.append('sciregister', sciregister);
    formData.append('ethical', ethical);
    formData.append('journalname', journalname);
    formData.append('journalyear', journalyear);
    formData.append('IF', IF);
    formData.append('vol', vol);
    formData.append('no', no);
    formData.append('pages', pages);
    formData.append('doi', doi);
    formData.append('weblink', weblink);
    formData.append('publisher', publisher);
    formData.append('file', file);
    formData.append('papertype', papertype);
    formData.append('multitext',multitext);
    formData.append('Ethicfile', Ethicfile);
    formData.append('ethicalno', ethicalno);


    $.ajax({
        url: "journalteach11.php",
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
		url:"journalteachinsert.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('journalteach11.php').fadeIn("slow");
		fromhide2();
		}
	});
	
	}

	function fromhide2(){
		$.ajax({
		url:"journalteachinsert.php",
		type:"POST",
		async:false,
		success:function(data){
			document.getElementById("loginForm").reset();
			$("#loginForm")[0].reset();
		}
	});
	
	}
	    function Reset() {
			$("#msg").html(data);
      document.getElementById("loginForm").reset();

    }
	
	
  </script>
    <?php
	}
	?>
  
</td>

	<td valign="top" id="t1">

<?php
	
	include("journalteach11.php");
		
				?>

<script type="text/javascript">
        $(function () {
            $("#table1").hpaging({ "limit": 2 });
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

</div>
	
					
</td>
</tr>
</table>
 </body>
</html>


