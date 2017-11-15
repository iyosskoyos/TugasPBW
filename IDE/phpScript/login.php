<?php 
include 'connection.php';
?>

<?php
if (empty($_POST['username']) || empty($_POST['psw'])) {
	header("Location: ../index.php");
}
else{
	$username = $_POST['username'];
	$password = $_POST['psw'];
	$sql = "SELECT username FROM users WHERE username = '$username'";
	$result = $mysqli->query($sql);
	if($result && $result->num_rows > 0){
		$sql = "SELECT username, pass FROM users WHERE username = '$username' AND pass= '$password'";
		$result = $mysqli->query($sql);
		if($result && $result->num_rows > 0){
			$sql = "SELECT usergroups.name FROM users JOIN usergroups WHERE username = '$username' AND pass= '$password' ON users.ID_UG = usergroups.ID_UG";
			$result = $mysqli->query($sql);
			if($result && $result->num_rows > 0){
				$row = $result->fetch_array();
				$role = $row['name'];
				if($role == 'student'){
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

?>