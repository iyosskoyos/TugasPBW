<?php 
include 'phpScript/connection.php';
include 'layout/style.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>IDE</title>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body background="img/bgImg.jpg">
	<div class="contact">	<button class="buttonTop">Help</button>		
		<button class="buttonTop">Contact us</button>
		<button class="buttonTop">About us</button>
	</div>

	<div class="home">
		<h1>IDE</h1>
		<h2>Interactive Digital Learning Environment</h2>
		<h3>-Faculty of Information Technology and Science-</h3>
		<button id ="btn_login" class="button" onclick="document.getElementById('id01').style.display='block'">Login</button>
	</div>

	<div class="copyright">
		&copy; 2017 Tugas PBW. All righs reserved.	
	</div>

	<!-- Modal -->
	<div id="id01" class="modal">
		<br> <br>
		<form class="modal-content animate" action="phpScript/login.php" method= "post" style="width: 50%">

			<div class="imgcontainer" style="width: 99%;display: inline-block;">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h3 style="color: black;text-align: center;">Login</h3>
			</div>

			<div class="container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a> or <a href="#">username?</a></span>
			</div>
		</form>
	</div>
	<script>	
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		// $('body').on('click','#btn_login',function(){
		// 	$('#add-modal-body').load('add_dialog.html');
		// 	$('#login_modal').modal('show');		
		// 	//console.log("asd");
		// });

	</script>
</body>
</html>
