<?php
    $mysqli = new mysqli("localhost", "root", "", "ide");

    if($mysqli->connect_errno){
        echo "Failed to connect.";
    }
?>

