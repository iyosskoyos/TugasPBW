<?php
include('connection.php'); 
include('startSession.php');
$idcourse = $_SESSION['id_course'];
$idtopic = $_SESSION['id_topic'];
$acctypes = $_SESSION['id_acctypes'];
$sqlGetCourseCode = "SELECT DISTINCT code, course FROM courses WHERE $idcourse = courses.ID_C;";
$resultCourseCode = $mysqli->query($sqlGetCourseCode);
$rowCourseCode = $resultCourseCode->fetch_assoc();
$courseCode = $rowCourseCode["code"];
$courseTitle = $rowCourseCode["course"];




if($acctypes==1){
	$name = $_POST['name'];
	$description = $_POST['description'];
	if(isset($_POST['startDate'])){
		$dateOpen = date("Y-m-d", strtotime($_POST['startDate']));
	}
	else{
		$dateOpen = "NULL";
	}
	if(isset($_POST['endDate'])){
		$dateClosed = date("Y-m-d", strtotime($_POST['endDate']));
	}
	else{
		$dateClosed = "NULL";
	}
	if($_FILES['attachment']['name']!=""){
		$filename = '../upload/assignments/'."$courseCode";
		//Setting untuk upload file
		$extension_list = array('png','jpg', 'pdf', 'docx', 'zip');
		$attachment = $_FILES['attachment']['name'];
		$x = explode('.', $attachment);
		$extension = strtolower(end($x));
		$size = $_FILES['attachment']['size'];
		$file_tmp = $_FILES['attachment']['tmp_name'];
		if(in_array($extension, $extension_list) === true){
			if($size < 10000000){
				if (file_exists($filename)) {
					$path = '../upload/assignments/'."$courseCode/$attachment";
					move_uploaded_file($file_tmp, '../upload/assignments/'."$courseCode/".$attachment);
					$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`,`dateOpen`,`dateClose`, `title`, `id_topic`, `fileDir`, `description`) VALUES ('$acctypes','$idcourse', '$dateOpen','$dateClosed', '$name', '$idtopic', '$path', '$description')";
					$mysqli->query($sqlInputActivity);
				}
				else{
					mkdir('../upload/assignments/'."$courseCode", 0777, true);
					move_uploaded_file($file_tmp, '../upload/assignments/'."$courseCode/".$attachment);
					$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`,`dateOpen`,`dateClose`, `title`, `id_topic`, `fileDir`, `description`) VALUES ('$acctypes','$idcourse', '$dateOpen','$dateClosed', '$name', '$idtopic', '$path', '$description')";
					$mysqli->query($sqlInputActivity);
				}
			}
			else{
				echo "Ukuran file terlalu besar";
			}
		}
		else{
			echo "Ekstensi File tidak diperbolehkan";
		}
	}
	else{
		$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`,`dateOpen`,`dateClose`, `title`, `id_topic`, `description`) VALUES ('$acctypes','$idcourse', '$dateOpen','$dateClosed', '$name', '$idtopic','$description')";
		$mysqli->query($sqlInputActivity);
	}
}
else{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$filename = '../upload/file/'."$courseCode";
	//Setting untuk upload file
	$extension_list = array('png','jpg', 'pdf', 'docx', 'zip');
	$attachment = $_FILES['attachment']['name'];
	$x = explode('.', $attachment);
	$extension = strtolower(end($x));
	$size = $_FILES['attachment']['size'];
	$file_tmp = $_FILES['attachment']['tmp_name'];
	if(in_array($extension, $extension_list) === true){
		if($size < 10000000){
			if (file_exists($filename)) {
				$path = '../upload/file/'."$courseCode/$attachment";
				move_uploaded_file($file_tmp, '../upload/file/'."$courseCode/".$attachment);
				$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`, `title`, `id_topic`, `fileDir`, `description`) VALUES ('$acctypes','$idcourse', '$name', '$idtopic', '$path', '$description')";
				$mysqli->query($sqlInputActivity);
			} else {
				mkdir('../upload/file/'."$courseCode", 0777, true);
				$path = '../upload/file/'."$courseCode/$attachment";
				move_uploaded_file($file_tmp,'../upload/file/'."$courseCode/".$attachment);
				$sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`, `title`, `id_topic`, `fileDir`, `description`) VALUES ('$acctypes','$idcourse', '$name', '$idtopic', '$path', '$description')";
				$mysqli->query($sqlInputActivity);
			}
		}
		else{
			echo "File melebihi Ukuran yang ditentukan";
		}
	}
	else{
		echo "Ekstensi File tidak diperbolehkan";
	}

}

header("Location:../pages/lecturer/lct.php");
exit;

?>