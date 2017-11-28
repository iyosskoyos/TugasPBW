<?php
include ('startSession.php');
include ('connection.php');
$id = $_SESSION['id'];
$ida = $_SESSION['ida'];

$sqlGetCourseCode = "SELECT DISTINCT code, course FROM courses WHERE $id = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];
$courseTitle = $rowCourseCode["course"];
$attachment = $_FILES['attachment']['name'];
$path="../upload/assignments/$courseCode/answer/".$_SESSION['userid']. "-" .$attachment;

//Setting untuk upload file
$extension_list = array('png','jpg', 'pdf', 'docx', 'zip');
$x = explode('.', $attachment);
$extension = strtolower(end($x));
$size = $_FILES['attachment']['size'];
$file_tmp = $_FILES['attachment']['tmp_name'];



if (file_exists($path)) {
move_uploaded_file($file_tmp, $path . "$attachment");
	$sqlInputActivity = "INSERT INTO submissions (`ID_A`, `ID_U`, `fileDirectory`) VALUES ('$ida','$id', '$path')";
	$mysqli->query($sqlInputActivity);
}else{
	mkdir($path, 0777, true);
move_uploaded_file($file_tmp, $path . "$attachment");
$sqlInputActivity = "INSERT INTO submissions (`ID_A`, `ID_U`, `fileDirectory`) VALUES ('$ida','$id', '$path')";
	$mysqli->query($sqlInputActivity);
}




?>

