<?php 
include 'connection.php';
include 'startSession.php'
?>

<?php
if (empty($_POST['username']) || empty($_POST['psw'])) {
	header("Location: ../index.php");
}
else{
	$username = test_input($_POST['username']);
	$password = test_input($_POST['psw']);
	$sql = "SELECT username FROM users WHERE username = '$username'";
	

	$result = $mysqli->query($sql);

	if($result && $result->num_rows > 0){
		$sql = "SELECT username, pass FROM users WHERE username = '$username' AND pass= '$password'";
		$result = $mysqli->query($sql);

		if($result && $result->num_rows > 0){
			$stmt = "SELECT Users.ID_U as id, Users.username as username,
			Users.pass as pass, Users.userID as userid, Users.name as name,
			UserGroups.name as position FROM Users JOIN UserGroups ON Users.ID_UG = UserGroups.ID_UG 
			WHERE Users.username = '$username'";
			$result = $mysqli->query($stmt);

			if($result && $result->num_rows > 0){
				$row = $result->fetch_array();

				$_SESSION['position'] = $row['position'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['pass'] = $row['pass'];
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['name'] = $row['name'];

				if($_SESSION['position'] == 'student'){
					header("Location: ../pages/student/std.php");
				}
				else{
					header("Location: ../pages/lecturer/lct.php");
				}
			}
		}
		else{
			echo "WRONG PASSWORD";
		}
	}
	else{
		echo "WRONG USERNAME";
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>