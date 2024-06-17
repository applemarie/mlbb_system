<?php
session_start();

class Database{
    public $host;
    public $uname;
    public $pass;
    public $dbname;
    public $con;

    public function __construct($host, $uname, $pass, $dbname){
        $this->host = $host;
        $this->uname = $uname;
        $this->pass = $pass;
        $this->dbname = $dbname;

        $this->con = new mysqli($this->host, $this->uname, $this->pass, $this->dbname);
    }

    public function query($sql){
        $query = $this->con->query($sql);
        return $query;
    }

    public function insert(){
        $uname = $_POST['uname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = "1";

        $sql = "INSERT INTO users (id, role, username, address, email, password) VALUES(NULL, '$role', '$uname', '$address', '$email', '$password')";
        $this->query = mysqli_query($this->con, $sql);

        if($this->query == TRUE){
            $user = "SELECT * FROM users WHERE email='$email' && password='$password'";
            $login = mysqli_query($this->con, $user);
            
            if(mysqli_num_rows($login) === 1){
                $row = mysqli_fetch_assoc($login);
    
                if($row['email'] == $email && $row['password'] == $password){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['ID'] = $row['id'];
                }
            }
            header('location: ../home.php');
            exit();
        }else{
            header("Location: ../signup.php?error=sign-up failed");
        }
    }



    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
        $query = mysqli_query($this->con, $sql);
        
        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_assoc($query);

                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['ID'] = $row['id'];
                header("location: ../home.php");
        }else{
            header('location: ../index.php#myModal?error=Incorrect Email or Password');
        }
    }


    public function emailChecker($query){
        $this->email = $this->con->query($query);

        if(mysqli_num_rows($this->email) > 0){
            header('location: ../signup.php?error=email is already in used.');
            exit();
        }
    }

    public function unameChecker($query){
        $this->uname = $this->con->query($query);

        if(mysqli_num_rows($this->uname) > 0){
            header('location: ../signup.php?error=username is already in used.');
            exit();
        }
    }
}

$host = 'localhost';
$uname = 'root';
$pass = "";
$dbname = "ml";

$conn = new Database($host, $uname, $pass, $dbname);

