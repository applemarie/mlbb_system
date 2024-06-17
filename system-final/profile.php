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
    <link rel="stylesheet" href="profiles.css">
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
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>           <a class= "list-group-item-action active <?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="profile.php">Profile</a>
                <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="uploads.php">Uploads</a>
                <a class= "<?php echo($role == 1 ? 'd-block' : 'd-none') ?> " href="favorite.php">Favorite</a>
            </div>

            <div class="content2">
                <div class="myProfile">

                    <?php
                        $insert = $insertPic->profile();
                            if(isset($_SESSION['profile'])){
                                $profile = $_SESSION['profile'];
                                ?>
                                <div class="profile">
                                    <img src="<?php echo("images/$profile") ?>">
                                    <a id="updateBtn" href="#updateProfile">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                    </a>
                                </div>
                        <?php        
                            }else{ ?>
                                <img src="images/profile.jpg">
                        <?php
                            }
                        
                        ?>

                    <div class="me">
                        <div class="edit">
                            <h3>
                                <?php
                                    $userSql = $insertPic->getUsername();
                                    echo $userSql['username'];
                                ?>
                                <a id="unameBtn" href="#updateUname">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                </a>
                            </h3>

                            <?php
                                if(!isset($_SESSION['profile'])){
                            ?>
                                    <a id="profileCon" href="#myModal">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                                        Upload Profile
                                    </a>
                            <?php

                                }
                            ?>
                        </div>
                            <?php
                                if(isset($_SESSION['about'])){
                                ?>
                                    <p>
                                        <?php echo $_SESSION['about'] ?>
                                        <a  id="aboutBtn" href="#updateAbout">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </a>
                                    </p>
                                <?php
                                }else{
                                ?>
                                    <p>Describe yourself...</p>
                                <?php
                                }
                            ?>
                    </div>
                </div>

                <div class="uploads">
                    <h5>Uploads</h5>

                    <div class="videoUploads">

                        <?php

                            $userId = $_SESSION['ID'];

                            $sql = "SELECT * FROM tutorials WHERE tutorials.uploaderId='$userId' UNION ALL SELECT * FROM gameplay WHERE gameplay.uploaderId='$userId'"; 
                            $query = $insertPic->query($sql);
                            while($row = mysqli_fetch_assoc($query)){
                                $_SESSION['video'] = $row['video'];
                                $_SESSION['title'] = $row['title'];
                                $_SESSION['description'] = $row['description'];

                                $txtLimit = 30;

                                if( $userId == $row['uploaderId']){
                        ?>
                                <div class="Display">
                                    
                                    <a class="passBtn" href="play.video.php" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['type'] ?>">
                                        <video src="videos/<?php echo $_SESSION['video'] ?>" type="video/mp4" width="auto" height="140" muted></video>
                                    </a>
                                    <h6>
                                        <?php
                                            if(strlen($_SESSION['title']) > $txtLimit){
                                                echo substr($_SESSION['title'], 0, $txtLimit) . "..."; 
                                            }else{
                                                echo $_SESSION['title']; 
                                            }
                                        ?>
                                    </h6>
                                </div>

                        <?php
                                }
                            }
                        ?>
                    
                    </div>
                </div>
            </div>    

        </div>

    </section>


    <!-- update username Modal -->
    <div id="updateUname" class="modal5">
        <div class="modal5-content">
            <span class="close5" onclick="closeUnameModal()">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </span>
            <h3>Edit Username</h3>
            <form action="includes/profile.update.php?id=<?php echo $_SESSION['ID'] ?>&type=uname" method="post" enctype="multipart/form-data">
                <input type="text" name="username" class="uname">    
                <input type="submit" value="Save" class="submit">
            </form>
        </div>
    </div>


    <!-- update profile image -->
    <div id="updateProfile" class="modal3">
        <div class="modal3-content">
            <span class="close3" onclick="closeUpdateModal()">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </span>
            <h3>Edit Profile</h3>
            <p id="error-message2"></p>
            <form action="includes/profile.update.php?id=<?php echo $_SESSION['imgID'] ?>&type=image" method="post" enctype="multipart/form-data">
                <input type="file" name="profile" class="profileImg">    
                <input type="submit" value="Save" class="submit">
            </form>
        </div>
    </div>


    <!-- update about -->
    <div id="updateAbout" class="modal4">
        <div class="modal4-content">
            <span class="close4" onclick="closeAboutModal()">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </span>
            <h3>Edit About</h3>
            <form action="includes/profile.update.php?id=<?php echo $_SESSION['imgID'] ?>&type=About" method="post" enctype="multipart/form-data"> 
                <div class="form-floating mt-3">
                    <textarea type="text" class="form-control" name="about" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Say something here...</label>
                </div> 
                <input type="submit" value="Save" class="submit">
            </form>
        </div>
    </div>

    

    <!-- upload profile -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeProfileModal()">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </span>
            <h3>Upload Profile</h3>
            <p id="error-message"></p>
            <form action="includes/profile.b.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            
                <input type="file" name="profile" class="profileImg">     
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="about" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Say something here...</label>
                </div> 
                <input type="submit" value="Save" class="submit">
            </form>
        </div>
    </div>



    <!-- logout Modal -->
    <div id="logoutModal" class="modal2">
        <div class="modal2-content">
            <span class="close2" onclick="closeLogoutModal()">&times;</span>
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
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Play video on other page
    document.querySelectorAll('.passBtn').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            const videoId = item.getAttribute('data-id');
            const videoType = item.getAttribute('data-type');
            window.location.href = 'play.video.php?id=' + encodeURIComponent(videoId) + '&type=' + encodeURIComponent(videoType);
        });
    });

    // Logout modal
    var logoutBtn = document.getElementById('logoutBtn');
    var logoutModal = document.getElementById('logoutModal');
    var closeModalBtn = logoutModal ? logoutModal.querySelector('.close2') : null;
    var cancelModalBtn = logoutModal ? logoutModal.querySelector('.cancel') : null;
    var logoutModalBtn = logoutModal ? logoutModal.querySelector('.logout') : null;

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            if (logoutModal) logoutModal.style.display = 'block';
        });
    }

    function closeLogoutModal() {
        if (logoutModal) logoutModal.style.display = 'none';
    }

    if (closeModalBtn) closeModalBtn.addEventListener('click', closeLogoutModal);
    if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeLogoutModal);

    window.addEventListener('click', function(event) {
        if (event.target === logoutModal) {
            closeLogoutModal();
        }
    });

    // Upload profile modal
    var profileModal = document.getElementById('myModal');
    var profileCon = document.getElementById('profileCon');

    if (profileCon) {
        profileCon.addEventListener('click', function() {
            if (profileModal) profileModal.style.display = 'block';
        });
    }

    function closeProfileModal() {
        if (profileModal) profileModal.style.display = 'none';
    }

    var statusMessage = getParameterByName('status');
    var errorMessage = getParameterByName('error');

    if (statusMessage) {
        document.getElementById('error-message').innerText = statusMessage;
        if (profileModal) profileModal.style.display = 'block';
    }

    if (errorMessage) {
        document.getElementById('error-message').innerText = errorMessage;
        if (profileModal) profileModal.style.display = 'block';
    }

    window.addEventListener('click', function(event) {
        if (event.target === profileModal) {
            closeProfileModal();
        }
    });

    // Update profile modal
    var updateModal = document.getElementById('updateProfile');
    var updateBtn = document.getElementById('updateBtn');

    if (updateBtn) {
        updateBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (updateModal) updateModal.style.display = 'block';
        });
    }

    function closeUpdateModal() {
        if (updateModal) updateModal.style.display = 'none';
    }

    var updateErrorMessage = getParameterByName('error2');

    if (updateErrorMessage) {
        document.getElementById('error-message2').innerText = updateErrorMessage;
        if (updateModal) updateModal.style.display = 'block';
    }

    window.addEventListener('click', function(event) {
        if (event.target === updateModal) {
            closeUpdateModal();
        }
    });

    // Update about modal
    var AboutModal = document.getElementById('updateAbout');
    var aboutBtn = document.getElementById('aboutBtn');

    if (aboutBtn) {
        aboutBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (AboutModal) AboutModal.style.display = 'block';
        });
    }

    function closeAboutModal() {
        if (AboutModal) AboutModal.style.display = 'none';
    }

    window.addEventListener('click', function(event) {
        if (event.target === AboutModal) {
            closeAboutModal();
        }
    });


    // Update username modal
    var UnameModal = document.getElementById('updateUname');
    var unameBtn = document.getElementById('unameBtn');

    if (unameBtn) {
        unameBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (UnameModal) UnameModal.style.display = 'block';
        });
    }

    function closeUnameModal() {
        if (UnameModal) UnameModal.style.display = 'none';
    }

    window.addEventListener('click', function(event) {
        if (event.target === UnameModal) {
            closeUnameModal();
        }
    });

    window.closeLogoutModal = closeLogoutModal;
    window.closeProfileModal = closeProfileModal;
    window.closeUpdateModal = closeUpdateModal;
    window.closeAboutModal = closeAboutModal;
    window.closeUnameModal = closeUnameModal;
});

        

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
elseif(!isset($_SESSION['password']) && !isset($_SESSION['email'])){
    header('location: index.php');
}
?>