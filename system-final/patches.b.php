<?php

include 'class.extnd.php';

$type = $_GET['type'];



    $file = $_FILES['profile']['name'];
    $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if($_FILES['profile']['size'] > 500000){
        header('location: ../game.update.php?error=File too large');
    }
    elseif($type != "jpg" && $type != "png" && $type != "jpeg"){
        header('location: ../game.update.php?error=Invalid file type');
    }else{
        $insertPic->insert_patch();
    }
    






