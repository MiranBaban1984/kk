<?php
include("connection.php");




if (isset($_FILES['conferencefile11'])){
$files2=$_FILES['conferencefile11'];
$filename2=$_FILES['conferencefile11']['name'];
$fileerror2=$_FILES['conferencefile11']['error'];
$filesize2=$_FILES['conferencefile11']['size'];
$filetmp2=$_FILES['conferencefile11']['tmp_name'];
$fileext2=explode(".",$filename2);
$fileextactual2=strtolower(end($fileext2));
$allowed2=array('pdf');

if(in_array($fileextactual2,$allowed2)){
 

  if($fileerror2===0){
  
    if($filesize2 < (11*1024*1024)){
     
      $filenamenew2=uniqid('',true).".".$fileextactual2;
      $filedest2='uploadsEthics/'.$filenamenew2;

      $files2="<a href='$filenamenew2'>view</a>";
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
$b=$_POST['ConferenceName'];
$c=$_POST['ResearchTitle'];
$d=$_POST['PublishYear'];
$e=$_POST['ConferenceLocation'];
$f=$_POST['ConferenceOrganizer'];
$g=$_POST['DOI'];
$h=$_POST['WebLink'];
$i=$_POST['conftype11'];
$j=$_POST['venue11'];



$q5 =$_POST['authorplace11'];

$update = "UPDATE conference SET 
ResearchTitle="."'".$c."',
ConferenceName="."'".$b."',
CoAuthor="."'".$q5."',
ConferenceOrganizer="."'".$f."',
ConferenceLocation="."'".$e."',
PublishYear="."'".$d."',
WebLink="."'".$h."',
DOI="."'".$g."',
ConfType="."'".$i."',"."Venue="."'".$j."',"."ConfType="."'".$i."',"."File="."'<a href=$filedest2 target=_blank>view</a>'"." where ConferenceID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;


}


else{


  $id=$_POST['id'];
  $a=$_POST['authorplace11'];
  $b=$_POST['ConferenceName'];
  $c=$_POST['ResearchTitle'];
  $d=$_POST['PublishYear'];
  $e=$_POST['ConferenceLocation'];
  $f=$_POST['ConferenceOrganizer'];
  $g=$_POST['DOI'];
  $h=$_POST['WebLink'];
  $i=$_POST['conftype11'];
  $j=$_POST['venue11'];
  
  
  
  $q5 =$_POST['authorplace11'];
  
  $update = "UPDATE conference SET 
  ResearchTitle="."'".$c."',
  ConferenceName="."'".$b."',
  CoAuthor="."'".$q5."',
  ConferenceOrganizer="."'".$f."',
  ConferenceLocation="."'".$e."',
  PublishYear="."'".$d."',
  WebLink="."'".$h."',
  DOI="."'".$g."',
  ConfType="."'".$i."',"."Venue="."'".$j."',"."ConfType="."'".$i."'"." where ConferenceID=".$id; 
  $result = mysqli_query($conn,$update) or die(mysqli_error($conn));
  //echo $update;


}




?>
