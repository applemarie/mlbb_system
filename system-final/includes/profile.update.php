<?php

include 'class.extnd.php';


$type = $_GET['type'];
$id = $_GET['id'];


if($type == "image"){
    $file = $_FILES['profile']['name'];
    $temp = $_FILES['profile']['tmp_name'];
    $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    $uploads = '../images/' . $file;

    if($_FILES['profile']['size'] > 500000){
        header('location: ../profile.php#?error2=File too large');
    }
    elseif($type != "jpg" && $type != "png" && $type != "jpeg"){
        header('location: ../profile.php?error2=Invalid file type');
    }else{
        $insert = $insertPic->updateProfile($id);
    }
}elseif($type == "About"){
    $about = htmlspecialchars($_POST['about']);

    $sql = "UPDATE profile SET about ='$about' WHERE id ='$id'";
    $query = $insertPic->query($sql);
    
    if($query === TRUE){
        header("location: ../profile.php?id=$id");
        exit();
    }
}elseif($type == "uname"){
    $uname = htmlspecialchars($_POST['username  ']);

    $sql = "UPDATE users SET username ='$uname' WHERE id ='$id'";
    $query = $insertPic->query($sql);
    
    if($query === TRUE){
        header("location: ../profile.php?id=$id");
        exit();
    }
}
