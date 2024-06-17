<?php

include 'db.inc.php';

class Uploads extends Database{

    public function profile_insert(){


        $username = $_SESSION['username'];
        $file = $username . $_FILES['profile']['name'];
        $temp = $_FILES['profile']['tmp_name'];
        $type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $uploads = '../images/' . $file;
        $about = $_POST['about'];
        $id = $_SESSION['ID'];

        $sql = "INSERT INTO profile (id, profile, about, userId) VALUES (null, '$file', '$about', '$id')";

        $query = mysqli_query($this->con, $sql); 

        if(move_uploaded_file($temp, $uploads)){
            header("location: ../profile.php?id=$id status=Succesfull");
            exit();
        }else{
            header('location: ../profile.php?errorr=Failed');
        }

        return $query;
    }

    public function profile(){
        $id = $_SESSION['ID'];
        $upload = "SELECT * from profile WHERE userId = '$id'";
        $file = mysqli_query($this->con, $upload);


        if(mysqli_num_rows($file) > 0){
            $row = mysqli_fetch_assoc($file);

            $_SESSION['profile'] = $row['profile'];
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['imgID'] = $row['id'];
            $_SESSION['about'] = $row['about'];
        }

    }

    public function getUsername(){
        $id = $_SESSION['ID'];
        $sql = "SELECT users.username from users WHERE id = '$id'";
        $query = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($query);

        return $row;
    }

    public function updateProfile($imgId){
        $file = $_FILES['profile']['name'];
        $temp = $_FILES['profile']['tmp_name'];
        $type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        $uploads = '../images/' . $file;
        $about = $_POST['about'];


        if(move_uploaded_file($temp, $uploads)){

            $sql = "UPDATE profile SET profile ='$file' WHERE id ='$imgId'";
            $query = mysqli_query($this->con, $sql);
            
            if($query === TRUE){
                header("location: ../profile.php?id=$imagId");
                exit();
            }
        }
        return $query;
    }

    public function videoUpload(){
        $username = $_SESSION['username'];
        $file = $username . $_FILES['uploadVideo']['name'];
        $temp = $_FILES['uploadVideo']['tmp_name'];
        $uploads = '../videos/' . $file;
        $about = $_POST['description'];
        $title = htmlspecialchars($_POST['title']);
        $id = $_SESSION['ID'];
        $videotype = $_POST['videoType'];


        
        if($videotype == "Tutorial"){

            $sql = "INSERT INTO tutorials (id, video, title, type, description, uploaderId) VALUES (null, '$file', '$title', '$videotype', '$about', '$id')";
            $query = mysqli_query($this->con, $sql); 
    
            if(move_uploaded_file($temp, $uploads)){
                header("location: ../uploads.php?id=$id");
                exit();
            }else{
                header('location: ../uploads.php?errorr=Failed');
            }
        }else{

            $sql = "INSERT INTO gameplay (id, video, title, type, description, uploaderId) VALUES (null, '$file', '$title', '$videotype', '$about', '$id')";
            $query = mysqli_query($this->con, $sql); 

            if(move_uploaded_file($temp, $uploads)){
                header("location: ../uploads.php?id=$id");

                exit();
            }else{
                header('location: ../uploads.php?errorr=Failed');
            }
        }
    }

    public function favorite($title,$video, $vidId, $type, $uploaderId, $userId){
        $sql = "INSERT INTO favorite (id, title,video, videoId, type, uploaderId, userId) VALUEs (null, '$title', '$video', '$vidId', '$type', '$uploaderId', '$userId')";
        $query = mysqli_query($this->con, $sql);

        if($query == TRUE){
            header("location: ../play.video.php?id=$vidId&type=$type");

        }else{
            header('location: ../play.video.php?errorr=Failed');
        }
    }

    public function getVideo($type, $id){

        if($type == "Tutorial"){
            $sql = "SELECT * from tutorials WHERE id='$id'";
            $query = mysqli_query($this->con, $sql); 
        }elseif($type == "Entertainment"){
            $sql = "SELECT * from gameplay WHERE id='$id'";
            $query = mysqli_query($this->con, $sql); 
        }else{
            $sql = "SELECT * from esport WHERE id='$id'";
            $query = mysqli_query($this->con, $sql); 
        }

        return $query;
    }

    public function getUploader($id){

        $sql = "SELECT users.id, users.username, profile.profile FROM users LEFT JOIN profile ON users.id = profile.userId WHERE users.id='$id'";
        $query = mysqli_query($this->con, $sql); 
        
        return $query;
    }

    public function Addfavorite($videoId, $userId){

        $sql = "SELECT * from favorite WHERE videoId='$videoId' AND userId='$userId'";
        $query = mysqli_query($this->con, $sql); 

        return $query;
    }

    public function getFav($userId){
        $sql = "SELECT * FROM favorite WHERE userId='$userId'";
        $query = mysqli_query($this->con, $sql); 

        return $query;
    }

    public function esportVid(){
        $sql = "SELECT * FROM esport";
        $query = mysqli_query($this->con, $sql);

        return $query;
    }
    
    public function gameplayVid(){
        $sql = "SELECT * FROM gameplay";
        $query = mysqli_query($this->con, $sql);

        return $query;
    }

    public function tutorialVid(){
        $sql = "SELECT * FROM tutorials";
        $query = mysqli_query($this->con, $sql);

        return $query;
    }

    public function FetchUploader($id){
        $sql = "SELECT * FROM gameplay JOIN users ON gameplay.uploaderId=users.id JOIN profile ON users.id=profile.userId WHERE users.id='$id'";

        $query = mysqli_query($this->con, $sql);

        return $query;
    }

    public function uploadEsport(){
        $file = $_FILES['uploadVideo']['name'];
        $temp = $_FILES['uploadVideo']['tmp_name'];
        $uploads = '../videos/' . $file;
        $about = htmlspecialchars($_POST['description']);
        $title = htmlspecialchars($_POST['title']);
        $type = "eSPORT";

        $sql = "INSERT INTO esport (id, video, title, type, description) VALUES (null, '$file', '$title', '$type', '$about')";
        $query = mysqli_query($this->con, $sql); 

        if(move_uploaded_file($temp, $uploads)){
            header("location: ../esport.upload.php");
            exit();
        }else{
            header('location: ../esport.upload.php?errorr=Failed');
        }
    }

    public function editProfile($id){
        if($id == 'image'){
            $sql = "UPDATE * FROM profile WHERE id=$id";
            $query = mysqli_query($sql);
        }elseif($id == 'uname'){
            $sql = "SELECT * FROM users WHERE id=$id";
            $query = mysqli_query($sql);
        }
    }

    public function esport_update(){
        $file = $_FILES['profile']['name'];
        $temp = $_FILES['profile']['tmp_name'];
        $uploads = '../images/' . $file;
        $about = htmlspecialchars($_POST['description']);
        $title = htmlspecialchars($_POST['title']);

        $sql = "INSERT INTO eUpdate (id, picture, title, description) VALUES (null, '$file', '$title', '$about')";
        $query = mysqli_query($this->con, $sql); 

        if(move_uploaded_file($temp, $uploads)){
            header("location: ../esport.updates.php");
            exit();
        }else{
            header('location: ../esport.updates.php?errorr=Failed');
        }
    }

    public function get_Update($type){

        if($type == "esport"){
            $sql = "SELECT * FROM eupdate ORDER BY id DESC";
            $query = mysqli_query($this->con, $sql);
        }elseif($type == "patches"){
            $sql = "SELECT * FROM patches ORDER BY id DESC";
            $query = mysqli_query($this->con, $sql);
        }

        return $query;
    }

    public function insert_patch(){
        $file = $_FILES['profile']['name'];
        $temp = $_FILES['profile']['tmp_name'];
        $uploads = '../images/' . $file;
        $about = htmlspecialchars($_POST['description']);
        $title = htmlspecialchars($_POST['title']);
        $type = $_POST['Type'];

        $sql = "INSERT INTO patches (id, picture, type, title, description) VALUES (null, '$file', '$type','$title', '$about')";
        $query = mysqli_query($this->con, $sql); 

        if(move_uploaded_file($temp, $uploads)){
            header("location: ../game.update.php");
            exit();
        }else{
            header('location: ../game.update.php?errorr=Failed');
        }
    }

    public function patches(){
        $sql = "SELECT * FROM patches ORDER BY id DESC LIMIT 3";
        $query = mysqli_query($this->con, $sql);

        return $query;
    }

}


$host = 'localhost';
$uname = 'root';
$pass = "";
$dbname = "ml";

$insertPic = new Uploads($host, $uname, $pass, $dbname);

