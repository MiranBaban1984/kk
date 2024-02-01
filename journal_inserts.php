<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"scientificcommunity");

if(isset($_POST['done'])){
$q5 = implode('  ,', $_POST['journalauthor']);
$sql_insert_teacher="
insert into journals(JournalID,TeacherName,TeacherID,ResearchTitle,RegisterationDate,ApprovalDate,JournalName,PublishingYear,
Impactfactor,Volume,Issue,Pages,place,DOI,Weblink,Published) values('nyt422','$q5','','$_POST[papertitle1]','$_POST[sciregister1]','$_POST[ethical1]',
'$_POST[journalname1]','$_POST[journalyear1]','$_POST[IF1]','$_POST[vol1]','$_POST[no1]','$_POST[pages1]',
'$_POST[country1]','$_POST[doi1]','$_POST[weblink1]','$_POST[published1]')";	
mysqli_query($conn,$sql_insert_teacher) or die(mysqli_error($conn));
?>
