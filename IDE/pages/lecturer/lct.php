<!-- include connection -->
<?php include('../../phpScript/connection.php'); 
include('../../phpScript/startSession.php');
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>IDE</title>
	<!-- include style -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../lib/w3.css">
	<link rel="stylesheet" href="../../lib/font-awesome.css">
	<link rel="stylesheet" href="../../style/style.css">
	<link rel="stylesheet" href="../../lib/w3-theme-dark-grey.css">
</head>

<body>
	<?php $myCourses = false ?>
	<!-- include header -->
	<?php include ('../../layout/header.php');?>
	<div class="w3-main">
		<!-- include sidebar -->
		<?php include ('../../layout/sidebar.php');?>
		<div class="w3-container" style="width: 75%; float: right;">
			<?php include ('../../phpScript/courses.php'); ?>
		</div>
	</div>
	
</body>
</html>
<?php
}
else{
	header("Location:../../index.php");
}
?>