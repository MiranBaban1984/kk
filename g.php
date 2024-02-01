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
<?php
include("connection.php");
?>
<body>

<?php
if(isset($_GET['q123']))
{
$sql123="Select  * from journals where JournalID=".$_GET['q123'];
$result123=mysqli_query($conn,$sql123) or die(mysqli_error($conn));
$row123=mysqli_fetch_array($result123);
?>
<form id="message11" name="loginForm" action="#" enctype="multipart/form-data">
  <fieldset class="account-info">
   <legend>
   <h2>Local Journal Details Update Form</h2></legend>

   <label>
    Paper Type
    <select class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="papertype11">
        <?php
        if ($row123['17'] == "Original Article") {
            ?>
            <option value="Original Article" selected>Original Article</option>
            <option value="Review Article">Review Article</option>
            <option value="Systematic Review">Systematic Review</option>
            <option value="Case Series">Case Series</option>
            <option value="Case Report">Case Report</option>
            <?php
        } elseif ($row123['17'] == "Review Article") {
            ?>
            <option value="Review Article" selected>Review Article</option>
            <option value="Original Article">Original Article</option>
            <option value="Systematic Review">Systematic Review</option>
            <option value="Case Series">Case Series</option>
            <option value="Case Report">Case Report</option>
            <?php
        } elseif ($row123['17'] == "Systematic Review") {
            ?>
            <option value="Systematic Review" selected>Systematic Review</option>
            <option value="Original Article">Original Article</option>
            <option value="Review Article">Review Article</option>
            <option value="Case Series">Case Series</option>
            <option value="Case Report">Case Report</option>
            <?php
        } elseif ($row123['17'] == "Case Series") {
            ?>
            <option value="Case Series" selected>Case Series</option>
            <option value="Systematic Review">Systematic Review</option>
            <option value="Original Article">Original Article</option>
            <option value="Review Article">Review Article</option>
            <option value="Case Report">Case Report</option>
            <?php
        } else {
            ?>
            <option value="Case Report" selected>Case Report</option>
            <option value="Case Series">Case Series</option>
            <option value="Systematic Review">Systematic Review</option>
            <option value="Original Article">Original Article</option>
            <option value="Review Article">Review Article</option>
            <?php
        }
        ?>
    </select>
</label>

    <label>
      Paper Title
        <input type="text" placeholder="ICET (Internation conference Electronical Technology)" id="papertitle11" name="papertitle" 
        value='<?php echo $row123['2'];?>'>
    </label>
          


           
              <label>
              Order of Author Place
      <input type="number" required min="0" max="1000" step="1" id="authorplace11" name="authorplace" value='<?php echo $row123[1];?>'/>
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
        <input type="text"  placeholder="International journal of Informatic" id="journalname11" name="journalname" 
        value='<?php echo $row123['6'];?>' />
    </label>
    


    <label>
      Publisher (Organization)
        <input type="text"  placeholder="Springer" required id="publisher11" value='<?php echo $row123['16'];?>'/>
    </label>



    <label>
      Date of Publication
<input type="Date" id="journalyear11" name="journalyear" value="<?= $row123[7];?>" /> 

   </label>
   
    <label>
   Impact Factor
<input type="number" min="0.0" max="1000" step="0.1" name="IF" id="IF11" value='<?php echo $row123['8'];?>'/> 
   </label>
   

   <label>
    Keywords
   <textarea id="multitext11" name="multitext11" rows="4" cols="50", placeholder="keyword1, keyword2"><?= $row123['18'];?></textarea>
</label>


       <label>
      Volume
<input type="number" min="1" max="1000" step="1" name="vol" id="vol11" value='<?php echo $row123['9'];?>' /> 
    </label>
          
     <label>
      Issue
<input type="number" min="1" max="1000" step="1" value='<?php echo $row123['10'];?>' id="no11" name="no"/> 
    </label>
   
        <label>
      Number of Pages
<input type="text" value='<?php echo $row123['11'];?>'  id="pages11" name="pages" /> 
    </label>
   
        <label>
    Scientific Registeration Date
<input type="date" placeholder="14-11-1984" name="sciregister" id="sciregister11" value='<?php echo $row123['3'];?>'> 
    </label>

         <label>
     Ethical Registeration Date
<input type="date" placeholder="14-11-1984" name="ethical" id="ethical11" value='<?php echo $row123['4'];?>'> 
    </label>
   
            <label>
     Ethical Registeration Number
<input type="text" placeholder="17/59/1234"  id="ethicalno11" value='<?php echo $row123['5'];?>' name="ethicalno"> 
    </label>
   
   
     
        <label>
      DOI (If present)
      <input type="text" name="doi" placeholder="ICET/1254/ICETJ1" 
      value='<?php echo $row123['12'];?>' id="doi11">
    </label>
    
        <label>
      Publication link
      <input type="text" name="weblink" placeholder="http://www.example.com" id="weblink11" 
      value='<?php echo $row123['13'];?>'>
    </label>

    <?php
$fileLink = $row123['14'];

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

  //  echo $filePath;
} else {
    echo "Link structure not found or incomplete.";
}
?>




<!-- Existing file information -->
<span id="filenameDisplay"><?= $filePath; ?></span>

<!-- File input for updating (initially hidden) -->
<label id="fileInputLabel" style="display:none;">
    Paper File (PDF File. Max 10MB) <?= $filePath;?>
    <input type="file" name="file11" id="file11" accept=".pdf">
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
            document.getElementById('file11').value = '';
        }
    });
</script>





<?php
$ethicFileLink1 = $row123[15]; // Assuming $row123[16] corresponds to the Ethic file link

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

  //  echo $filePath;
} else {
    echo "Link structure not found or incomplete.";
}
?>

<!-- Existing Ethic file information -->
<span id="ethicFilenameDisplay"><?= $filePath1; ?></span>

<!-- Checkbox with label to trigger Ethic file input display -->
<div>
    <label for="updateEthicFileCheckbox">
    check here if you want to update Ethics file
        <input type="checkbox" id="updateEthicFileCheckbox" name="updateEthicFileCheckbox" value="check here if you want to update Ethic file"> 
        Update Ethic File
    </label>
</div>

<!-- Ethic file input for updating (initially hidden) -->
<label id="ethicFileInputLabel" style="display:none;">
    Ethic File (PDF File. Max 10MB)
    <input type="file" name="Ethicfile11" id="Ethicfile11" accept=".pdf">
</label>

<script>
    document.getElementById('updateEthicFileCheckbox').addEventListener('change', function () {
        var ethicFileInputLabel = document.getElementById('ethicFileInputLabel');
        ethicFileInputLabel.style.display = this.checked ? 'block' : 'none';

        // Clear the Ethic file input when unchecked to avoid submitting the existing file
        if (!this.checked) {
            document.getElementById('Ethicfile11').value = '';
        }
    });
</script>







  </fieldset>  
			
  <fieldset class="account-action">
   <button id="updates1" class="btn" name="updates1" type="submit" value="<?php echo $_GET['q123'];?>">
Update</button>
<button id="Cancel" class="btn" name="Cancel" onclick="goToNewPage()" type="button">Cancel</button>

   <input type="reset"  value="Clear All" class="btn" id="clear">
  </fieldset>  
  
</form>

<script>
function goToNewPage() {
  // Change the URL to the desired page
  event.preventDefault();
  window.location.href = 'journalteachinsert.php';
}
</script>

<script>
        $(function() {
            $("#updates1").click(function(e) {
				e.preventDefault();
     
				var id=$("#updates1").val();
        var authorplace11=$("#authorplace11").val();
    var papertitle11=$("#papertitle11").val();
    var sciregister11=$("#sciregister11").val();
    var ethical11=$("#ethical11").val();
	var journalname11=$("#journalname11").val();
    var journalyear11=$("#journalyear11").val();
    var IF11=$("#IF11").val();
	var vol11=$("#vol11").val();
    var no11=$("#no11").val();
    var pages11=$("#pages11").val();
	//var country11=$("#country11").val();
	var doi11=$("#doi11").val();
	var weblink11=$("#weblink11").val();
  var publisher11=$("#publisher11").val();
	var ethicalno11=$("#ethicalno11").val();
  var multitext11=$("#multitext11").val();
  var papertype11=$("#papertype11").val();

  //alert(multitext11);

  var fileInput = $('#file11')[0];
  var file11 = fileInput.files.length > 0 ? fileInput.files[0] : null;

var EthicfileInput11 = $('#Ethicfile11')[0];
var Ethicfile11 = EthicfileInput11.files.length > 0 ? EthicfileInput11.files[0] : null;

  var formData = new FormData();
   formData.append('id', id);
   formData.append('authorplace11', authorplace11);
    formData.append('papertitle11', papertitle11);
    formData.append('sciregister11', sciregister11);
    formData.append('ethical11', ethical11);
    formData.append('journalname11', journalname11);
    formData.append('journalyear11', journalyear11);
    formData.append('IF11', IF11);
    formData.append('vol11', vol11);
    formData.append('no11', no11);
    formData.append('pages11', pages11);
    formData.append('multitext11', multitext11);
    formData.append('doi11', doi11);
    formData.append('weblink11', weblink11);
    formData.append('publisher11', publisher11);
    formData.append('papertype11', papertype11);

  if (file11 !== null) {
            formData.append('file11', file11);
        }
  else{

    //alert('<?= $filePath; ?>');
    formData.append('file11', null);
  }


  if (Ethicfile11 !== null) {
            formData.append('Ethicfile11', Ethicfile11);
        }
    
    else{
      

      formData.append('Ethicfile11', null);

    }


    formData.append('ethicalno11', ethicalno11);

    $.ajax({
        url: "journal_teacher_update.php",
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

		var id=$("#updates1").val();

		$.ajax({
			url:"journalteach11.php",
			type:"POST",
			async:false,
			data:{
			dsplay:1,
			},
				success:function(d){
        // alert('successs'); 
          $('#div1').fadeOut('slow').load('journalteach11.php').fadeIn("slow");
			//	$('#sd').fadeOut("slow");
			
				//	$(".delete_mem" + id).fadeOut('slow');
				
				//$('#div1').load('journalteach11.php #sd').fadeOut("slow");
				//$('#div1').load('journalteach11.php #sd').fadeIn("slow");
			}
			
		});
	}
	
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
	
	

