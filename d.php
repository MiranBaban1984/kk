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
   <h2>Conference Details Form Insertion</h2></legend>
    <label>
      Conference Name
     <input type="text" name="ConferenceName" placeholder="ICET (Internation conference Electronical Technology)"
	 id="ConferenceName" value="<?=$row123[4];?>"/>
    </label>
          
    <label>
      Publisher Organization
       <input type="text" placeholder="IEEE" id="ConferenceOrganizer" name="ConferenceOrganizer"
        value="<?=$row123[3];?>"/>
    </label>
    
         <label>
      Paper CO-Author
<select class="limitedNumbChosen" multiple="true" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="CoAuthor" name="CoAuthor">
	

	<?php
	$b="";
	$a=$row123[2].",";
	for($i=0;$i<strlen($a);$i++){
		if($a[$i]!=","){
			//echo "i= ".$i."   a= ".$a[$i]. "<br>";
			$b.=$a[$i];
			//echo "<br>";			
		}
		
		else
			
		{
		//echo "b= ".$b."<br>";
	?>
	
<option value="<?php echo $b;?>" selected><?=$b;?></option>
		
		
		<?php
				$b=" ";	
		}
	}
	
	?>

	
   <?php
	$sql2="select fullname from teacher";
	$result3=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	while($row3=mysqli_fetch_array($result3))
{	
	?>
       <option value="<?php echo $row3['fullname'];?>"><?=$row3['fullname'];?></option>
<?php

}
	?>

</select>

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
  //Select2
});
		</script>

   </label>
    
    <label>
      Conference Year
   <input type="number" min="1900" max="2099" step="1" value="2016" id="PublishYear" name="PublishYear" 
   value="<?=$row123[8];?>"/> 
      </label>

    <label>
      Conference Country
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
      Paper - Title (Conference Submited Paper)
      <input type="text" name="ResearchTitle" placeholder="General Dentistry" id="ResearchTitle" 
      value="<?=$row123[1];?>"/>
    </label>
                
    <label>
      Paper - DOI (Digital Object Identification)
      <input type="text" placeholder="ICET/1254/ICETJ1" name="DOI" id="DOI" value="<?=$row123[9];?>"/>
    </label>
    
        <label>
      Conference -Weblink
      <input type="text" placeholder="http://www.example.com" name="WebLink" id="WebLink" 
      value="<?=$row123[7];?>"/>
    </label>

     <label>
      Published-(Yes or No)
<select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="Published" name="Published">
 <?php
	if ($row123['6']=="Yes")
	{
	?>
<option value="Yes" selected>Yes</option>
<option value="No">No</option>
<?php
	}
	 
	 else
	 {
	 ?>

<option value="No" selected>No</option>
<option value="Yes">Yes</option>
<?}?>
			</select>

    </label>

</fieldset>  
 
  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Insert Data" id="submitdata"/>
    <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q2'];?>">updates</button>
    <button id="Cancel" class="btn" name="Cancel" onclick="goToNewPage()">Cancel</button>
    <input type="reset" name="clear" value="Clear All" class="btn"> 
  </fieldset>

</form>

<script>
function goToNewPage() {
  // Change the URL to the desired page
  window.location.href = 'conferenceinfo.php';
}
</script>
</td>

<script type="text/javascript">
        $(function() {
	
            $("#updates").click(function(e) {
				e.preventDefault();
               // var id = $(this).attr("id");
				var id=$("#updates").val();
				var CoAuthor=new Array();
				$("#CoAuthor :selected").each(function(i, selected){
					CoAuthor[i]=$(selected).val();
				});
    var ConferenceName=$("#ConferenceName").val();
    var ConferenceOrganizer=$("#ConferenceOrganizer").val();
	var PublishYear=$("#PublishYear").val();
    var ConferenceLocation=$("#ConferenceLocation").val();
	var ResearchTitle=$("#ResearchTitle").val();
    var DOI=$("#DOI").val();
    var WebLink=$("#WebLink").val();
	var Published=$("#Published").val();

                    $.ajax({
                        type : "POST",
                        url : "conference_update.php",
						async:false,
						data: ({
                        id:id,
				ConferenceName:ConferenceName,
				ConferenceOrganizer:ConferenceOrganizer,
				CoAuthor:CoAuthor,
				PublishYear:PublishYear,
				ConferenceLocation:ConferenceLocation,
				ResearchTitle:ResearchTitle,
				DOI:DOI,
   			    WebLink:WebLink,
				Published:Published
                    }),				
                  success : function(data) {
				//$("#msg").html(data);
				  displayfromdb();
					  
        }
				
					});
					
			
			});
			
		});
			
	
	function displayfromdb(){

		$.ajax({
			url:"conference11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('conference11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>
    <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "conference1.php",
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
