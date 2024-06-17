<?php

include 'class.extnd.php';

 if (isset($_SESSION['ID'])){
     $id = $_SESSION['ID'];
 }
 if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
$username = $username;
$file = $username . $_FILES['profile']['name'];
$type = strtolower(pathinfo($file, PATHINFO_EXTENSION));





if($_FILES['profile']['size'] > 500000){
    header('location: ../profile.php?error=File too large');
}
elseif($type != "jpg" && $type != "png" && $type != "jpeg"){
    header('location: ../profile.php?error=Invalid file type');
}else{
    $insert = $insertPic->profile_insert();
}


