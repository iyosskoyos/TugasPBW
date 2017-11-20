<?php 
$id = $_SESSION['id'];
$sql = "SELECT Courses.code as courseCode , Courses.course as course, Course.ID_C as id 
		FROM Courses JOIN Enrollments ON Courses.ID_C = Enrollments.ID_C 
		WHERE '$id' = Enrollments.ID_U";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$courseID = $row["id"];
		$course = $row["course"];
		$courseCode =  $row["courseCode"];
?>
		<div class="w3-panel w3-card-2"><a href="<?php echo "course.php?id=".$courseID."&courseTitle=".$course ?>" style = "text-decoration: none;"><p><?php echo "$courseCode"." / "."$course"?></p></a></div><?php
	
	}
}
 ?>