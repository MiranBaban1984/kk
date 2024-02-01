<?php
include("connection.php");
?>

<body>
<?php
if(isset($_GET['q1']))
{
$sql123="Select  * from teacher t, teacherinfo ti where t.Teacher_ID=ti.Teacher_ID and
ti.TeacherEmail in(Select TeacherEmail from teacherinfo where TeacherEmail="."'".$_SESSION['a']."')";
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>
<form  id="message11" name="loginForm" action="#" enctype="multipart/form-data">
  <fieldset class="account-info">
   <legend><h2>Author Details Form Insertion</h2></legend>

    
    <label>
      Last Certificate
<select name="Certificate" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="Certificate">
   
       <?php
	if(isset($row123[1]))
	{
	?>
      <option value='<?php echo $row123['1'];?>' selected><?php echo $row123['1'];?></option>

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
    <option value="Bachelor">Bachelor</option>
    <option value="High Diploma">High Diploma</option>
    <option value="Master of Science">Master of Science</option>
    <option value="Doctor of Philosophy">Doctor of Philosophy</option>
    <option value="Academic Board">Academic Board</option>
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
	if(isset($row123[2]))
	{
	?>
      <option value='<?php echo $row123['2'];?>' selected><?php echo $row123['2'];?></option>

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
    <option value="Assistant Researcher">Assistant Researcher</option>
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
      Department
<select name="Department" class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="Department">
 
    <?php
	if(isset($row123[3]))
	{
	?>
      <option value='<?php echo $row123['3'];?>' selected><?php echo $row123['3'];?></option>

   <?php
	}
	else
	{
	?>

   <option value="" selected>Department...</option>
    <?php		
	}
?>
    <option value="">Department...</option>
    <option value="Basic Science">Basic Science</option>
    <option value="Prosthodontics">Prosthodontics</option>
    <option value="Periodontics">Periodontics</option>
    <option value="Oral and Maxillofacial Surgery">Oral and Maxillofacial Surgery</option>
	<option value="Oral Diagnosis">Oral Diagnosis</option>
	<option value="Orthodontics">Orthodontics</option>
  <option value="Conservative">Conservative</option>
  <option value="Pedodontics and Community Oral Health">Pedodontics and Community Oral Health</option>

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
      value="<?=$row123[4];?>" id="Speciality">
    </label>
    


    <label>
      Date of Last Title
      <input type="date" name="DateofLastTitle" placeholder="14-11-1984" 
      value="<?=$row123[5];?>" id="DateofLastTitle">
    </label>

    <!-- <label>
      Last Promotion File
      <input type="file" name="Lastfile11" id="Lastfile11" accept=".pdf" value="<?=$row123[15];?>">
    </label> -->


    <?php
$ethicFileLink1 = $row123[15]; // Assuming $row123[15] corresponds to the Ethic file link

// Initialize $filePath1
$filePath1 = '';

// Find the position of 'href=' and 'target=' in the link
$startPositionHref1 = strpos($ethicFileLink1, 'href=');
$startPositionTarget1 = strpos($ethicFileLink1, 'target=');

// Check if both 'href=' and 'target=' are found in the link
if ($startPositionHref1 !== false && $startPositionTarget1 !== false) {
    // Extract the substring between 'href=' and 'target='
    $linkSubstring1 = substr($ethicFileLink1, $startPositionHref1 + strlen('href='));

    // Find the position of 'target=' within the extracted substring
    $startPositionTargetInSubstring1 = strpos($linkSubstring1, 'target=');

    // If 'target=' is found, extract the substring up to that position
    if ($startPositionTargetInSubstring1 !== false) {
        $linkSubstring1 = substr($linkSubstring1, 0, $startPositionTargetInSubstring1);
    }

    // Remove any leading or trailing whitespace and common quote characters
    $linkSubstring1 = trim($linkSubstring1, " \t\n\r\0\x0B\"'");

    // Remove the part before the actual file path
    $filePath1 = substr($linkSubstring1, strpos($linkSubstring1, '/') + 1);
}
?>


<span id="promotionFilenameDisplay"><?= $filePath1; ?></span>

<div>
    <label for="updatepromotionFileCheckbox">
        Check here if you want to update Promotion file
        <input type="checkbox" id="updatepromotionFileCheckbox" name="updatepromotionFileCheckbox" value="check here if you want to update promotion file"> 
        Update Promotion File
    </label>
</div>

<!-- Last Promotion File input -->
<label id="promotionFileInputLabel" style="display:none;">
    Last Promotion File
    <input type="file" name="Lastfile11" id="Lastfile11" accept=".pdf">
</label>

<script>
    document.getElementById('updatepromotionFileCheckbox').addEventListener('change', function () {
        var promotionFileInputLabel = document.getElementById('promotionFileInputLabel');
        promotionFileInputLabel.style.display = this.checked ? 'block' : 'none';

        // Clear the Promotion file input when unchecked to avoid submitting the existing file
        if (!this.checked) {
            document.getElementById('Lastfile11').value = '';
        }
    });
</script>


    <label>
      Diploma Research Title
      <input type="text" name="DiplomaTitle" placeholder="Orthodontics" 
      value="<?=$row123[6];?>" id="DiplomaTitle">
    </label>


    <label>
      Master Research Title 
      <input type="text" name="MasterTitle" placeholder="Orthodontics" 
      value="<?=$row123[7];?>" id="MasterTitle">
    </label>

    <label>
      PhD Research Title
      <input type="text" name="PHDTitle" placeholder="Orthodontics" 
      value="<?=$row123[8];?>" id="PHDTitle">
    </label>
    
    <label>
      Number of Master Student Supervision
      <input type="number" name="NumberofMasterStudent" min="0" max="2099" step="1" 
      value="<?=$row123[9];?>"  id="NumberofMasterStudent"> 
    </label>
    
    <label>
      Number of PhD. Student Supervision
      <input type="number" name="NumberofPHD" min="0" max="2099" step="1" 
      value="<?=$row123[10];?>"  id="NumberofPHD"> 
    </label>
    
     <label>
      Number of Diploma Student Supervision
      <input type="number" name="NumberofDiploma" min="0" max="2099" step="1" 
      value="<?=$row123[11];?>"  id="NumberofDiploma"> 
    </label>

    <label>
      Google Scholar Link
      <input type="text" value="<?=$row123[12];?>" name="googlescholar11" id="googlescholar11"> 
    </label>


    <label>
      ORCID Link
      <input type="text" placeholder="https://orcid.org/0000-0002-1825-0097" name="orcid11" id="orcid11" value="<?=$row123[13];?>"> 
    </label>




    <!-- <label>
      CV File
      <input type="file" name="CV11" id="CV11" accept=".pdf" required />
    </label> -->




    <?php
$ethicFileLink12 = $row123[14]; // Assuming $row123[15] corresponds to the Ethic file link

// Initialize $filePath1
$filePath12 = '';

// Find the position of 'href=' and 'target=' in the link
$startPositionHref12 = strpos($ethicFileLink12, 'href=');
$startPositionTarget12 = strpos($ethicFileLink12, 'target=');

// Check if both 'href=' and 'target=' are found in the link
if ($startPositionHref12 !== false && $startPositionTarget12 !== false) {
    // Extract the substring between 'href=' and 'target='
    $linkSubstring12 = substr($ethicFileLink12, $startPositionHref12 + strlen('href='));

    // Find the position of 'target=' within the extracted substring
    $startPositionTargetInSubstring12 = strpos($linkSubstring12, 'target=');

    // If 'target=' is found, extract the substring up to that position
    if ($startPositionTargetInSubstring12 !== false) {
        $linkSubstring12 = substr($linkSubstring12, 0, $startPositionTargetInSubstring12);
    }

    // Remove any leading or trailing whitespace and common quote characters
    $linkSubstring12 = trim($linkSubstring12, " \t\n\r\0\x0B\"'");

    // Remove the part before the actual file path
    $filePath12 = substr($linkSubstring12, strpos($linkSubstring12, '/') + 1);
}
?>


<span id="cvFilenameDisplay"><?= $filePath12; ?></span>

<div>
    <label for="updatecvFileCheckbox">
        Check here if you want to update cv file
        <input type="checkbox" id="updatecvFileCheckbox" name="updatecvFileCheckbox" value="check here if you want to update cv file"> 
        Update CV File
    </label>
</div>

<!-- Last cv File input -->
<label id="cvFileInputLabel" style="display:none;">
    Last CV File
    <input type="file" name="CV11" id="CV11" accept=".pdf">
</label>

<script>
    document.getElementById('updatecvFileCheckbox').addEventListener('change', function () {
        var cvFileInputLabel = document.getElementById('cvFileInputLabel');
        cvFileInputLabel.style.display = this.checked ? 'block' : 'none';

        // Clear the CV file input when unchecked to avoid submitting the existing file
        if (!this.checked) {
            document.getElementById('CV11').value = '';
        }
    });
</script>
















</fieldset>  
	
  <fieldset class="account-action">
   <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q1'];?>">
Update</button>


<button id="Cancel" class="btn" name="Cancel" onclick="goToNewPage()">Cancel</button>
   <input type="reset"  value="Clear All" class="btn" id="clear">
  </fieldset>  
</form>



<script>
function goToNewPage() {
  // Change the URL to the desired page
  event.preventDefault();
  window.location.href = 'teacheracad.php';
}
</script>



<script>
        $(function() {
	
            $("#updates").click(function(e) {
           
				e.preventDefault();

	var id=$("#updates").val();
    var Certificate=$("#Certificate").val();
	var AcademicTitle=$("#AcademicTitle").val();
  var LastfileInput11 = $('#Lastfile11')[0];
var Lastfile11 = LastfileInput11.files.length > 0 ? LastfileInput11.files[0] : null;
    var Department=$("#Department").val();
    var Speciality=$("#Speciality").val();
	//var NumberofResearch=$("#NumberofResearch").val();
    var DateofLastTitle=$("#DateofLastTitle").val();
    var DiplomaTitle=$("#DiplomaTitle").val();
	var MasterTitle=$("#MasterTitle").val();
	var PHDTitle=$("#PHDTitle").val();
	var NumberofMasterStudent=$("#NumberofMasterStudent").val();
	var NumberofPHD=$("#NumberofPHD").val();
	var NumberofDiploma=$("#NumberofDiploma").val();
  var googlescholar11=$("#googlescholar11").val();
  var orcid11=$("#orcid11").val();

var fileInputss = $('#CV11')[0];
var CV11 = fileInputss.files.length > 0 ? fileInputss.files[0] : null;

  var formData = new FormData();
   formData.append('id', id);
   formData.append('Certificate', Certificate);
    formData.append('AcademicTitle', AcademicTitle);
    //formData.append('Lastfile11', Lastfile11);

    if (Lastfile11 !== null) {
            formData.append('Lastfile11', Lastfile11);
        }
  else{

    //alert('<?= $filePath1; ?>');
    formData.append('Lastfile11', null);
  }



    formData.append('Department', Department);
    formData.append('Speciality', Speciality);
    //formData.append('NumberofResearch', NumberofResearch);
    formData.append('DateofLastTitle', DateofLastTitle);
    formData.append('DiplomaTitle', DiplomaTitle);
    formData.append('MasterTitle', MasterTitle);
    formData.append('PHDTitle', PHDTitle);
    formData.append('NumberofMasterStudent', NumberofMasterStudent);
    formData.append('NumberofPHD', NumberofPHD);
    formData.append('NumberofDiploma', NumberofDiploma);
    formData.append('googlescholar11', googlescholar11);
    formData.append('orcid11', orcid11);
   // formData.append('CV11', CV11);

    if (CV11 !== null) {
            formData.append('CV11', CV11);
        }
  else{

    //alert('<?= $filePath12; ?>');
    formData.append('CV11', null);
  }





    $.ajax({
        url: "teacheraca_update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
         // alert(data);
            displayfromdb();
        }
    });
				
			
			});
			
		});

			

			
	
	function displayfromdb(){

		$.ajax({
			url:"teacheraca11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
				
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('teacheraca11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>


  
  <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "teacheracad.php",
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

</body>

	
	

