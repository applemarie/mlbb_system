<?php

include 'class.extnd.php';

$type = $_GET['type'];

if($type == "video"){
    if (isset($_SESSION['ID'])){
        $id = $_SESSION['ID'];
    }

    $file = $_FILES['uploadVideo']['name'];
    $temp = $_FILES['uploadVideo']['tmp_name'];
    $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));


    if($type != "mp4"){
        header('location: ../esport.upload.php?error=Invalid file type');
    }else{
        $insert = $insertPic->uploadEsport();
    }
}elseif($type == "updates"){


    $file = $_FILES['profile']['name'];
    $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if($_FILES['profile']['size'] > 500000){
        header('location: ../esport.updates.php?error=File too large');
    }
    elseif($type != "jpg" && $type != "png" && $type != "jpeg"){
        header('location: ../esport.updates.php?error=Invalid file type');
    }else{
        $insertPic->esport_update();
    }
    
}





