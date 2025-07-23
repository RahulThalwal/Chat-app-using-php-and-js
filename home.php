<?php
include 'php/config.php';// including the database connection
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location: login.php');
}

  $select = mysqli_query($conn, "SELECT * from user_form WHERE user_id = '$user_id'");
  if(mysqli_num_rows($select) > 0 ){
    $row = mysqli_fetch_assoc($select);
  }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Home Page</title>
    </head>
    <body>
        <div class="container">
            <section class="users">
                <header class="profile">
                    <div class="content">
                        <a href="update_profile.html"><img
                                src="uploaded_img/<?php echo rawurlencode(trim($row['img']));?>" alt></a>
                        <div class="details">
                            <span><?php echo rawurlencode(trim($row['name']));?></span>
                            <p><?php echo rawurlencode(trim($row['status']));?></p>
                        </div>
                    </div>
                    <a href="" class="logout">Logout</a>
                </header>
                <form action="" method="post" class="search">
                    <input type="text" name="search_box"
                        placeholder="enter name or email to search">
                    <button name="search_user"><img src="images/search.svg" alt>
                    </button>
                </form>
                <div class="all_users">
                    <a href="chat.html">
                        <div class="content">
                            <img src="uploaded_img/default-avatar.png" alt=""> 
                            <div class="details">
                                <span>Alfeed Marshall</span>
                                <p>Hello bro</p>
                            </div>
                        </div>
                        <div class="status-dot">

                        </div>
                    </a>

                </div>
            </section>
        </div>
    </body>
</html>