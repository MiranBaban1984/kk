<?php
include("connection.php");
?>

<body>
<?php
if(isset($_GET['q2']))
{
$aa=$_GET['q2'];
$sql123="Select  * from conference where ConferenceID=".$aa;
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>

		<td>
	<form  id="message11" name="loginForm" action="#">
  <fieldset class="account-info">
   <legend>
   <h2>Conference Details Update Form</h2></legend>
    <label>
      Conference Name
     <input type="text" name="ConferenceName" placeholder="ICET (Internation conference Electronical Technology)"
	 id="ConferenceName" value="<?=$row123[4];?>"/>
    </label>
          
    <label>
      Publisher (Organization)
       <input type="text" placeholder="IEEE" id="ConferenceOrganizer" name="ConferenceOrganizer"
        value="<?=$row123[3];?>"/>
    </label>
    
         <label>
         Order of Author Place
         <input type="number" min="1" max="1000" step="1"  id="authorplace11" name="authorplace11" 
   value="<?=$row123[2];?>"/> 
</label>
    
    <label>
      Date of Conference
   <!-- <input type="number" min="1900" max="2099" step="1"  id="PublishYear" name="PublishYear" 
   value="<?//=$row123[7];?>"/>  -->

   <input type="date" name="PublishYear" placeholder="14-11-1984" id="PublishYear" value="<?=$row123[7];?>"/>

      </label>


      <label>
       venue
      <input type="text" placeholder="London" id="venue11" name="venue11" value="<?=$row123[10];?>"/>
   </label>

    <label>
       Country
 <select name="ConferenceLocation" class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="ConferenceLocation">

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

   <option value="" selected>Country...</option>
    <?php		
	}
?>

   <option value="">Country...</option>
<?php
	$sql2="select country_name from apps_countries";
	$result3=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	while($row3=mysqli_fetch_array($result3))
{	
	?>
       <option value="<?php echo $row3['country_name'];?>"><?=$row3['country_name'];?></option>
<?php

}
	?>
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
      Paper Title (Conference Submited Paper)
      <input type="text" name="ResearchTitle" placeholder="General Dentistry" id="ResearchTitle" 
      value="<?=$row123[1];?>"/>
    </label>
                
    <label>
      DOI
      <input type="text" placeholder="ICET/1254/ICETJ1" name="DOI" id="DOI" value="<?=$row123[8];?>"/>
    </label>
    
        <label>
      Weblink
      <input type="text" placeholder="http://www.example.com" name="WebLink" id="WebLink" 
      value="<?=$row123[6];?>"/>
    </label>


    <label>
      Published-(Poster or Presenter)
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="conftype11">
 <?php
	if ($row123['11']=="Poster")
	{
	?>
<option value="Poster" selected>Poster</option>
<option value="Presenter">Presenter</option>
<?php
	}
	 
	 else
	 {
	 ?>

<option value="Presenter" selected>Presenter</option>
<option value="Poster">Poster</option>
<?php
	 }
	 ?>
			</select>
    </label>





    <?php
$fileLink = $row123['9'];

// Find the position of 'href=' and 'target=' in the link
$startPositionHref = strpos($fileLink, 'href=');
$startPositionTarget = strpos($fileLink, 'target=');

// Check if both 'href=' and 'target=' are found in the link
if ($startPositionHref !== false && $startPositionTarget !== false) {
    // Extract the substring between 'href=' and 'target='
    $linkSubstring = substr($fileLink, $startPositionHref + strlen('href='));

    // Find the position of 'target=' within the extracted substring
    $startPositionTargetInSubstring = strpos($linkSubstring, 'target=');

    // If 'target=' is found, extract the substring up to that position
    if ($startPositionTargetInSubstring !== false) {
        $linkSubstring = substr($linkSubstring, 0, $startPositionTargetInSubstring);
    }

    // Remove any leading or trailing whitespace and common quote characters
    $linkSubstring = trim($linkSubstring, " \t\n\r\0\x0B\"'");

    // Remove the part before the actual file path
    $filePath = substr($linkSubstring, strpos($linkSubstring, '/') + 1);

} else {
    echo "Link structure not found or incomplete.";
}
?>




<!-- Existing file information -->
<span id="filenameDisplay"><?= $filePath; ?></span>

<!-- File input for updating (initially hidden) -->
<label id="fileInputLabel" style="display:none;">
    Upload File (PDF File. Max 10MB)
    <input type="file" name="conferencefile11" id="conferencefile11" accept=".pdf">
</label>

<label>
check here if you want to update Paper file
<!-- Checkbox or button to trigger file input display -->
<input type="checkbox" id="updateFileCheckbox" value="check here if you want to update Paper file"> Update File
</label>
<script>
    document.getElementById('updateFileCheckbox').addEventListener('change', function () {
        var fileInputLabel = document.getElementById('fileInputLabel');
        fileInputLabel.style.display = this.checked ? 'block' : 'none';

        // Clear the file input when unchecked to avoid submitting the existing file
        if (!this.checked) {
            document.getElementById('conferencefile11').value = '';
        }
    });
</script>


</fieldset>  
 
  <fieldset class="account-action">
   <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q2'];?>">
Update</button>
<button id="Cancel" class="btn" name="Cancel" onclick="goToNewPage()" type="button">Cancel</button>

   <input type="reset"  value="Clear All" class="btn" id="clear">
  </fieldset>  

</form>


<script>
function goToNewPage() {
  // Change the URL to the desired page
  event.preventDefault();
  window.location.href = 'conferenceinfo.php';
}
</script>
</td>



<!--  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Insert Data" id="submitdata"/>
    <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q2'];?>">update</button>
    <input type="reset" name="clear" value="Clear All" class="btn"> 
  </fieldset>
</form>
-->
<script type="text/javascript">
        $(function() {
	
            $("#updates").click(function(e) {
				e.preventDefault();
          

var id=$("#updates").val();
var ConferenceName=$("#ConferenceName").val();
var ConferenceOrganizer=$("#ConferenceOrganizer").val();
var PublishYear=$("#PublishYear").val();
var ConferenceLocation=$("#ConferenceLocation").val();
var ResearchTitle=$("#ResearchTitle").val();
var DOI=$("#DOI").val();
var WebLink=$("#WebLink").val();
var authorplace11=$("#authorplace11").val();
var conftype11=$("#conftype11").val();
var venue11=$("#venue11").val();
// var ConferencefileInput = $('#conferencefile11')[0];
// var conferencefile11 = ConferencefileInput.files[0];

var EthicfileInput = $('#conferencefile11')[0];
var conferencefile11 = EthicfileInput.files.length > 0 ? EthicfileInput.files[0] : null;



var formData = new FormData();
    formData.append('id', id);
    formData.append('ConferenceName', ConferenceName);
    formData.append('ConferenceOrganizer', ConferenceOrganizer);
    formData.append('PublishYear', PublishYear);
    formData.append('ConferenceLocation', ConferenceLocation);
    formData.append('ResearchTitle', ResearchTitle);
    formData.append('DOI', DOI);
    formData.append('WebLink', WebLink);
    formData.append('authorplace11', authorplace11);
    formData.append('venue11', venue11);
    formData.append('conftype11', conftype11);
    //formData.append('conferencefile11', conferencefile11);

    if (conferencefile11 !== null) {
            formData.append('conferencefile11', conferencefile11);
        }
  else{

    //alert('<?= $filePath; ?>');
    formData.append('conferencefile11', null);
  }




    //alert(PublishYear);
                    $.ajax({
                        type : "POST",
                        url : "conference_teacher_update.php",
						async:false,
            contentType: false,
        processData: false,
						data:formData, 			
                  success : function(data) {
                   // alert(data);
				// $("#div1").fadeOut('slow');
			  //   $("#div1").fadeIn('slow');
				// //$("#msg").html(data);
				  displayfromdb();
					  
        }
				
					});
					
			
			});
			
		});
			
	
	function displayfromdb(){

		$.ajax({
			url:"conferenceinfo11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('conferenceinfo11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>
    <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "conferenceinfo.php",
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
