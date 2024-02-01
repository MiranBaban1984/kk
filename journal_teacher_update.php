<?php
include("connection.php");



//only the paper file is set
if(isset($_FILES['file11']) && !isset($_FILES['Ethicfile11'])){

$files=$_FILES['file11'];
$filename=$_FILES['file11']['name'];
$fileerror=$_FILES['file11']['error'];
$filesize=$_FILES['file11']['size'];
$filetmp=$_FILES['file11']['tmp_name'];
$fileext=explode(".",$filename);
$fileextactual=strtolower(end($fileext));
$allowed=array('pdf');

if(in_array($fileextactual,$allowed)){
 

  if($fileerror===0){
  
    if($filesize < (11*1024*1024)){
     
      $filenamenew=uniqid('',true).".".$fileextactual;
      $filedest='uploads/'.$filenamenew;

      $files1 = "<a href='uploads/$filenamenew' target='_blank'>view</a>";
      move_uploaded_file($filetmp,$filedest);

    }else{
        echo '<script>alert("Your file is bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror')</script>"; 

}


$id=$_POST['id'];
$a=$_POST['authorplace11'];
$b=$_POST['papertitle11'];
$c=$_POST['sciregister11'];
$d=$_POST['ethical11'];
$e=$_POST['journalname11'];
$f=$_POST['journalyear11'];
$g=$_POST['IF11'];
$h=$_POST['vol11'];
$i=$_POST['no11'];
$j=$_POST['pages11'];
//$k=$_POST['country11'];
$l=$_POST['doi11'];
$m=$_POST['weblink11'];
$o=$_POST['ethicalno11'];
$r=$_POST['publisher11'];
$s=$_POST['papertype11'];
$t=$_POST['multitext11'];


$q5 =$_POST['authorplace11'];
$update = "UPDATE journals SET 
TeacherName="."'".$q5."',
ResearchTitle="."'".$b."',
RegisterationDate="."'".$c."',
ApprovalDate="."'".$d."',
EthicalNumber="."'".$o."',
JournalName="."'".$e."',
PublishingYear="."'".$f."',
ImpactFactor="."'".$g."',
Volume="."'".$h."',
Issue="."'".$i."',
Pages="."'".$j."',
DOI="."'".$l."',
Weblink="."'".$m."',
publisher="."'".$r."',
PaperType="."'".$s."',
Keyword="."'".$t."',
File="."'<a href=$filedest target=_blank>view</a>'"."where JournalID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;







}


///////////////////////////////////////////////////////////////////////////////////


//only the ethic file is set
if(isset($_FILES['Ethicfile11']) && !isset($_FILES['file11'])){
$files2=$_FILES['Ethicfile11'];
$filename2=$_FILES['Ethicfile11']['name'];
$fileerror2=$_FILES['Ethicfile11']['error'];
$filesize2=$_FILES['Ethicfile11']['size'];
$filetmp2=$_FILES['Ethicfile11']['tmp_name'];
$fileext2=explode(".",$filename2);
$fileextactual2=strtolower(end($fileext2));
$allowed2=array('pdf');

if(in_array($fileextactual2,$allowed2)){
 

  if($fileerror2===0){
  
    if($filesize2 < (11*1024*1024)){
     
      $filenamenew2=uniqid('',true).".".$fileextactual2;
      $filedest2='uploadsEthics/'.$filenamenew2;

      $files2 = "<a href='uploadsEthics/$filenamenew2' target='_blank'>view</a>";
      move_uploaded_file($filetmp2,$filedest2);

    }else{
        echo '<script>alert("Your file is bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror2')</script>"; 

}


$id=$_POST['id'];
$a=$_POST['authorplace11'];
$b=$_POST['papertitle11'];
$c=$_POST['sciregister11'];
$d=$_POST['ethical11'];
$e=$_POST['journalname11'];
$f=$_POST['journalyear11'];
$g=$_POST['IF11'];
$h=$_POST['vol11'];
$i=$_POST['no11'];
$j=$_POST['pages11'];
//$k=$_POST['country11'];
$l=$_POST['doi11'];
$m=$_POST['weblink11'];
$o=$_POST['ethicalno11'];
$r=$_POST['publisher11'];
$s=$_POST['papertype11'];
$t=$_POST['multitext11'];


$q5 =$_POST['authorplace11'];
$update = "UPDATE journals SET 
TeacherName="."'".$q5."',
ResearchTitle="."'".$b."',
RegisterationDate="."'".$c."',
ApprovalDate="."'".$d."',
EthicalNumber="."'".$o."',
JournalName="."'".$e."',
PublishingYear="."'".$f."',
ImpactFactor="."'".$g."',
Volume="."'".$h."',
Issue="."'".$i."',
Pages="."'".$j."',

DOI="."'".$l."',
Weblink="."'".$m."',
publisher="."'".$r."',
PaperType="."'".$s."',
Keyword="."'".$t."',"."Ethics="."'<a href=$filedest2 target=_blank>view</a>'"."where JournalID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;

}









//////////////////////////////////////////////////////////////////////////////////////////








//IF isset both file types

if (isset($_FILES['Ethicfile11']) && isset($_FILES['file11'])){

  //paper file

  $files=$_FILES['file11'];
  $filename=$_FILES['file11']['name'];
  $fileerror=$_FILES['file11']['error'];
  $filesize=$_FILES['file11']['size'];
  $filetmp=$_FILES['file11']['tmp_name'];
  $fileext=explode(".",$filename);
  $fileextactual=strtolower(end($fileext));
  $allowed=array('pdf');
  
  if(in_array($fileextactual,$allowed)){
   
  
    if($fileerror===0){
    
      if($filesize < (11*1024*1024)){
       
        $filenamenew=uniqid('',true).".".$fileextactual;
        $filedest='uploads/'.$filenamenew;
  
        $files1 = "<a href='uploads/$filenamenew' target='_blank'>view</a>";
        move_uploaded_file($filetmp,$filedest);
  
      }else{
          echo '<script>alert("Your file is bigger than 11MB")</script>';
        }
      
  
    }else{
      echo '<script>alert("Your file has error check your pdf file")</script>';  
    }
  
  }else{
  
    echo "<script>alert('$fileerror')</script>"; 
  
  }



///ethics file
$files2=$_FILES['Ethicfile11'];
$filename2=$_FILES['Ethicfile11']['name'];
$fileerror2=$_FILES['Ethicfile11']['error'];
$filesize2=$_FILES['Ethicfile11']['size'];
$filetmp2=$_FILES['Ethicfile11']['tmp_name'];
$fileext2=explode(".",$filename2);
$fileextactual2=strtolower(end($fileext2));
$allowed2=array('pdf');

if(in_array($fileextactual2,$allowed2)){
 

  if($fileerror2===0){
  
    if($filesize2 < (11*1024*1024)){
     
      $filenamenew2=uniqid('',true).".".$fileextactual2;
      $filedest2='uploadsEthics/'.$filenamenew2;

      $files2 = "<a href='uploadsEthics/$filenamenew2' target='_blank'>view</a>";
      move_uploaded_file($filetmp2,$filedest2);

    }else{
        echo '<script>alert("Your file is bigger than 11MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror2')</script>"; 

}

$id=$_POST['id'];
$a=$_POST['authorplace11'];
$b=$_POST['papertitle11'];
$c=$_POST['sciregister11'];
$d=$_POST['ethical11'];
$e=$_POST['journalname11'];
$f=$_POST['journalyear11'];
$g=$_POST['IF11'];
$h=$_POST['vol11'];
$i=$_POST['no11'];
$j=$_POST['pages11'];
//$k=$_POST['country11'];
$l=$_POST['doi11'];
$m=$_POST['weblink11'];
$o=$_POST['ethicalno11'];
$r=$_POST['publisher11'];
$s=$_POST['papertype11'];
$t=$_POST['multitext11'];


$q5 =$_POST['authorplace11'];
$update = "UPDATE journals SET 
TeacherName="."'".$q5."',
ResearchTitle="."'".$b."',
RegisterationDate="."'".$c."',
ApprovalDate="."'".$d."',
EthicalNumber="."'".$o."',
JournalName="."'".$e."',
PublishingYear="."'".$f."',
ImpactFactor="."'".$g."',
Volume="."'".$h."',
Issue="."'".$i."',
Pages="."'".$j."',

DOI="."'".$l."',
Weblink="."'".$m."',
publisher="."'".$r."',
PaperType="."'".$s."',
Keyword="."'".$t."',
File="."'<a href=$filedest target=_blank>view</a>',"."Ethics="."'<a href=$filedest2 target=_blank>view</a>'"."where JournalID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//if not is set any upload files
if (!isset($_FILES['Ethicfile11']) && !isset($_FILES['file11'])){

  $id=$_POST['id'];
$a=$_POST['authorplace11'];
$b=$_POST['papertitle11'];
$c=$_POST['sciregister11'];
$d=$_POST['ethical11'];
$e=$_POST['journalname11'];
$f=$_POST['journalyear11'];
$g=$_POST['IF11'];
$h=$_POST['vol11'];
$i=$_POST['no11'];
$j=$_POST['pages11'];
$l=$_POST['doi11'];
$m=$_POST['weblink11'];
$o=$_POST['ethicalno11'];
$r=$_POST['publisher11'];
$s=$_POST['papertype11'];
$t=$_POST['multitext11'];

$q5 =$_POST['authorplace11'];
$update = "UPDATE journals SET 
TeacherName="."'".$q5."',
ResearchTitle="."'".$b."',
RegisterationDate="."'".$c."',
ApprovalDate="."'".$d."',
EthicalNumber="."'".$o."',
JournalName="."'".$e."',
PublishingYear="."'".$f."',
ImpactFactor="."'".$g."',
Volume="."'".$h."',
Issue="."'".$i."',
Pages="."'".$j."',

DOI="."'".$l."',
Weblink="."'".$m."',
publisher="."'".$r."',
PaperType="."'".$s."',
Keyword="."'".$t."'"." where JournalID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;

}
  ?>




















