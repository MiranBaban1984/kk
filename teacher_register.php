<?php
include("connection.php");

$response = array(); // Initialize response array

$sqlregister = "select * from teacherinfo where TeacherEmail=" . "'" . $_POST['email'] . "'";
$result111 = mysqli_query($conn, $sqlregister) or die(mysqli_error($conn));

if (mysqli_num_rows($result111) > 0) {
    $response['status'] = 'error';
    $response['message'] = 'Email already exists. Please choose a different one.';
} else {
    if (isset($_POST['done'])) {
        $user = $_POST['email'];
        $_SESSION['a'] = $user;
        $_SESSION['TeacherName'] = $_POST['fullname'];
        $sql_insert_teacher = "insert into teacherinfo(TeacherName,TeacherEmail,TeacherPassword,TeacherMobile) values('$_POST[fullname]','$_POST[email]',md5('$_POST[password]'),'$_POST[mobile]')";
        mysqli_query($conn, $sql_insert_teacher) or die(mysqli_error($conn));
        $user = $_POST['email'];
        $_SESSION['a'] = $user;
        $_SESSION['TeacherName'] = $_POST['fullname'];
    }

    $response['status'] = 'success';
    $response['message'] = 'Registration successful!';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
