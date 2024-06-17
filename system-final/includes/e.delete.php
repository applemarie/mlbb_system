<?php

include 'class.extnd.php';

$vidId = $_POST['id'];

$sql = "DELETE FROM esport WHERE id='$vidId'";
$query = $insertPic->query($sql);
header('location: ../esport.upload.php');

?>