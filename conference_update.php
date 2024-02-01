<?php
include("connection.php");

$id=$_POST['id'];
$a=$_POST['CoAuthor'];
$b=$_POST['ConferenceName'];
$c=$_POST['ResearchTitle'];
$d=$_POST['PublishYear'];
$e=$_POST['ConferenceLocation'];
$f=$_POST['ConferenceOrganizer'];
$g=$_POST['DOI'];
$h=$_POST['WebLink'];
$i=$_POST['Published'];


$q5 =implode('  ,',$a);
$update = "UPDATE conference SET 
ResearchTitle="."'".$c."',
ConferenceName="."'".$b."',
CoAuthor="."'".$q5."',
ConferenceOrganizer="."'".$f."',
ConferenceLocation="."'".$e."',
PublishYear="."'".$d."',
WebLink="."'".$h."',
DOI="."'".$g."',
Published="."'".$i."'".
"where ConferenceID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;
?>
