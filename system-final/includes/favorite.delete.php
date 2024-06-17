<?php

include 'class.extnd.php';
$vidId = $_POST['id'];



$sql = "DELETE FROM favorite WHERE id='$vidId'";
$query = $insertPic->query($sql);
header('location: ../favorite.php');

