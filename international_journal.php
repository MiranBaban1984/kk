<?php
include("connection.php");
?>
<html>
<head>
<title>International Journal Details Insertion Form</title>
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
	echo "<p> <h3>Your login with ".$_SESSION['TeacherName']."<h3> </p>";
		}

    elseif(isset($_SESSION['b'])){
      echo "<p> <h3>Your login with   ".$_SESSION['checker']."<h3> </p>";
    }

    else{
      echo "<p> <h3>Your login with   ".$_SESSION['admins']."<h3> </p>";
    }
    
?>
     
     <p><a href='sesdestroy.php'>logout</a></p>
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
   <h2>International Journal Details Insertion Form</h2>
   </legend>


   <label>
      Paper Type
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="papertype" required>
<option value="Original" selected>Original</option>
<option value="Review">Review</option>
<option value="Systematic Review">Systematic Review</option>
<option value="Case Series">Case Series Review</option>
<option value="Case Report">Case Report Review</option>
			</select>
    </label>


   
    <label>
      Paper Title
        <input type="text" placeholder="ICET (Internation conference Electronical Technology)" id="papertitle" name="papertitle" required />
    </label>
          
              <label>
              Order of Author Place
      <input type="number" required min="0" max="1000" step="1" value="0"  id="authorplace" name="authorplace" required />
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
        <input type="text"  placeholder="International journal of Informatic" name="journalname" id="journalname" required />
    </label>

    <label>
      Publisher (Organization)
        <input type="text"  placeholder="Springer" required id="publisher" name="publisher" rquired />
    </label>
    
    <label>
      Date of Publication
<!-- <input type="number" required min="1900" max="2099" step="1" value="2016"  id="journalyear" name="journalyear" required />  -->

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
<input type="date" placeholder="14-11-1984"  id="sciregister" name="sciregister"  required /> 
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
Country
 <select  class="limitedNumbChosen" style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="country" name="country" required>
<option value="" selected>Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
           
    </label>

        <label>
      DOI (If present)
      <input type="text" name="doi" placeholder="ICET/1254/ICETJ1" value="" id="doi" required />
    </label>
    
        <label>
      Weblink
      <input type="text" name="weblink" placeholder="http://www.example.com" value="" id="weblink" required />
    </label>






    <label>
      indexing
 <select  class="limitedNumbChosen"style="width: 450px; height: 30px; direction: ltr" dir="ltr" id="indexing" required>
<option value="Scopus" selected>Scopus</option>
<option value="None Scopus">None Scopus</option>
<option value="Clarivate">Clarivate</option>
</select>
    </label>


        <label>
        Upload paper file (PDF File. Max 10MB)
      <input type="file" name="file" id="file" accept=".pdf" required />
    </label>

    <label>
    Upload ethic file (PDF File. Max 10MB)
      <input type="file" name="Ethicfile" id="Ethicfile" accept=".pdf" required />
    </label>

</fieldset>  
			
			
  <fieldset class="account-action">
    <input class="btn" type="submit"  value="Add" id="Insertdata" name="Insertdata"/>
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
	var country=$("#country").val();
	var doi=$("#doi").val();
	var weblink=$("#weblink").val();
	var ethicalno=$("#ethicalno").val();
  var publisher=$("#publisher").val();
  var papertype=$("#papertype").val();
  var indexing=$("#indexing").val();
  var multitext=$("#multitext").val();
  var fileInput = $('#file')[0];
  var file = fileInput.files[0];
  // var LastfileInput = $('#Lastfile')[0];
  // var Lastfile = LastfileInput.files[0];
  var EthicfileInput = $('#Ethicfile')[0];
  var Ethicfile = EthicfileInput.files[0];
	var dn=1;



  if (
    authorplace === "" ||
    papertitle === "" ||
    sciregister === "" ||
    ethical === "" ||
    journalname === "" ||
    journalyear === "" ||
    IF === "" ||
    vol === "" ||
    no === "" ||
    pages === "" ||
    country === "" ||
    doi === "" ||
    weblink === "" ||
    ethicalno === "" ||
    publisher === "" ||
    papertype === "" ||
    indexing === "" ||
    fileInput === "" ||
    file === "" ||
    multitext === "" ||
    EthicfileInput === "" ||
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
    formData.append('country', country);
    formData.append('doi', doi);
    formData.append('weblink', weblink);
    formData.append('publisher', publisher);
    formData.append('file', file);
    formData.append('papertype', papertype);
    formData.append('indexing', indexing);
    formData.append('multitext', multitext);
    formData.append('Ethicfile', Ethicfile);
    formData.append('ethicalno', ethicalno);


    $.ajax({
        url: "internationaljournal11.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          //alert(data);
            $("#msg").html(data);
            fromhide1();
        }
    });
	
	 });
	  
   function fromhide1(){
		$.ajax({
		url:"international_journal.php",
		type:"POST",
		async:false,
		success:function(data){
		$('#t1').fadeOut('slow').load('internationaljournal11.php').fadeIn("slow");
		fromhide2();
		}
	});
	
	}

	function fromhide2(){
		$.ajax({
		url:"international_journal.php",
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
			$('#journalauthor').val('').trigger('chosen:updated');
			$('#country').val('').trigger('chosen:updated');
    }
	
	
  </script>
    <?php
	}
	?>
  
</td>

	<td valign="top" id="t1">

<?php
	
	include("internationaljournal11.php");
		
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


