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
    
     <body>
      <div align="left">
      
      <table>
	<tr valign="top">
	<p id="ss1" class="ss1">
		<td class="selection" id="selection">
      
      <div id="msg"></div> 
		</td>
     <td valign="top">
      <div id="div1">
       <table>
        <tr>
                <td>
                  <input id="pglmt" placeholder="Page Limit" title="Page Limit" value="10" class="form-control">
                </td>
                <td>
                    <button id="btnApply" class="btn btn-danger">Apply</button>
                </td>
    </tr>
  </table>
             <form method="post" action="exportjournal1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                    <th>CO-Author</th>
                    <th>Title</th>
                    <th>Registeration</th>
                    <th>Ethical Date</th>
                    <th>Ethical Number</th>
                    <th>Journal</th>
                    <th>Year</th>
                    <th>I F</th>
                    <th>Vol.</th>
                    <th>Issue</th>
                    <th>Pages</th>
                    <th>Country</th>
                    <th>DOI</th>
                    <th>Publication Link</th>
                    <th>Published</th>   
              </tr>
            </thead>
<?php
include("connection.php"); 
if(isset($_POST['done'])){
$q5 = implode('  ,', $_POST['journalauthor']);	
$sql_insert_teacher="
insert into journals(JournalID,TeacherName,TeacherID,ResearchTitle,RegisterationDate,ApprovalDate,
EthicalNumber,JournalName,PublishingYear,
Impactfactor,Volume,Issue,Pages,place,DOI,Weblink,Published) values('nyt422','$q5','','$_POST[papertitle1]','$_POST[sciregister1]','$_POST[ethical1]',
'$_POST[ethicalno]','$_POST[journalname1]','$_POST[journalyear1]','$_POST[IF1]','$_POST[vol1]','$_POST[no1]','$_POST[pages1]',
'$_POST[country1]','$_POST[doi1]','$_POST[weblink1]','$_POST[published1]')";	
mysqli_query($conn,$sql_insert_teacher) or die(mysqli_error($conn));
}	   
	?>
                      <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_journal="Select  * from journals order by ResearchTitle";
$result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			   
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row[1];?>
                    </td>
                    <td>
                    <?= $row[3];?>
                    </td>
                    <td>
                    <?= $row[4];?>
                    </td>
                      <td>
                    <?= $row[5];?>
                    </td>
                      <td>
                    <?= $row[6];?>
                    </td>
                     
                     <td>
                    <?= $row[7];?>
                    </td>
                      <td>
                    <?= $row[8];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>

                  <td>
                    <?= $row[10];?>
                    </td>
                       <td>
                    <?= $row[11];?>
                    </td>
                       <td>
                    <?= $row[12];?>
                    </td>
                       <td>
                    <?= $row[13];?>
                    </td>
                       <td>
                    <?= $row[14];?>
                    </td>
                       <td>
                    <?= $row[15];?>
                    </td>
                       <td>
                    <?= $row[16];?>
                    </td>

                    <td width="7%">
                    <button id="<?=$row[0]; ?>" class="delete"> Delete </button>
                    </td>
                 <!--   <td width="8%">
                    <button id="<?=$row[0]; ?>" class="update" disabled> Update </button>
                    </td>-->
                     <td width="8%">
                    <button id="<?=$row[0]; ?>" class="selected"> Select </button>
                    </td>

              
               </tr>
            
		<?php		
}
		   }
?>

 <?php
		   if(isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;

			   if(isset($_POST['AuthorName'])){
				   $sql_select_journal="Select  * from journals where TeacherName like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_journal="Select  * from journals where ResearchTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			   elseif(isset($_POST['PublicationYear'])){
				   $sql_select_journal="Select  * from journals where PublishingYear= "."'".$_POST['PublicationYear']."'";
			   }
			   
			  else{
				   $sql_select_journal="Select  * from journals where Impactfactor= "."'".$_POST['ImpactFactor']."'";
			   }
			   
			   
			   $result1=mysqli_query($conn,$sql_select_journal) or die(mysqli_error($conn));
			  
			   if(mysqli_num_rows($result1)>0){
				   
				   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row[1];?>
                    </td>
                    <td>
                    <?= $row[3];?>
                    </td>
                    <td>
                    <?= $row[4];?>
                    </td>
                      <td>
                    <?= $row[5];?>
                    </td>
                      <td>
                    <?= $row[6];?>
                    </td>
                     
                     <td>
                    <?= $row[7];?>
                    </td>
                      <td>
                    <?= $row[8];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>

                  <td>
                    <?= $row[10];?>
                    </td>
                       <td>
                    <?= $row[11];?>
                    </td>
                       <td>
                    <?= $row[12];?>
                    </td>
                       <td>
                    <?= $row[13];?>
                    </td>
                       <td>
                    <?= $row[14];?>
                    </td>
                       <td>
                    <?= $row[15];?>
                    </td>
                       <td>
                    <?= $row[16];?>
                    </td>

               </tr>
            
		<?php		
}
		   }
		   
		   else{
			   echo "No result founds";
		   }
		   }		   
?>


</tbody>

 </table>  
 
</div>

<script>
  $(document).ready(function() {
                  $('#table1').css('width', $('#lefts').text().length * 5);
          })
</script>
</div>
</td>
<script type="text/javascript" >
        $(function() {
		    $(".delete").click(function(e) {
				e.preventDefault();
                var id = $(this).attr("id");
               
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "journal_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('journal11.php').fadeIn("slow");
	
                        }
                    });
                  
                }
                return false;
            });
        });
 </script>




<script type="text/javascript" >
        $(function() {
	
            $(".update").click(function(e) {
				e.preventDefault();
                var id = $(this).attr("id");
				var realvalues=new Array();
				$("#journalauthor :selected").each(function(i, selected){
					realvalues[i]=$(selected).val();
				});
    var papertitle=$("#papertitle").val();
    var sciregister=$("#sciregister").val();
    var ethical=$("#ethical").val();
	var journalname=$("#journalname").val();
    var journalyear=$("#journalyear").val();
    var IF=$("#IF").val();
	var vol=$("#vol").val();
    var no=$("#no").val();
    var pages=$("#pages").val();
	var country=$("#country").val();
	var doi=$("#doi").val();
	var weblink=$("#weblink").val();
	var published=$("#published").val();

       
                    $.ajax({
                        type : "POST",
                        url : "journal_update.php",
						async:false,
						data: ({
                        id: id,
	"journalauthor":realvalues,
    "papertitle1":34,
    "sciregister1":sciregister,
    "ethical1":ethical,
	"journalname1":journalname,
    "journalyear1":journalyear,
    "IF1":IF,
	"vol1":vol,
    "no1":no,
    "pages1":pages,
	"country1":country,
	"doi1":doi,
	"weblink1":weblink,
	"published1":published
	
                    }),
				
                  success : function(data) {
				  $("#div1").fadeOut('slow');
//				  $("#msg").html(data);
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
 
<script type="text/javascript" >
        $(function() {
		    $(".selected").click(function(e) {
				e.preventDefault();
                var id2 = $(this).attr("id");
                    $.post({
                        type:"POST",
						url:"a.php?q="+id2,
						async: false,
                        data:{
						'id3':1,
                        'id2':id2
                    },

                  success : function(data) {
					$('#selection').fadeOut('slow')
					$("#msg").html(data);
					 // $("#message11").html(data);
						  //.load('a.php');
                     
			} 
});	
                //return false;
            });
        });
 </script>

		 </div>
</body>
</html>
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

