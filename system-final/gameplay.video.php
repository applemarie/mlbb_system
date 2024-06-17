<?php

include 'includes/class.extnd.php';

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="videos.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <div class="navbar">
            <?php
                if(isset($_SESSION['email'])){
            ?>
                <a href="home.php">Home</a>
            <?php
                }else{
            ?>
                    <a href="index.php">Home</a>
            <?php
                }
            
            ?>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Videos
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="all.video.php">All</a></li>
                    <li><a class="item" href="tutorial.video.php">Tutorial</a></li>
                    <li><a class="item active" href="gameplay.video.php">Entertainment</a></li>
                    <li><a class="item" href="esport.video.php">eSPORT</a></li>
                </ul>
            </div>
            <div class="dropCon">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Updates
                </div>
                <ul class="menuCon dropdown-menu">
                    <li><a class="item" href="updates.php">New Patches</a></li>
                    <li><a class="item" href="esport.php">eSPORT</a></li>
                </ul>
            </div> 
            <?php
                    if(isset($role)){
                        if($role == 1){
            ?>          
                        <a href="profile.php">Profile</a> 
                <?php
                        
                    }elseif($role == 0){
                ?>
                        <a href="dashboard.php">Dashboard</a> 
            <?php
                    }
                }
            ?>
            <?php
                if(isset($_SESSION['email'])){
            ?>
                    <div class="login">
                        <a id="logoutBtn" href="#logoutModal">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg>
                            Logout
                        </a>
                    </div>
            <?php
                }else{
            ?>
                    <div class="login">
                        <a id="profileCon" href="#login">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 6a7.75 7.75 0 1 0 10 0" /><path d="M12 4l0 8" /></svg>
                            Login
                        </a>
                    </div>
            <?php
                }
            ?>
        </div>       
    </header>

    <section>
        <div class="contents">
            
            <div class="nav">
                <a class= "" href="all.video.php">All</a>
                <a class= "" href="tutorial.video.php">Tutorials</a>
                <a class= "active" href="gameplay.video.php">Entertainment</a>
                <a class= "" href="esport.video.php">eSport</a>
            </div>

            <div class="content2">
                <?php
                    $query = $insertPic->gameplayVid();
                    while($row = mysqli_fetch_assoc($query)){
                        $txtLimit = 50;
                ?>
                        <div class="videoCon">
                                <a class="passBtn" href="play.video.php" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['type'] ?>">
                                    <video src="videos/<?php echo $row['video'] ?>" type="video/mp4" width="280px" height="auto" muted></video>

                                    <div class="uploaderCon">
                                        <?php
                                            $userQuery = $insertPic->FetchUploader($row['uploaderId']);
                                            $userRow = mysqli_fetch_assoc($userQuery);
                                        ?>
                                        <img class="<?php echo $userRow['profile'] != null ? 'd-block' : 'd-none' ?>" src="images/<?php echo $userRow['profile'] ?>">
                                        <div class="uploader">
                                            <h6 class="title">
                                                <?php
                                                    if(strlen($row['title']) > $txtLimit){
                                                        echo substr($row['title'], 0, $txtLimit) . ". . . . "; 
                                                    }else{
                                                        echo $row['title']; 
                                                    }
                                                ?>
                                            </h6>
                                            <p class="<?php echo $userRow['username'] != null ? 'd-block' : 'd-none' ?>"><?php echo $userRow['username'] ?> <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg></p>
                                        </div>
                                    </div>    
                                </a>
                        </div>
                <?php
                    }
                ?>
            </div>    

        </div>

    </section>



    <!-- login modal -->
    <div id="login" class="modal">
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
                Don't have an account? <a id="profileCon2" href="#signup">Sign Up</a>
            </p>
        </div>
    </div>



    <!-- signp modal -->
    <div id="signup" class="modal">
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
                Already have an account? <a id="profileCon3" href="#login">Login</a>
            </p>
        </div>
    </div>





    <!-- logout modal -->
    <div id="logoutModal" class="modal3">
        <div class="modal3-content">
            <span class="close3">&times;</span>
            <h2>Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="btns">
                <button class="cancel">Cancel</button>
                <a class="logout" href="includes/logout.php">Logout</a>
            </div>    
        </div>
    </div>



     <script>

                // play video on other page
        document.querySelectorAll('.passBtn').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const videoId = item.getAttribute('data-id');
                const videoType = item.getAttribute('data-type');
                window.location.href = 'play.video.php?id=' + encodeURIComponent(videoId) + '&type=' + encodeURIComponent(videoType);
            });
        });
            



        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('login');
            var modal2 = document.getElementById('signup');
            var closeModalBtn = modal.querySelector('.close');

            function close() {
                modal.style.display = 'none';
            }

            closeModalBtn.addEventListener('click', close);

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    close();
                }
            });

            function closeModal(){
                document.getElementById('logon').style.display = 'none';
            };

            document.getElementById('profileCon').addEventListener('click', function() {
                document.getElementById('login').style.display = 'block';
            });

            document.getElementById('profileCon2').addEventListener('click', function(){
                document.getElementById('login').style.display = 'none';
            });

            document.getElementById('profileCon2').addEventListener('click', function() {
                document.getElementById('signup').style.display = 'block';
            });
            function closeModal2(){
                document.getElementById('signup').style.display = 'none';
            };
            
            document.getElementById('profileCon3').addEventListener('click', function(){
                document.getElementById('signup').style.display = 'none';
                document.getElementById('login').style.display = 'block';
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

            window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
                }
            });
            window.addEventListener('click', function(event) {
            if (event.target === modal2) {
                closeModal2();
                }
            });
        });

        

        // logout modal
        document.addEventListener('DOMContentLoaded', function() {
            var logoutBtn = document.getElementById('logoutBtn');
            var modal = document.getElementById('logoutModal');
            var closeModalBtn = modal.querySelector('.close3');
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
