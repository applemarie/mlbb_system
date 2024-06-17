<?php

include 'includes/class.extnd.php';

if(isset($_SESSION['password']) && isset($_SESSION['email'])){

    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
    }
    if(isset($_SESSION['ID'])){
        $id = $_SESSION['ID'];
    }
    if($role != 0){
        header('location: home.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="game.updates.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <div class="navbar">
            <a href="home.php">Home</a>
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
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="dashboard.php">Dashboard</a>  
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="users.php">Users</a>  
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="user.uploads.php">User Uploads</a>  
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="game.update.php">Game Updates</a>
                <div class="dropCon">
                    <div class="drop dropdown-toggle active" data-bs-toggle="dropdown">
                        eSPORT
                    </div>
                    <ul class="menuCon dropdown-menu">
                        <li><a class="item" href="esport.upload.php">Videos</a></li>
                        <li><a class="item active" href="esport.updates.php">Updates</a></li>
                    </ul>
                </div>
            </div> 
            
            <div class="content2">
                <div class="uploads">
                    <h5>UPDATES</h5>   
                    <a id="profileCon" href="#">
                        Add
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    </a>
                </div>

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



    <!-- upload modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="image">
                <img src="images/lylia.png">
            </div>
            <span class="close" onclick="closeModal()">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
            </span>
            <h3>Upload</h3>
            <p class="Error" id="error-message"></p>
            <form action="includes/esport.b.php?type=updates" method="post" enctype="multipart/form-data">
                <input type="file" name="profile" class="image"> 
                <input type="text" name="title" placeholder="Title">  
                <div class="form-floating mt-3">
                    <textarea class="form-control" name="description" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div> 

                <button type="submit" class="loginBtn">Upload</button>
            </form>
        </div>
    </div>



    <!-- logout modal -->
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

        // upload video
        var modal = document.getElementById('myModal');

        document.getElementById('profileCon').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'block';
        });
        function closeModal(){
            document.getElementById('myModal').style.display = 'none';
        };

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




        // logout modal
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