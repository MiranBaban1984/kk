<?php
include("connection.php");
?>

<body>
<?php
if(isset($_GET['q2']))
{
$sql123="Select  * from books where BookID="."'".$_GET['q2']."'";
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>

<form method="post" action="#" id="loginForm">
  <fieldset class="account-info">
   <legend><h2>Book Details Update Form</h2></legend>
     <label>
      Book Title
        <input type="text" name="booktitle11" placeholder="DNA Sequence Frequency" id="booktitle11" 
        value="<?php echo $row123[1];?>"/>
    </label>

<label>
Order of Author Place
      <input type="number" min="0" max="100" step="1"  id="bookauthorplace11" value="<?=$row123[2];?>"/>
</label>

    <label>
      Date of Publication
   <input type="date" name="year1111" placeholder="14-11-1984" id="year1111" value="<?=$row123[3];?>"/>
   </label>
   
    <label>
      Place of Publication
 <select name="Place" class="limitedNumbChosen"style="width: 450px; height: 30px; 
  direction: ltr" dir="ltr" id="publicationplace11">
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
      Publisher (Organization)
      <input type="text" name="Publisher11" placeholder="Weily" id="publicationorganization11" 
      value="<?=$row123[5];?>">
    </label>

    <label>
     ISBN
      <input type="text" name="ISBN11" placeholder="23232-32324" id="bookisbn11" value="<?=$row123[6];?>">
    </label>
    
        <label>
      DOI
      <input type="text" name="DOI11" placeholder="books.info/245436" id="bookdoi11" value="<?=$row123[7];?>">
    </label>
    
        <label>
      Weblink
      <input type="text" name="WebLink11" placeholder="http://www.domain.com" id="booklink11" 
      value="<?=$row123[8];?>">
    </label>


    <label>
      Published-(Book Series or Book Chapter)
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="booktype11">
 <?php
	if ($row123['10']=="Book Series")
	{
	?>
<option value="Book Series" selected>Book Series</option>
<option value="Book Chapter">Book Chapter</option>
<?php
	}
	 
	 else
	 {
	 ?>

<option value="Book Chapter" selected>Book Chapter</option>
<option value="Book Series">Book Series</option>
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
    Paper File (PDF File. Max 10MB)
    <input type="file" name="bookfile11" id="bookfile11" accept=".pdf">
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
            document.getElementById('bookfile11').value = '';
        }
    });
</script>














</fieldset>  
 
  <fieldset class="account-action">
    <button id="updates" class="btn" name="updates" type="submit" value="<?php echo $_GET['q2'];?>">update</button>
    <button id="Cancel" class="btn" name="Cancel" onclick="goToNewPage()" type="button">Cancel</button>
    <input type="reset" name="clear" value="Clear All" class="btn"> 
  </fieldset>
</form>


<script>
function goToNewPage() {
  // Change the URL to the desired page
  event.preventDefault();
  window.location.href = 'bookinfo.php';
}
</script>

<script type="text/javascript">
        $(function() {
	
            $("#updates").click(function(e) {
				e.preventDefault();

var id=$("#updates").val();
var booktitle11=$("#booktitle11").val();
var bookauthorplace11=$("#bookauthorplace11").val();
var year1111=$("#year1111").val();
var publicationplace11=$("#publicationplace11").val();
var publicationorganization11=$("#publicationorganization11").val();
var bookisbn11=$("#bookisbn11").val();
var bookdoi11=$("#bookdoi11").val();
var booklink11=$("#booklink11").val();
var booktype11=$("#booktype11").val();
//alert(year1111);


var EthicfileInput = $('#bookfile11')[0];
var bookfile11 = EthicfileInput.files.length > 0 ? EthicfileInput.files[0] : null;



//alert(year1111);

var formData = new FormData();
    formData.append('id', id);
    formData.append('booktitle11', booktitle11);
    formData.append('bookauthorplace11', bookauthorplace11);
    formData.append('year1111', year1111);
    formData.append('publicationplace11', publicationplace11);
    formData.append('publicationorganization11', publicationorganization11);
    formData.append('bookisbn11', bookisbn11);
    formData.append('bookdoi11', bookdoi11);
    formData.append('booklink11', booklink11);
    formData.append('booktype11', booktype11);
    // formData.append('bookfile11', bookfile11);

    if (bookfile11 !== null) {
            formData.append('bookfile11', bookfile11);
        }
  else{

   // alert('<?= $filePath; ?>');
    formData.append('bookfile11', null);
  }


                    $.ajax({
                        type : "POST",
                        url : "book_update.php",
						async:false,
						data:formData,
            contentType: false,
        processData: false, 			
                  success : function(data) {

                    //alert(data);
				  displayfromdb();
					  
        }
				
					});
					
			
			});
			
		});
			
	
	function displayfromdb(){

		$.ajax({
			url:"bookinfo11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1
			},
				success:function(d){
				$('#div1').fadeOut('slow').load('bookinfo11.php').fadeIn("slow");
			}
			
		});
	}
	
 </script>
    <!-- <script type="text/javascript">
	$("#submitdata").click(function(e) {
        $.ajax({
            type: "POST",
            url: "book1.php",
			async:false,
            data: {done1:1},
            success:function(data){
			//$('#t1').fadeOut('slow').load('teacher1.php').fadeIn("slow");	

		}

});
	
	 });

  </script> -->

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
