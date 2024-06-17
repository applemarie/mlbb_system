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
    <link rel="stylesheet" href="users.css">
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
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> active" href="users.php">Users</a>  
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="user.uploads.php">User Uploads</a>  
                <a class= "<?php echo($role == 0 ? 'd-block' : 'd-none') ?> " href="game.update.php">Game Updates</a>
                <div class="dropCon">
                    <div class="drop dropdown-toggle" data-bs-toggle="dropdown">
                        eSPORT
                    </div>
                    <ul class="menuCon dropdown-menu">
                        <li><a class="item" href="esport.upload.php">Videos</a></li>
                        <li><a class="item" href="esport.updates.php">Updates</a></li>
                    </ul>
                </div>
            </div> 
            
            <div class="content2">

                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * from users WHERE role = 1";
                            $query = $insertPic->query($sql);

                            while($rows = mysqli_fetch_assoc($query)){
                        ?>

                        <tr>
                            <td>
                                <a  class="delete-btn" href="#deleteModal" data-id="<?php echo $rows['id'];?>">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                    Delete
                                </a>
                            </td>
                            <td> <?php echo $rows['username'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['address'] ?></td>
                        </tr>                    
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
             
            </div>

        </div>

    </section>



    <div id="deleteModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="28"  height="28"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" /><path d="M12 16h.01" /></svg>
                    Delete
                </h2>
                <p>Are you sure you want to delete this user?</p>
                <form id="deleteForm" action="includes/user.delete.php" method="post">
                    <input type="hidden" id="deleteId" name="id">
                    <div class="btns">
                        <button class="cancel">Cancel</button>
                        <button type="submit" class="delete">Delete</button>
                    </div>    
                </form>    
            </div>
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

        
        // logout
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


        // delete user
        document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('deleteModal');
        var closeModalBtn = modal.querySelector('.close');
        var cancelModalBtn = modal.querySelector('.cancel');
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
        
        function closeModal2(event){
            if (event) event.preventDefault();
            modal.style.display = 'none';
        }

        closeModalBtn.addEventListener('click', closeModal2);
        cancelModalBtn.addEventListener('click', closeModal2);

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