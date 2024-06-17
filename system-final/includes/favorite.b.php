<?php

include 'class.extnd.php';

$vidId = $_POST['videoId'];
$type = $_POST['type'];
$uploaderId = $_POST['uploaderId'];
$title = $_POST['title'];
$userId = $_GET['id'];
$video = $_POST['video'];

$insertPic->favorite($title, $video, $vidId, $type, $uploaderId, $userId);

