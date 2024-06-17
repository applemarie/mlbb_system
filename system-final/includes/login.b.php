<?php
include 'db.inc.php';


if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) && empty($password)){
        header('location: ../index.php?error=Email and Password Required');
    }elseif(empty($email)){
        header('location: ../index.php?error=Email required');
    }elseif(empty($password)){
        header('location: ../index.php?error=Password required');
    }else{
        $query = $conn->login();
    }
}


