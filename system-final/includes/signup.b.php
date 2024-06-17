<?php

include "db.inc.php";

$uname = $_POST['uname'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = "1";

$emailChecker = "SELECT * FROM users WHERE email = '$email'";
$unameChecker = "SELECT * FROM users WHERE username = '$uname'";
$username = $conn->unameChecker($unameChecker);
$account = $conn->emailChecker($emailChecker);


if(empty($uname) || empty($address) || empty($email) || empty($password)){
    header('location: ../signup.php?error=please fill');
}
elseif($account == TRUE){
    $account;
}elseif($username == TRUE){
    $username;
}else{
    $insert = $conn->insert();
}

