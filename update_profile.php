<?php

include 'php/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location: login.php');
}

$select = mysqli_query($conn, "SELECT * FROM user_form WHERE user_id = '$user_id'");
if(mysqli_num_rows($select)> 0 ){
    $row = mysqli_fetch_assoc($select);
}

if(isset($_POST['update_profile'])){
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    $update= mysqli_query($conn, "UPDATE user_form SET name = '$update_name', email='$update_email' WHERE user_id = '$user_id' ");

    if($update){
        header('location: update_profile.php');
    }

    $image = $_FILES['image']['name']; // user image name
    $image_size = $_FILES['update_image']['size']; // user image size
    $image_tmp_name = $_FILES ['update_image']['tmp_name'];
    $image_rename = $image;
    $image_folder = 'uploaded_img/'.$image_rename; 


}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>update profile</title>
    </head>
    <body>
        <div class="update-profile">

            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo trim($row['img'])?>" alt="">

                <div class="alert">Can't update the Profile </div>
                 

                <div class="flex">
                    <div class="inputBox">
                        <span>username :</span>
                        <input type="text" name="update_name" value="<?php echo $row['name']?>"
                            class="box">
                        <span>useremail :</span>
                        <input type="email" name="update_email"
                            value="<?php echo $row['email'] ?>" class="box">
                        <span> Update your picture:</span>
                        <input type="file" name="update_image" accept="image/*"
                            class="box">
                    </div>
                    <div class="inputBox">
                        <span>Old password :</span>
                        <input type="password" name="old_pass" class="box">
                        <span>New password :</span>
                        <input type="password" name="new_pass" class="box">
                        <span> Confirm password:</span>
                        <input type="password" name="confirm_pass" class="box">
                    </div>

                </div>
                <div class="flex btns">
<input type="submit" value="update_profile" name="update profile" class="btn" > 
<a href="home.php" class="delete-btn" >Go Back</a>
                </div>
            </form>
        </div>
    </body>
</html>