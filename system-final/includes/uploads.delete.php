<?php

include 'class.extnd.php';
$vidId = $_POST['id'];
$type = $_POST['type'];


if($type == "Entertainment"){
    $sql = "DELETE FROM gameplay WHERE id='$vidId'";
    $query = $insertPic->query($sql);
    header('location: ../uploads.php');
}else{
    $sql = "DELETE FROM tutorials WHERE id='$vidId'";
    $query = $insertPic->query($sql);
    header('location: ../uploads.php');
}

?>