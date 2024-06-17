<?php

include 'includes/class.extnd.php';

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}

if(isset($_GET['id']) && isset($_GET['type'])){
    
    $videoId = $_GET['id'];
    
    $videoType = $_GET['type'];
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="playVid.css">
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
            <div class="dropCon1">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Videos
                </div>
                <ul class="menuCon1 dropdown-menu">
                    <li><a class="item1" href="all.video.php">All</a></li>
                    <li><a class="item1" href="tutorial.video.php">Tutorial</a></li>
                    <li><a class="item1" href="gameplay.video.php">Entertainment</a></li>
                    <li><a class="item1" href="esport.video.php">eSPORT</a></li>
                </ul>
            </div>
            <div class="dropCon1">
                <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                    Updates
                </div>
                <ul class="menuCon1 dropdown-menu">
                    <li><a class="item1" href="updates.php">New Patches</a></li>
                    <li><a class="item1" href="esport.php">eSPORT</a></li>
                </ul>
            </div>

            <?php
                if(isset($_SESSION['password']) && isset($_SESSION['email'])){
            ?>

                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>           <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="profile.php">Profile</a>
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
                    <a id="profileCon" href="#myModal">
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
            <div class="content2">
                <div class="videoCon">
                    <div class="mainVideo">
                        <div class="mainVid">
                            <?php

                                $query = $insertPic->getVideo($videoType, $videoId);
                                $vidrow = mysqli_fetch_assoc($query);

                            ?>
                            <video  width="690" height="auto" controls autoplay height="600px" width="1000%">
                                <source src="videos/<?php echo $vidrow['video'] ?>" type="video/mp4">
                            </video>

                            <h3 class="title"><?php echo $vidrow['title'] ?></h3>

                            <div class="uploader">
                                <?php 
                                    $uploaderId = $vidrow['uploaderId'];
                                    
                                    $uploaderQuery = $insertPic->getUploader($uploaderId);
                                    $uploaderRow = mysqli_fetch_assoc($uploaderQuery);
                                ?>
                                <div class="Uploader">
                                <?php
                                    if($uploaderId == 0){
                                ?>
                                <?php
                                    }else{
                                        if($uploaderRow['profile'] > 0){
                                ?>
                                        <img src="images/<?php echo $uploaderRow['profile'] ?>">
                                <?php
                                        }else{
                                ?>
                                        <img src="images/profile.jpg">   
                                <?php
                                        }
                                ?>
                                    <p><?php echo $uploaderRow['username'] ?></p>
                                <?php
                                    }
                                ?>
                                </div>  
                                <?php
                                    if(isset($_SESSION['ID'])){
                                        $favquery = $insertPic->Addfavorite($videoId, $_SESSION['ID']);
                                        $favrow = mysqli_fetch_assoc($favquery);
                                    
                                        if(isset($_SESSION['role']) == 1){
                                            if(mysqli_num_rows($favquery) > 0){

                                                if($_SESSION['ID'] == $favrow['userId'] ){
                                        ?>
                                                    <a class="removeFav" href="includes/remove.favorite.php?id=<?php echo $videoId ?>&type=<?php echo $videoType ?>">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3l18 18" /><path d="M19.5 12.572l-1.5 1.428m-2 2l-4 4l-7.5 -7.428a5 5 0 0 1 -1.288 -5.068a4.976 4.976 0 0 1 1.788 -2.504m3 -1c1.56 0 3.05 .727 4 2a5 5 0 1 1 7.5 6.572" /></svg>
                                                        Remove from Favorite
                                                    </a>
                                        <?php
                                                }else{
                                        ?>
                                                    <form action="includes/favorite.b.php?id=<?php echo $_SESSION['ID'] ?>" method="post">
                                                        <input type="hidden" name="videoId" value="<?php echo $videoId ?>">
                                                        <input type="hidden" name="type" value="<?php echo $videoType ?>">
                                                        <input type="hidden" name="uploaderId" value="<?php echo $uploaderId ?>">
                                                        <input type="hidden" name="title" value="<?php echo $vidrow['title'] ?>">
                                                        <input type="hidden" name="video" value="<?php echo $vidrow['video'] ?>">
                                                        <button>
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.96 6.053" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                                            Add to Favorites
                                                        </button>
                                                    </form>
                                        
                                        <?php
                                                }
                                            }else{
                                        ?>
                                                <form action="includes/favorite.b.php?id=<?php echo $_SESSION['ID'] ?>" method="post">
                                                    <input type="hidden" name="videoId" value="<?php echo $videoId ?>">
                                                    <input type="hidden" name="type" value="<?php echo $videoType ?>">
                                                    <input type="hidden" name="uploaderId" value="<?php echo $uploaderId ?>">
                                                    <input type="hidden" name="title" value="<?php echo $vidrow['title'] ?>">
                                                    <input type="hidden" name="video" value="<?php echo $vidrow['video'] ?>">
                                                    <button>
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.96 6.053" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                                        Add to Favorites
                                                    </button>
                                                </form>
                                        <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <p class="description">Decription :<br> <?php echo $vidrow['description'] ?></p>
                        </div>
                    </div>

                    
                    <div class="videoList">

                        <?php
                            $sql2 = "SELECT * FROM tutorials UNION ALL SELECT * FROM gameplay UNION ALL SELECT * FROM esport ORDER BY RAND()"; 
                            $query2 = $insertPic->query($sql2);

                            while($Listrows = mysqli_fetch_assoc($query2)){
                                $txtLimit = 40;
                        ?>

                            <div class="video">
                                <a class="passBtn" href="play.video.php" data-id="<?php echo $Listrows['id'] ?>" data-type="<?php echo $Listrows['type'] ?>">
                                    <video src="videos/<?php echo $Listrows['video'] ?>" type="video/mp4" width="170px" height="auto" muted></video>
                                    <h6 class="title">
                                        <?php                                             
                                            if(strlen($Listrows['title']) > $txtLimit){
                                                echo substr($Listrows['title'], 0, $txtLimit) . "..."; 
                                            }else{
                                                echo $Listrows['title']; 
                                            }
                                        ?>
                                    </h6>
                                </a>
                            </div>     
                        <?php
                            }
                        ?>
                    </div>
                </div>

            </div>

        </div>

    </section>



    <!-- logout modal -->
    <div id="logoutModal" class="modal2">
        <div class="modal2-content">
            <span class="close2">&times;</span>
            <h2>Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="btns">
                <button class="cancel2">Cancel</button>
                <a class="logout" href="includes/logout.php">Logout</a>
            </div>    
        </div>
    </div>



    <script>

        // play video
        document.querySelectorAll('.passBtn').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const videoId = item.getAttribute('data-id');
                const videoType = item.getAttribute('data-type');
                window.location.href = 'play.video.php?id=' + encodeURIComponent(videoId) + '&type=' + encodeURIComponent(videoType);
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            var logoutBtn = document.getElementById('logoutBtn');
            var modal = document.getElementById('logoutModal');
            var closeModalBtn = modal.querySelector('.close2');
            var cancelModalBtn = modal.querySelector('.cancel2');
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
    header('location: home.php');
}
?>
