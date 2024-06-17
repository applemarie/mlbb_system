<?php
include 'class.extnd.php';

$vidId = $_GET['id'];
$vidType = $_GET['type'];


$sql = "DELETE from favorite WHERE videoId='$vidId'";
$query = $insertPic->query($sql);

if($query == TRUE){
    header("location: ../play.video.php?id=$vidId&type=$vidType");
}
