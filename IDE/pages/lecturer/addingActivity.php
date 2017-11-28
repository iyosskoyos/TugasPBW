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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<?php $myCourses = false ?>
	<!-- include header -->
	<?php include ('../../layout/header.php');?>
	<div class="w3-main">
		<!-- include sidebar -->
		<?php include ('../../layout/sidebar.php');
		$acctypes = $_GET['activity'];
		$idtopic = $_GET['id_topik'];
		$idcourse = $_GET['id_course'];

		$_SESSION['id_acctypes'] = $acctypes;
		$_SESSION['id_topic'] = $idtopic;
		$_SESSION['id_course'] = $idcourse;
		?>
		<div class="w3-container w3-padding-left w3-padding-right" style="width: 75%; float:right; padding:0px; height:630px;">
			<div class="w3-theme-l2 " style="margin:0px;padding:0px;">
				<?php
				if($acctypes==1){
					echo "<h1 class="."'w3-margin-left w3-text-black w3-xlarge'"." >Adding a new Assignments</h1>";
				}
				else{
					echo "<h1 class="."'w3-margin-left w3-text-black w3-xlarge'"." >Adding a new File</h1>";
				}
				?>
			</div>
			<button type="submit" class="w3-large w3-black w3-btn w3-right" onclick="CollapseAll()">Collapse All</button><br><br>
			
			<div id="accordions">
				<form method="post" enctype="multipart/form-data" action="../../phpScript/inputActivity.php">
					<fieldset>
						<legend>
							<button id="general" class="w3-button w3-black  w3-border-black toggler" onclick="return GeneralClicked()">
								General <i id="arrowL" class="fa fa-sort-down"></i>
							</button>
						</legend>
						<div class="w3-hide w3-container w3-margin-top" id="gen">
							<div style="width:100%;height:60px">
								<text class="w3-text-red w3-left " style="margin-left:60px;">Name *</text>
								<input id="name-box" name="name" class="w3-input w3-border w3-border-theme value w3-left" type="text" style="width:800px;margin-left:100px;height:30px;" >
							</div>
							<div style="margin-top:10px;padding:0px;height:100px;">
								<text class="w3-left " style="margin-left:60px;">Description</text>
								<textarea name="description" class="w3-input w3-border w3-border-theme value w3-left" type="text" style="width:800px;margin-left:70px;height:70px;" ></textarea>	
							</div>
						</div>
					</fieldset>
					<br>
					<?php
					if($acctypes==1){
						?>
						<fieldset>
							<legend>
								<button id="content" class="w3-button w3-black  w3-border-black toggler" onclick="return availabilityClicked()">
									Availability <i id="arrowL" class="fa fa-sort-down"></i>
								</button>
							</legend>
							<div class="w3-hide w3-container w3-margin-top" id="avail">
								Allow submissions from <i class="fa fa fa-question-circle"></i> <input id="startDateHTML" type="date" name="startDate" disabled> <input type="checkbox" onchange="document.getElementById('startDateHTML').disabled = !this.checked;">Enable
								<br>
								<br>
								Due Date <i class="fa fa fa-question-circle"></i> <input type="date" name="endDate" id="endDateHTML" disabled=""> <input type="checkbox" onchange="document.getElementById('endDateHTML').disabled = !this.checked;"> Enable
								<br>
							</div>
						</fieldset>
						<br>
						<?php
					}
					?>
					<fieldset>
						<legend>
							<button id="content" class="w3-button w3-black  w3-border-black toggler" onclick="return ContentClicked()">
								Content <i id="arrowL" class="fa fa-sort-down"></i>
							</button>
						</legend>
						<div class="w3-hide w3-container w3-margin-top" id="con">
							<text>Select File <i class="fa fa fa-question-circle"></i></text>
							<input type="file" name="attachment">
						</div>
					</fieldset>
				</div>
				<div style="margin-top: 35px; margin-left: 30%;">
					<button type="submit" class="w3-button w3-black  w3-border-black toggler" onclick="return checkInput();">SAVE AND RETURN TO COURSE</button>
					<button class="w3-button w3-black  w3-border-black toggler">CANCEL</button>
					<p style="color: red;" id="keterangan"></p>
				</div>
			</form>
		</div>
		<script>
			function checkInput(){
				var val = document.getElementById('name-box').value;
				alert(val);
				if(val == ""){
					document.getElementById('keterangan').innerHTML = "Ada Input yang belum diisi";
					return false;
				}
				else{
					return true;
				}
			}
			function GeneralClicked() {

				var x = document.getElementById('gen');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				return false;
				
			}
			function availabilityClicked() {

				var x = document.getElementById('avail');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				return false;
			}
			function ContentClicked() {

				var x = document.getElementById('con');
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				return false;
			}
			function CollapseAll(){
				var x = document.getElementById('con');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				var x = document.getElementById('gen');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				var x = document.getElementById('avail');
				if (x.className.indexOf("w3-hide") == -1) {
					x.className += " w3-hide";
				} else { 
					x.className = x.className.replace(" w3-show", "");
				}
				return false;
			}
		</script>
	</body>
	</html>
	<?php
}
else{
	header("location:../../index.php");
}
?>
