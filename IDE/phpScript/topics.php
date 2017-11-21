<?php 
$id = $_GET['id'];
$sql = "SELECT DISTINCT activities.topic as namaTopik FROM activities JOIN courses ON activities.ID_C = courses.ID_C WHERE $id = courses.ID_C";
$result = $mysqli->query($sql);
 
if($result && $result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {
		$namaTopik = $row["namaTopik"];
		?>
		<div class="w3-panel w3-card-2"><p><i class="fa fa-newspaper-o"></i> Topic <?php echo "$namaTopik";?></p>
		<?php
			$sqlGetKontenTopik = "SELECT activities.title as title FROM activities JOIN courses ON activities.ID_C = courses.ID_C WHERE $id = courses.ID_C AND $namaTopik = activities.topic";
			$resultKontenTopik = $mysqli->query($sqlGetKontenTopik);
			if($resultKontenTopik && $resultKontenTopik->num_rows > 0){
				while ($rowKontenTopik = $resultKontenTopik->fetch_assoc()) {
					$namaKonten = $rowKontenTopik["title"];
					?>
					<p><?php echo "$namaKonten";?></p>
					<?php
				}
			}
		if($_SESSION['position'] == 'lecturer'){
		echo "<p><button id=button-modal class="."'w3-button w3-grey w3-large'>Add Activity</button></p>";
		}
		echo "</div>";
	}
}
?>