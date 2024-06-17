<?php

include 'class.extnd.php';

$userdId = $_POST['id'];


$sql = "DELETE FROM users WHERE id='$userdId'";
$query = $insertPic->query($sql);

if($query == TRUE){
    header('location: ../users.php');
}

?>