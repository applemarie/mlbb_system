<?php

include 'includes/class.extnd.php';

if(isset($_SESSION['password']) && isset($_SESSION['email'])){

    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
    }
    if(isset($_SESSION['ID'])){
        $id = $_SESSION['ID'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Esport.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <div class="navbar">
            <a href="home.php">Home</a>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Videos
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="all.video.php">All</a></li>
                    <li><a class="item" href="tutorial.video.php">Tutorial</a></li>
                    <li><a class="item" href="gameplay.video.php">Entertainment</a></li>
                    <li><a class="item" href="esport.video.php">eSPORT</a></li>
                </ul>
            </div>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Updates
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="updates.php">New Patches</a></li>
                    <li><a class="item active" href="esport.php">eSPORT</a></li>
                </ul>
            </div>
            <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>           <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="profile.php">Profile</a>
            <div class="login">
                <a id="logoutBtn" href="#logoutModal">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg>
                    Logout
                </a>
            </div>
        </div>    
    </header>

    <section>
        <div class="contents">

            <div class="nav">
                <a class="list-group-item-action" href="updates.php">New Patches</a>
                <a class="list-group-item-action active" href="esport.php">eSPORT</a>
            </div>

            <div class="content2">
                <h5 class="page_title">Updates</h5>
                <div class="updateCon">
                    <?php
                    $type = "esport";
                        $query = $insertPic->get_Update($type);
                        while($row = mysqli_fetch_assoc($query)){
                            $picture = $row['picture'];
                    ?>
                    <div class="updates">
                        <img src="<?php echo("images/$picture"); ?>" width="auto" height="200px">
                        <div class="content3">
                            <h5><?php echo $row['title'] ?></h5>
                            <p><?php echo $row['description'] ?></p>
                        </div>
                    </div>    
                <?php
                        }
                ?>
                </div>
            </div>      

        </div>

    </section>

    <div id="logoutModal" class="modal2">
        <div class="modal2-content">
            <span class="close2">&times;</span>
            <h2>Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="btns">
                <button class="cancel">Cancel</button>
                <a class="logout" href="includes/logout.php">Logout</a>
            </div>    
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var logoutBtn = document.getElementById('logoutBtn');
            var modal = document.getElementById('logoutModal');
            var closeModalBtn = modal.querySelector('.close2');
            var cancelModalBtn = modal.querySelector('.cancel');
            var logoutModalBtn = modal.querySelector('.logout');

            logoutBtn.addEventListener('click', function() {
                modal.style.display = 'block';
            });
            
            function close() {
                modal.style.display = 'none';
            }

            closeModalBtn.addEventListener('click', close);
            cancelModalBtn.addEventListener('click', close);

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    close();
                }
            });
            
        });
    </script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
}else{

?>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Esport.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <div class="navbar">
            <a href="index.php">Home</a>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Videos
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="#">Tutorial</a></li>
                    <li><a class="item" href="#">Entertainment</a></li>
                    <li><a class="item" href="#">eSPORT</a></li>
                </ul>
            </div>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Updates
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="updates.php">New Patches</a></li>
                    <li><a class="item active" href="esport.php">eSPORT</a></li>
                </ul>
            </div>
            <div class="login">
                <a id="profileCon" href="#myModal">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg>
                    Login
                </a>
            </div>
        </div>    
    </header>

    <section>
    <div class="contents">

        <div class="nav">
            <a class="list-group-item-action" href="updates.php">New Patches</a>
            <a class="list-group-item-action active" href="esport.php">eSPORT</a>
        </div>

        <div class="content2">
            <h5 class="page_title">Updates</h5>
            <div class="updateCon">
                <?php
                $type = "esport";
                    $query = $insertPic->get_Update($type);
                    while($row = mysqli_fetch_assoc($query)){
                        $picture = $row['picture'];
                ?>
                <div class="updates">
                    <img src="<?php echo("images/$picture"); ?>" width="auto" height="200px">
                    <div class="content3">
                        <h5><?php echo $row['title'] ?></h5>
                        <p><?php echo $row['description'] ?></p>
                    </div>
                </div>    
            <?php
                    }
            ?>
            </div>
        </div>     

</div>

    </section>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="image">
                    <img src="images/lylia.png">
                </div>
                <span class="close" onclick="closeModal()">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                </span>
                <h3>Login</h3>
                <p class="Error" id="error-message"></p>
                <form action="includes/login.b.php" method="post">
                    <div>
                        <input type="email" class="control" name="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" class="control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="loginBtn">Login</button>
                </form>
                <p>
                    Don't have an account? <a id="profileCon2" href="#myModal2">Sign Up</a>
                </p>
            </div>
        </div>


        <div id="myModal2" class="modal">
            <div class="modal-content2">
                <div class="image">
                    <img src="images/lylia.png">
                </div>
                <span class="close" onclick="closeModal2()">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                </span>
                <h3>Sign Up</h3>
                <p class="Error2" id="error-message"></p>
                <form action="includes/signup.b.php" method="post">
                        <div>
                            <input type="text" class="control2" name="uname" placeholder="Username">
                        </div>
                        <div>
                            <input type="text" class="control2" name="address" placeholder="address">
                        </div>
                        <div>
                            <input type="email" class="control2" name="email" placeholder="Email">
                        </div>
                        <div>
                            <input type="password" class="control2" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="loginBtn">Sign Up</button>
                    </form>
                <p>
                    Already have an account? <a id="profileCon3" href="#myModal">Login</a>
                </p>
            </div>
        </div>




    <script>

        document.getElementById('profileCon').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'block';
        });
        function closeModal(){
            document.getElementById('myModal').style.display = 'none';
        };

        document.getElementById('profileCon2').addEventListener('click', function(){
            document.getElementById('myModal').style.display = 'none';
        });

        document.getElementById('profileCon2').addEventListener('click', function() {
            document.getElementById('myModal2').style.display = 'block';
        });
        function closeModal2(){
            document.getElementById('myModal2').style.display = 'none';
        };
        document.getElementById('profileCon3').addEventListener('click', function(){
            document.getElementById('myModal2').style.display = 'none';
            document.getElementById('myModal').style.display = 'block';
        });


        window.onload = function() {
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }

            var Message = getParameterByName('status');
            if (Message) {
                document.getElementById('error-message').innerText = Message;
                document.getElementById('myModal').style.display = 'block';
            }
            var errorMessage = getParameterByName('error');
            if (errorMessage) {
                document.getElementById('error-message').innerText = errorMessage;
                document.getElementById('myModal').style.display = 'block';
            }
        };

    </script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>