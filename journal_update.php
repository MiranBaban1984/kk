<?php
include("connection.php");

$id=$_POST['id'];

$a=$_POST['journalauthor'];
$b=$_POST['papertitle1'];
$c=$_POST['sciregister1'];
$d=$_POST['ethical1'];
$e=$_POST['journalname1'];
$f=$_POST['journalyear1'];
$g=$_POST['IF1'];
$h=$_POST['vol1'];
$i=$_POST['no1'];
$j=$_POST['pages1'];
$k=$_POST['country1'];
$l=$_POST['doi1'];
$m=$_POST['weblink1'];
$n=$_POST['published1'];
$o=$_POST['ethicalno'];

$q5 =implode('  ,',$a);
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
place="."'".$k."',
DOI="."'".$l."',
Weblink="."'".$m."',
Published="."'".$n."'"."where JournalID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
//echo $update;

?>
