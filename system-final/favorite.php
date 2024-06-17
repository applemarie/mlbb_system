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
    <link rel="stylesheet" href="favorites.css">
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
        <div class="contents">
            
            <div class="nav">
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>       <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="profile.php">Profile</a>
                <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="uploads.php">Uploads</a>
                <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> active" href="favorite.php">Favorite</a>
            </div>

            <div class="content2">
                <h5>Favorite</h5>
                <div class="uploads">
                    <div class="videoUploads">
                        <?php
                            $favorites = $insertPic->getFav($_SESSION['ID']);
                        
                            while($row = mysqli_fetch_assoc($favorites)){
                                $txtLimit = 30;
                        ?>
                            <div class="Display">

                                <div class="delete">
                                    <a  class="delete-btn" href="#deleteModal" data-id="<?php echo $row['id'];?>">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                        Delete
                                    </a>
                                </div>    

                                <a class="passBtn" href="play.video.php" data-id="<?php echo $row['videoId'] ?>" data-type="<?php echo $row['type'] ?>">
                                    <video src="videos/<?php echo $row['video'] ?>" type="video/mp4" width="auto" height="140" muted></video>
                                </a>
                                <h6>
                                    <?php
                                        if(strlen($row['title']) > $txtLimit){
                                            echo substr($row['title'], 0, $txtLimit) . "..."; 
                                        }else{
                                            echo $row['title']; 
                                        }
                                    ?>
                                </h6>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
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


        <!-- delete modal -->
    <div id="deleteModal" class="modal3">
        <div class="modal3-dialog">
            <div class="modal3-content">
                <span class="close3">&times;</span>
                <h2>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="28"  height="28"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" /><path d="M12 16h.01" /></svg>
                    Delete
                </h2>
                <p>Are you sure you want to delete this item?</p>
                <form id="deleteForm" action="includes/favorite.delete.php" method="post">
                    <input type="hidden" id="deleteId" name="id">
                    <div class="btns3">
                        <button class="cancel3">Cancel</button>
                        <button type="submit" class="delete3">Delete</button>
                    </div>    
                </form>    
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

        
                // delete upload
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('deleteModal');
            var closeModalBtn = modal.querySelector('.close3');
            var cancelModalBtn = modal.querySelector('.cancel3');
            var openBtn = document.querySelectorAll('.delete-btn');
            var deleteIdInput = document.getElementById('deleteId');


            openBtn.forEach(function(button) {
                button.addEventListener('click', function() {
                    event.preventDefault();
                    var itemId = this.dataset.id;
                    deleteIdInput.value = itemId;
                    modal.style.display = 'block';
                });
            });
            
            function CloseModal(event){
                if (event) event.preventDefault();
                modal.style.display = 'none';
            }

            closeModalBtn.addEventListener('click', CloseModal);
            cancelModalBtn.addEventListener('click', CloseModal);

            window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
                }
            });

        });



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