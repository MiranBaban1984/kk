<?php
include("connection.php");

$files=$_FILES['bookfile11'];
$filename=$_FILES['bookfile11']['name'];
$fileerror=$_FILES['bookfile11']['error'];
$filesize=$_FILES['bookfile11']['size'];
$filetmp=$_FILES['bookfile11']['tmp_name'];
$fileext=explode(".",$filename);
$fileextactual=strtolower(end($fileext));
$allowed=array('pdf');

if(in_array($fileextactual,$allowed)){
 

  if($fileerror===0){
  
    if($filesize < 1000000){
     
      $filenamenew=uniqid('',true).".".$fileextactual;
      $filedest='uploadsBooks/'.$filenamenew;

      $files1="<a href='$filenamenew'>view</a>";
      move_uploaded_file($filetmp,$filedest);

    }else{
        echo '<script>alert("Your file is bigger than 100MB")</script>';
      }
    

  }else{
    echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror')</script>"; 

}




$id=$_POST['id'];
$a=$_POST['booktitle11'];
$b=$_POST['bookauthorplace11'];
$c=$_POST['year111'];
$d=$_POST['publicationplace11'];
$e=$_POST['publicationorganization11'];
$f=$_POST['bookisbn11'];
$g=$_POST['bookdoi11'];
$h=$_POST['booklink11'];
$i=$_POST['booktype11'];


$q5 =$_POST['bookauthorplace11'];
$update = "UPDATE books SET 
BookTitle="."'".$a."',
CoAuthor="."'".$q5."',
PublishYear="."'".$c."',
Place="."'".$d."',
Publisher="."'".$e."',
ISBN="."'".$f."',
DOI="."'".$g."',
WebLink="."'".$h."',
File="."'<a href=$filedest target=_blank>view</a>',"."BookType="."'".$i."'"." where BookID=".$id; 
$result = mysqli_query($conn,$update) or die(mysqli_error($conn));
echo $update;
?>
