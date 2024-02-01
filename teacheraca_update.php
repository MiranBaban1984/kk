 <div align="right">
<?php
//connection
include("connection.php");


$sql_select_checker="Select  CheckerID from checkerinfo where Department="."'".$_POST['Department']."'";
$result1=mysqli_query($conn,$sql_select_checker) or die(mysqli_error($conn));
$rowcheck=mysqli_fetch_array($result1);

//main condition to check if the user log in
	if(isset($_SESSION['a'])){




//if the promotion file is set

		if(isset($_FILES['Lastfile11']) && !isset($_FILES['CV11'])){

		$files1=$_FILES['Lastfile11'];
		$filename1=$_FILES['Lastfile11']['name'];
		$fileerror1=$_FILES['Lastfile11']['error'];
		$filesize1=$_FILES['Lastfile11']['size'];
		$filetmp1=$_FILES['Lastfile11']['tmp_name'];
		$fileext1=explode(".",$filename1);
		$fileextactual1=strtolower(end($fileext1));
		$allowed1=array('pdf');
		
		if(in_array($fileextactual1,$allowed1)){
		 
		
		  if($fileerror1===0){
		  
			if($filesize1 < (11*1024*1024)){
			 
			  $filenamenew1=uniqid('',true).".".$fileextactual1;
			  $filedest1='uploadsPromotion/'.$filenamenew1;
		
			  $files1="<a href='$filenamenew1'>view</a>";
			  move_uploaded_file($filetmp1,$filedest1);
		
			}else{
				echo '<script>alert("Your file is bigger than 11MB")</script>';
			  }
			
		
		  }else{
			echo '<script>alert("Your file has error check your pdf file")</script>';  
		  }
		
		}else{
		
		  echo "<script>alert('$fileerror1')</script>"; 
		
		}


		$id=$_POST['id'];
		$d=$_POST['Certificate'];
		$e=$_POST['AcademicTitle'];
		$f=$_POST['Department'];
		$g=$_POST['Speciality'];
		//$h=$_POST['NumberofResearch'];
		$i=$_POST['DateofLastTitle'];
		$j=$_POST['DiplomaTitle'];
		$k=$_POST['MasterTitle'];
		$l=$_POST['PHDTitle'];
		$m=$_POST['NumberofMasterStudent'];
		$n=$_POST['NumberofPHD'];
		$o=$_POST['NumberofDiploma'];
		$r=$_POST['googlescholar11'];
		$s=$_POST['orcid11'];
		$tt=$rowcheck[0];
		
		$update="UPDATE teacher SET 
		Certificate="."'".$d."',
		AcademicTitle="."'".$e."',
		Department="."'".$f."',
		Speciality="."'".$g."',
		
		DateofLastTitle="."'".$i."',
		DiplomaTitle="."'".$j."',
		MasterTitle="."'".$k."',
		PHDTitle="."'".$l."',
		NumberofMasterStudent="."'".$m."',
		NumberofPHD="."'".$n."',
		NumberofDiploma="."'".$o."',
		GoogleScholar="."'".$r."',
		ORCID="."'".$s."',"."Promotion="."'<a href=$filedest1 target=_blank>view</a>', 
		CheckerID=".$tt." where TeacherID="."'".$id."'"; 
		//echo $update;
		$result=mysqli_query($conn,$update) or die(mysqli_error($conn));


	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////


//if the cv file is set

	if(!isset($_FILES['Lastfile11']) && isset($_FILES['CV11'])){


		$files=$_FILES['CV11'];
		$filename=$_FILES['CV11']['name'];
		$fileerror=$_FILES['CV11']['error'];
		$filesize=$_FILES['CV11']['size'];
		$filetmp=$_FILES['CV11']['tmp_name'];
		$fileext=explode(".",$filename);
		$fileextactual=strtolower(end($fileext));
		$allowed=array('pdf');
		
		if(in_array($fileextactual,$allowed)){
		 
		
		  if($fileerror===0){
		  
			if($filesize < (11*1024*1024)){
			 
			  $filenamenew=uniqid('',true).".".$fileextactual;
			  $filedest='CV/'.$filenamenew;
		
			  $files1="<a href='$filenamenew'>view</a>";
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
		$d=$_POST['Certificate'];
		$e=$_POST['AcademicTitle'];
		$f=$_POST['Department'];
		$g=$_POST['Speciality'];
		//$h=$_POST['NumberofResearch'];
		$i=$_POST['DateofLastTitle'];
		$j=$_POST['DiplomaTitle'];
		$k=$_POST['MasterTitle'];
		$l=$_POST['PHDTitle'];
		$m=$_POST['NumberofMasterStudent'];
		$n=$_POST['NumberofPHD'];
		$o=$_POST['NumberofDiploma'];
		$r=$_POST['googlescholar11'];
		$s=$_POST['orcid11'];
		$tt=$rowcheck[0];
		
		$update="UPDATE teacher SET 
		Certificate="."'".$d."',
		AcademicTitle="."'".$e."',
		Department="."'".$f."',
		Speciality="."'".$g."',
		
		DateofLastTitle="."'".$i."',
		DiplomaTitle="."'".$j."',
		MasterTitle="."'".$k."',
		PHDTitle="."'".$l."',
		NumberofMasterStudent="."'".$m."',
		NumberofPHD="."'".$n."',
		NumberofDiploma="."'".$o."',
		GoogleScholar="."'".$r."',
		ORCID="."'".$s."',
		CV="."'<a href=$filedest target=_blank>view</a>',
		CheckerID=".$tt." where TeacherID="."'".$id."'"; 
		//echo $update;
		$result=mysqli_query($conn,$update) or die(mysqli_error($conn));

	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//////IF isset both file types

if (isset($_FILES['Lastfile11']) && isset($_FILES['CV11'])){

////this is promotion file upload

$files1=$_FILES['Lastfile11'];
$filename1=$_FILES['Lastfile11']['name'];
$fileerror1=$_FILES['Lastfile11']['error'];
$filesize1=$_FILES['Lastfile11']['size'];
$filetmp1=$_FILES['Lastfile11']['tmp_name'];
$fileext1=explode(".",$filename1);
$fileextactual1=strtolower(end($fileext1));
$allowed1=array('pdf');

if(in_array($fileextactual1,$allowed1)){
 

  if($fileerror1===0){
  
	if($filesize1 < (11*1024*1024)){
	 
	  $filenamenew1=uniqid('',true).".".$fileextactual1;
	  $filedest1='uploadsPromotion/'.$filenamenew1;

	  $files1="<a href='$filenamenew1'>view</a>";
	  move_uploaded_file($filetmp1,$filedest1);

	}else{
		echo '<script>alert("Your file is bigger than 11MB")</script>';
	  }
	

  }else{
	echo '<script>alert("Your file has error check your pdf file")</script>';  
  }

}else{

  echo "<script>alert('$fileerror1')</script>"; 

}



//////this is cv file upload
	$files=$_FILES['CV11'];
	$filename=$_FILES['CV11']['name'];
	$fileerror=$_FILES['CV11']['error'];
	$filesize=$_FILES['CV11']['size'];
	$filetmp=$_FILES['CV11']['tmp_name'];
	$fileext=explode(".",$filename);
	$fileextactual=strtolower(end($fileext));
	$allowed=array('pdf');
	
	if(in_array($fileextactual,$allowed)){
	 
	
	  if($fileerror===0){
	  
		if($filesize < (11*1024*1024)){
		 
		  $filenamenew=uniqid('',true).".".$fileextactual;
		  $filedest='CV/'.$filenamenew;
	
		  $files1="<a href='$filenamenew'>view</a>";
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
	$d=$_POST['Certificate'];
	$e=$_POST['AcademicTitle'];
	$f=$_POST['Department'];
	$g=$_POST['Speciality'];
	//$h=$_POST['NumberofResearch'];
	$i=$_POST['DateofLastTitle'];
	$j=$_POST['DiplomaTitle'];
	$k=$_POST['MasterTitle'];
	$l=$_POST['PHDTitle'];
	$m=$_POST['NumberofMasterStudent'];
	$n=$_POST['NumberofPHD'];
	$o=$_POST['NumberofDiploma'];
	$r=$_POST['googlescholar11'];
	$s=$_POST['orcid11'];
	$tt=$rowcheck[0];
	
	$update="UPDATE teacher SET 
	Certificate="."'".$d."',
	AcademicTitle="."'".$e."',
	Department="."'".$f."',
	Speciality="."'".$g."',
	
	DateofLastTitle="."'".$i."',
	DiplomaTitle="."'".$j."',
	MasterTitle="."'".$k."',
	PHDTitle="."'".$l."',
	NumberofMasterStudent="."'".$m."',
	NumberofPHD="."'".$n."',
	NumberofDiploma="."'".$o."',
	GoogleScholar="."'".$r."',
	ORCID="."'".$s."',
	CV="."'<a href=$filedest target=_blank>view</a>',"."Promotion="."'<a href=$filedest1 target=_blank>view</a>',
	CheckerID=".$tt." where TeacherID="."'".$id."'"; 
	//echo $update;
	$result=mysqli_query($conn,$update) or die(mysqli_error($conn));



}





////////////////////////////////////////////////////////////////////////////////////////////////////////




if (!isset($_FILES['Lastfile11']) && !isset($_FILES['CV11'])){

	$id=$_POST['id'];
	$d=$_POST['Certificate'];
	$e=$_POST['AcademicTitle'];
	$f=$_POST['Department'];
	$g=$_POST['Speciality'];
	//$h=$_POST['NumberofResearch'];
	$i=$_POST['DateofLastTitle'];
	$j=$_POST['DiplomaTitle'];
	$k=$_POST['MasterTitle'];
	$l=$_POST['PHDTitle'];
	$m=$_POST['NumberofMasterStudent'];
	$n=$_POST['NumberofPHD'];
	$o=$_POST['NumberofDiploma'];
	$r=$_POST['googlescholar11'];
	$s=$_POST['orcid11'];
	$tt=$rowcheck[0];
	
	$update="UPDATE teacher SET 
	Certificate="."'".$d."',
	AcademicTitle="."'".$e."',
	Department="."'".$f."',
	Speciality="."'".$g."',
	DateofLastTitle="."'".$i."',
	DiplomaTitle="."'".$j."',
	MasterTitle="."'".$k."',
	PHDTitle="."'".$l."',
	NumberofMasterStudent="."'".$m."',
	NumberofPHD="."'".$n."',
	NumberofDiploma="."'".$o."',
	GoogleScholar="."'".$r."', ORCID="."'".$s."',
	CheckerID=".$tt." where TeacherID="."'".$id."'"; 
	//echo $update;
	$result=mysqli_query($conn,$update) or die(mysqli_error($conn));

}




/////////////////////////////////////////////////////////////////////////////////////////////////////

//// this part related to the php code for login member

	echo "<p> <h3>Your login with ".$_SESSION['a']."<h3> </p>";




	
		}
?>
     



     <p><a href='sesdestroy.php'>logout</a></p>
     </div>
/////////////////////////////////////////////////////////////////////////////////////////////////////
