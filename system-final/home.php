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
    <link rel="stylesheet" href="Home.css">
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
                    <li><a class="item" href="esport.php">eSPORT</a></li>
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
        <video autoplay loop muted plays-inline class="bg-video">
            <source src="bg-video/bgvideo.mp4" type="video/mp4">
        </video>

        <div class="content">
            <img src="images/ml logo.png">

            <div class="join">
                <a href="#New">Learn More</a>
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M18 13l-6 6" /><path d="M6 13l6 6" /></svg>
            </div>
        </div>

    </section>
    <div id="New">
        <h4>New Updates</h4>

        <div class="news">
            <?php
                $query = $insertPic->patches();
                while($row = mysqli_fetch_assoc($query)){
                    $txtLimit = 100;
                    $picture = $row['picture'];
            ?>
            <div class="card" style="width: 20rem;">
                <img src="<?php echo("images/$picture") ?>" class="card-img-top" alt="...">

                <div class="card-body">
                    <small class="credits">Credits to Moonton</small>
                    <br>
                    <small><?php echo $row['type'] ?></small>
                    <h5><?php echo $row['title'] ?></h5>
                    <h6>
                        <?php
                            if(strlen($row['description']) > $txtLimit){
                                echo substr($row['description'], 0, $txtLimit) . "..."; 
                            }
                        ?>
                    </h6>
                    <a href="game.update.php#<?php echo $row['id'] ?>" class="btn">Read More</a>
                </div>
            </div>
            <?php
                }
            ?>
            
        </div>

    </div>

    <div id="Tips">
        <h4>Tips</h4>
        <div class="content2">
            <div class="text">
                <p>To excel in Mobile Legends and climb the ranks, focus on mastering a few heroes that suit your playstyle and practice them diligently. Understand the game's basics, including map objectives and hero roles, and communicate effectively with your team. Efficient farming, map awareness, and prioritizing objectives like turrets and buffs are crucial for gaining advantages. Stay adaptable to the meta, adjusting hero picks and builds as needed, and continuously improve by watching high-level gameplay and analyzing your own performances. Patience, positivity, and a willingness to learn from mistakes are key to steadily progressing in Mobile Legends.</p>
                <small>-Top!Joker</small>
            </div>
            <div class="image1">
                <img src="images/tip.jpg">
            </div>
        </div>
    </div>

    <div id="about">
        <h4>About Us</h4>
        <div class="content3">
            <p> Welcome to the Mobile Legend Highlights and Updates System, an online platform developed for our academic assignment. Our objective is to create user-friendly and effective web solutions that highlight our expertise in contemporary web technologies.
                Our goal is to demonstrate our capacity to develop inventive and useful web solutions that improve user experience and address certain requirements.
                Our project is evidence of our diligence, imagination, and hard work. It displays our dedication to acquiring knowledge and using it in meaningful, practical ways.
            </p>
        </div>
    </div>


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
}
elseif(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: login.php');
}
?>