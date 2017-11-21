<?php
include('../../phpScript/connection.php'); 
include('../../phpScript/startSession.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>IDE</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../lib/w3.css">
	<link rel="stylesheet" href="../../lib/font-awesome.css">
	<link rel="stylesheet" href="../../style/style.css">
	<link rel="stylesheet" href="../../lib/w3-theme-dark-grey.css">
</head>

<body>
	<?php $myCourses = false ?>

	<?php include ('../../layout/header.php');?>
	<div class="w3-main">

		<?php include ('../../layout/sidebar.php');?>
		<div class="w3-container" style="width: 75%; float: right;">
			<div class="w3-panel w3-card-2 w3-grey"><p><?php
			echo $_GET["courseTitle"];
			?></p></div>
			<?php include("../../phpScript/topics.php");?>
		</div>
	</div>

	<div id="id01" class="w3-modal">
					<div class="w3-modal-content" style="width:550px;height:200px;"> 
						<header class="w3-container">
							<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>

							<H3>SELECT ACTIVITY</H3><BR>
						</header>
						<div class="w3-container">
							<input type="radio" name="activity" value="Assignment" > <a class = "fa fa-file-text-o "> Assignment</a>
							<br>
							<input type="radio" name="activity" value="File" > <a class = "fa fa-file-o "> File </a>
						</div>
						<footer class="w3-container">
							<br>
							<button onclick="window.location.href='addingActivity.php'" type="submit" class="w3-large w3-black w3-btn">ADD</button>
						</footer>
					</div>

	</div>
</body>
</html>
<script type="text/javascript">
	var button = document.getElementById("button-modal");
	button.onclick = function(){
		document.getElementById('id01').style.display='block';
	}
</script>