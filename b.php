<?php
include("connection.php"); 
?>

<body>
<?php
if(isset($_GET['q1']))
{
$sql123="Select  * from teacher where TeacherID="."'".$_GET['q1']."'";
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>
<form  id="message11" name="loginForm" action="#">
  <fieldset class="account-info">
   <legend><h2>Author Details Form Insertion</h2></legend>
    <label>
      Full Name
      <input type="text" name="FullName" placeholder="Miran Hikmat Mohammed" 
      value='<?php echo $row123['FullName'];?>' id="FullName">
    </label>
       
    <label>
      Email Address
      <input type="email" name="Email" placeholder="name@domain.com" 
      value='<?php echo $row123['Email'];?>' id="Email">
    </label>
    
    <label>
      Mobile Number
      <input type="tel" name="Mobile" placeholder="(+964)-7701547929" 
      value='<?php echo $row123['Mobile'];?>' id="Mobile">
    </label>
    
    <label>
      Last Certificate
<select name="Certificate" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="Certificate">
   
       <?php
	if(isset($row123[4]))
	{
	?>
      <option value='<?php echo $row123['4'];?>' selected><?php echo $row123['4'];?></option>

   <?php
	}
	else
	{
	?>

   <option value="" selected>Certificate...</option>
    <?php		
	}
?>

<?php
//	$sql2="select Certificate from teacher";
//	$result3=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
//	while($row3=mysqli_fetch_array($result3))
//{	
	?>

<?php

//}
	?>
    <option value="">Certificate...</option>
    <option value="High Diploma">High Diploma</option>
    <option value="Master of Science">Master of Science</option>
    <option value="Doctor of Philosophy">Doctor of Philosophy</option>
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
  //Select2

});
		</script>
    </label>
    
    <label>
      Academic Title
<select name="AcademicTitle" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="AcademicTitle">
  
     
    <?php
	if(isset($row123[5]))
	{
	?>
      <option value='<?php echo $row123['5'];?>' selected><?php echo $row123['5'];?></option>

   <?php
	}
	else
	{
	?>

   <option value="" selected>Academic Title...</option>
    <?php		
	}
?>
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
  //Select2

});
	
	</script>
   </label>
    
    <label>
      Branch-Staff
<select name="Department" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="Department">
 
    <?php
	if(isset($row123[6]))
	{
	?>
      <option value='<?php echo $row123['6'];?>' selected><?php echo $row123['6'];?></option>

   <?php
	}
	else
	{
	?>

   <option value="" selected>Branches...</option>
    <?php		
	}
?>
    <option value="">Branches...</option>
    <option value="Basic Science">Basic Science</option>
    <option value="Prosthetic">Prosthetic</option>
    <option value="Periodontic">Periodontic</option>
    <option value="Oral Surgery">Oral Surgery</option>
	<option value="Oral Diagnosis">Oral Diagnosis</option>
	<option value="P.O.P">P.O.P</option>

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
  //Select2

});
	
	</script>
   </label>

    <label>
      Speciality
      <input type="text" name="Speciality" placeholder="Orthodontics" 
      value="<?=$row123['Speciality'];?>" id="Speciality">
    </label>
    
    <label>
      Number Researches after last title
      <input type="number" min="0" max="2099" step="1" value="0" name="NumberofResearch" 
      value="<?=$row123[NumberofResearch];?>" id="NumberofResearch"> 
    </label>

    <label>
      Date of Last Title
      <input type="date" name="DateofLastTitle" placeholder="14-11-1984" 
      value="<?=$row123['DateofLastTitle'];?>" id="DateofLastTitle">
    </label>

    <label>
      Diploma Research Title
      <input type="text" name="DiplomaTitle" placeholder="Orthodontics" 
      value="<?=$row123['DiplomaTitle'];?>" id="DiplomaTitle">
    </label>


    <label>
      Master Research Title 
      <input type="text" name="MasterTitle" placeholder="Orthodontics" 
      value="<?=$row123['MasterTitle'];?>" id="MasterTitle">
    </label>

    <label>
      PhD Research Title
      <input type="text" name="PHDTitle" placeholder="Orthodontics" 
      value="<?=$row123['PHDTitle'];?>" id="PHDTitle">
    </label>
    
    <label>
      Number of Diploma Student Supervision
      <input type="number" name="NumberofMasterStudent" min="0" max="2099" step="1" 
      value="<?=$row123['NumberofMasterStudent'];?>"  id="NumberofMasterStudent"> 
    </label>
    
    <label>
      Number of MSc. Student Supervision
      <input type="number" name="NumberofPHD" min="0" max="2099" step="1" 
      value="<?=$row123['NumberofPHD'];?>"  id="NumberofPHD"> 
    </label>
    
     <label>
      Number of PhD. Student Supervision
      <input type="number" name="NumberofDiploma" min="0" max="2099" step="1" 
      value="<?=$row123['NumberofDiploma'];?>"  id="NumberofDiploma"> 
    </label>
</fieldset>  
	
  <fieldset class="account-action">
   <input class="btn" type="submit"  value="Insert Data" id="submitdata"/>
   <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q1'];?>">
Update Data</button>
   <input type="reset"  value="Clear All" class="btn" id="clear">
  </fieldset>  
</form>
<script type="text/javascript">
        $(function() {
	
            $("#updates").click(function(e) {
				e.preventDefault();
	var id=$("#updates").val();
	var FullName=$("#FullName").val();
    var Email=$("#Email").val();
    var Mobile=$("#Mobile").val();
    var Certificate=$("#Certificate").val();
	var AcademicTitle=$("#AcademicTitle").val();
    var Department=$("#Department").val();
    var Speciality=$("#Speciality").val();
	var NumberofResearch=$("#NumberofResearch").val();
    var DateofLastTitle=$("#DateofLastTitle").val();
    var DiplomaTitle=$("#DiplomaTitle").val();
	var MasterTitle=$("#MasterTitle").val();
	var PHDTitle=$("#PHDTitle").val();
	var NumberofMasterStudent=$("#NumberofMasterStudent").val();
	var NumberofPHD=$("#NumberofPHD").val();
	var NumberofDiploma=$("#NumberofDiploma").val();

                    $.ajax({
                        type :"POST",
                        url : "teacher_update.php",
						async:false,
						data: ({
                        id: id,
				FullName:FullName,
				Email:Email,
				Mobile:Mobile,
				Certificate:Certificate,
				AcademicTitle:AcademicTitle,
				Department:Department,
   			    Speciality:Speciality,
				NumberofResearch:NumberofResearch,
				DateofLastTitle:DateofLastTitle,
				DiplomaTitle:DiplomaTitle,
				MasterTitle:MasterTitle,
				PHDTitle:PHDTitle,
				NumberofMasterStudent:NumberofMasterStudent,
				NumberofPHD:NumberofPHD,
				NumberofDiploma:NumberofDiploma
                    }),				
                  success : function(data) {
				 //$("#div1").fadeOut('slow');
			    // $("#div1").fadeIn('slow');
				 //$("#msg").html(data);
				  displayfromdb();
					  
        }
				
				});	
			
			});
			
		});
			
	
	function displayfromdb(){

		$.ajax({
			url:"teacher11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
				
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('teacher11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>


  
  <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "teacher1.php",
			async:false,
            data: {done1:1},
            success:function(data){
			//$('#t1').fadeOut('slow').load('teacher1.php').fadeIn("slow");	

		}

});
	
	 });

  </script>
 
  <?php
}
	?>
  

</body>
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

	
	

