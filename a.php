<?php
include("connection.php");
?>

<body>


<?php
if(isset($_GET['q']))
{
$sql123="Select  * from journals where JournalID=".$_GET['q'];
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>
<form  id="message11" name="loginForm" action="#">
  <fieldset class="account-info">
   <legend>
   <h2>Journal Details Form Insertion</h2></legend>
    <label>
      Paper Title
        <input type="text" placeholder="ICET (Internation conference Electronical Technology)" id="papertitle11" 
        value='<?php echo $row123['ResearchTitle'];?>'>
    </label>
          
              <label>
      Paper CO-Author
<select class="limitedNumbChosen" multiple="true" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="journalauthor11" name="journalauthor">
	

	<?php
	$b="";
	$a=$row123[1].",";
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
      Journal Fullname
        <input type="text"  placeholder="International journal of Informatic" id="journalname11" 
        value='<?php echo $row123['7'];?>' />
    </label>
    
    <label>
      Publication Year
<input type="number" min="1900" max="2099" step="1" id="journalyear11" value="<?= $row123[8];?>"
   value='<?php echo $row123['7'];?>' /> 

   </label>
   
    <label>
      Global Impact Factor Year
<input type="number" min="0.0" max="1000" step="0.1" id="IF11" value='<?php echo $row123['9'];?>'/> 
   </label>
   
       <label>
      Volume (Publication Volume)
<input type="number" min="1" max="1000" step="1" id="vol11" value='<?php echo $row123['10'];?>' /> 
    </label>
          
     <label>
      Issue (Publication Issue)
<input type="number" min="1" max="1000" step="1" value='<?php echo $row123['11'];?>' id="no11"/> 
    </label>
   
        <label>
      Number of Pages
<input type="number" min="1" max="1000" step="1" value='<?php echo $row123['12'];?>'  id="pages11" /> 
    </label>
   
        <label>
    Scientific Registeration Date
<input type="date" placeholder="14-11-1984"  id="sciregister11" value='<?php echo $row123['4'];?>'> 
    </label>

         <label>
     Ethical Registeration Date
<input type="date" placeholder="14-11-1984"  id="ethical11" value='<?php echo $row123['5'];?>'> 
    </label>
   
            <label>
     Ethical Registeration Number
<input type="text" placeholder="17/59/1234"  id="ethicalno" value='<?php echo $row123['6'];?>'> 
    </label>
   
    <label>
Country
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="country11" name="country11">
   
   
   <?php
	if(isset($row123[13]))
	{
	?>
      <option value='<?php echo $row123['13'];?>' selected><?php echo $row123['13'];?></option>

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
           
    </label>

     
        <label>
      Paper - DOI (Digital Object Identification) (If present)
      <input type="text" name="doi11" placeholder="ICET/1254/ICETJ1" value='<?php echo $row123['14'];?>' id="doi11">
    </label>
    
        <label>
      Publication link
      <input type="text" name="weblink" placeholder="http://www.example.com" id="weblink11" 
      value='<?php echo $row123['15'];?>'>
    </label>

        <label>
      Published-(Yes or No)
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="published11">
 <?php
	if ($row123['16']=="Yes")
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
<?php
	 }
	 ?>
			</select>
    </label>

</fieldset>  
			
			
  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Insert Data" id="submitdata"/>
    <button id="updates" class="btn" name="updates" type="submit" 
    value="<?php echo $_GET['q'];?>">updates</button>
     <input type="reset"  value="Clear All" class="btn" id="clear">
  </fieldset>
</form>
<script type="text/javascript" >
        $(function() {
	
            $("#updates").click(function(e) {
				e.preventDefault();
               // var id = $(this).attr("id");
				var id=$("#updates").val();
				var realvalues11=new Array();
				$("#journalauthor11 :selected").each(function(i, selected){
					realvalues11[i]=$(selected).val();
				});
    var papertitle11=$("#papertitle11").val();
    var sciregister11=$("#sciregister11").val();
    var ethical11=$("#ethical11").val();
	var journalname11=$("#journalname11").val();
    var journalyear11=$("#journalyear11").val();
    var IF11=$("#IF11").val();
	var vol11=$("#vol11").val();
    var no11=$("#no11").val();
    var pages11=$("#pages11").val();
	var country11=$("#country11").val();
	var doi11=$("#doi11").val();
	var weblink11=$("#weblink11").val();
	var published11=$("#published11").val();
	var ethicalno=$("#ethicalno").val();

                    $.ajax({
                        type : "POST",
                        url : "journal_update.php",
						async:false,
						data: ({
                        id: id,
	"journalauthor":realvalues11,
    "papertitle1":papertitle11,
    "sciregister1":sciregister11,
    "ethical1":ethical11,
	"journalname1":journalname11,
    "journalyear1":journalyear11,
    "IF1":IF11,
	"vol1":vol11,
    "no1":no11,
    "pages1":pages11,
	"country1":country11,
	"doi1":doi11,
	"weblink1":weblink11,
	"published1":published11,
	"ethicalno":ethicalno
	
                    }),
				
                  success : function(data) {
			//	 $("#div1").fadeOut('slow');
			   //  $("#div1").fadeIn('slow');
					  //  $("#msg").html(data);
				  displayfromdb();
					  
        }
				
					});
					
			
			});
			
		});
			
	
	function displayfromdb(){

		$.ajax({
			url:"journal11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
				
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('journal11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>

  <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "journal1.php",
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
	
	

