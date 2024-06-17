<?php

include 'class.extnd.php';

if (isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];
}
if (isset($_SESSION['username'])){
   $username = $_SESSION['username'];
}

$username = $username;
$file = $username . $_FILES['uploadVideo']['name'];
$temp = $_FILES['uploadVideo']['tmp_name'];
$type = strtolower(pathinfo($file, PATHINFO_EXTENSION));



if($type != "mp4"){
    header('location: ../uploads.php?error=Invalid file type');
}else{
    $insert = $insertPic->videoUpload();
}





