<?php
include("connection.php"); 
$id=$_POST['id'];
$a=$_POST['FullName'];
$b=$_POST['Email'];
$c=$_POST['Mobile'];
$d=$_POST['Certificate'];
$e=$_POST['AcademicTitle'];
$f=$_POST['Department'];
$g=$_POST['Speciality'];
$h=$_POST['NumberofResearch'];
$i=$_POST['DateofLastTitle'];
$j=$_POST['DiplomaTitle'];
$k=$_POST['MasterTitle'];
$l=$_POST['PHDTitle'];
$m=$_POST['NumberofMasterStudent'];
$n=$_POST['NumberofPHD'];
$o=$_POST['NumberofDiploma'];
$update="UPDATE teacher SET FullName="."'".$a."',
Email="."'".$b."',
Mobile="."'".$c."',
Certificate="."'".$d."',
AcademicTitle="."'".$e."',
Department="."'".$f."',
Speciality="."'".$g."',
NumberofResearch="."'".$h."',
DateofLastTitle="."'".$i."',
DiplomaTitle="."'".$j."',
MasterTitle="."'".$k."',
PHDTitle="."'".$l."',
NumberofMasterStudent="."'".$m."',
NumberofPHD="."'".$n."',
NumberofDiploma="."'".$o."'"." where TeacherID="."'".$id."'"; 
$result=mysqli_query($conn,$update) or die(mysqli_error($conn));
echo $update;
echo "b= ".$b;
?>
