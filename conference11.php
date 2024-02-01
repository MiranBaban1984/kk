<html>
<head>
<title>Conference Details Form Insertion</title>
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
      
      <p id="msg"></p> 
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
             <form method="post" action="exportconference.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
<div class="container" id="tables">
       <table class="table table-bordered table-striped" id="table1" style="width: 100%;">
            <thead>
                <tr id="lefts">
                    <th>Authours</th>
                    <th>Conefernce Name</th>
					<th>Publisher</th>
                    <th>Year</th>
                    <th>Place</th>
                    <th>Paper title</th>
                    <th>DOI</th>
                    <th>Web-Link</th>
                    <th>Published</th>
                    <th>Conference File</th>

              </tr>
            </thead>
<?php
include("connection.php");

			
if(isset($_POST['done'])){
$length = 6;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$q5 = implode('  ,', $_POST['CoAuthor']);	
	echo $q5;
$sql_insert_conference="
insert into conference(ResearchTitle,CoAuthor,ConferenceOrganizer,ConferenceName,ConferenceLocation,Published,WebLink,
PublishYear,doi) values('$_POST[title]','$q5','$_POST[publisher]','$_POST[name]',
'$_POST[country]','$_POST[published]','$_POST[weblink]','$_POST[year]','$_POST[doi]')";
mysqli_query($conn,$sql_insert_conference) or die(mysqli_error($conn));
}
	?>
           <?php
		   if(!isset($_POST['aa']))
		   {
		   ?>
            <tbody id="table-body">
              <?php
				$i=0;
$sql_select_conference="Select  * from conference order by ConferenceID";
$result1=mysqli_query($conn,$sql_select_conference) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row[2];?>
                    </td>
                    <td>
                    <?= $row[4];?>
                    </td>
                    <td>
                    <?= $row[3];?>
                    </td>
                      <td>
                    <?= $row[8];?>
                    </td>
                      <td>
                    <?= $row[5];?>
                    </td>
                      <td>
                    <?= $row[1];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>

                  <td>
                    <?= $row[7];?>
                    </td>

                   
                  <td>
                    <?= $row[6];?>
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
			
?>
</tbody>
<?php
		   }?>


<?php
		   if(isset($_POST['aa'])){
?>   
			    <tbody id="table-body">
              <?php
				$i=0;
			   
			   if(isset($_POST['AuthorName'])){
				   $sql_select_conference="Select  * from conference where CoAuthor like "."'%".$_POST['AuthorName']."%'";
			   }
			   
						   
			  else if(isset($_POST['RsearchTitle'])){
				   $sql_select_conference="Select  * from conference where ResearchTitle like "."'%".$_POST['RsearchTitle']."%'";

			   }
			   
			   
			  else{
				   $sql_select_conference="Select  * from conference where PublishYear= "."'".$_POST['PublicationYear']."'";
			   }

$result1=mysqli_query($conn,$sql_select_conference) or die(mysqli_error($conn));
			   if(mysqli_num_rows($result1)>0){
		
			   while ($row=mysqli_fetch_array($result1)){
	
           ?>
                 <tr class="delete_mem<?php echo $row[0];?>">
                    <td>
                    <?= $row[2];?>
                    </td>
                    <td>
                    <?= $row[4];?>
                    </td>
                    <td>
                    <?= $row[3];?>
                    </td>
                      <td>
                    <?= $row[8];?>
                    </td>
                      <td>
                    <?= $row[5];?>
                    </td>
                      <td>
                    <?= $row[1];?>
                    </td>
                       <td>
                    <?= $row[9];?>
                    </td>
                  <td>
                    <?= $row[7];?>
                    </td>
                  <td>
                    <?= $row[6];?>
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
                  $('#table1').css('width', $('#lefts').text().length * 7);
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
                        url : "Conference_delete.php", //URL to the delete php script
                        data: ({
                        id: id
                    }),
                        success : function() {

					 $(".delete_mem" + id).fadeOut('slow');	$('#div1').fadeOut('slow').load('conference11.php').fadeIn("slow");
	
                        }
                    });
                  
                }
                return false;
            });
        });
 </script>





 
<script type="text/javascript" >
        $(function() {
		    $(".selected").click(function(e) {
				e.preventDefault();
                var id2 = $(this).attr("id");
                    $.post({
                        type:"POST",
						url:"d.php?q2="+id2,
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
