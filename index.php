<?php 
include 'php/config.php'; // including the database connection
session_start();
$image_rename = 'default-avatar.png'; // User default image
if (isset($_POST['submit'])){ // If user click the submit button 

    $ran_id = rand(time(), 1000000000 ); //creating random number
 
    $name = mysqli_real_escape_string($conn, $_POST['name']);  
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  // declaring input

  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    // CHECKING IF EMAIL IS VALID

    $image = $_FILES['image']['name']; // user image name 
    $image_size = $_FILES ['image']['size']; // user image size
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_rename = $image;
    $image_folder = 'uploaded_img/'.$image_rename; // image folder
    $status = 'Active Now'; //user status

  $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email= '$email' AND password = '$password' "); // checking if user already exist
   if(mysqli_num_rows($select) > 0){
    $alert[] = "User already exist!";
   } else{
    if($password != $cpassword){
        $alert[]= "Password not matched!";
    }elseif($image_size > 2000000){
         $alert[]= "Image size too large ";
    }else{
$insert = mysqli_query($conn, "INSERT INTO `user_form`( `user_id`,`name`, `email`, `password`, `img`, `status`) VALUES ('$ran_id','$name','$email','$password',' $image_rename','$status')");
   
  if($insert){
    move_uploaded_file($image_tmp_name, $image_folder); // moving image file 
    header('location: login.php');
  } else{
    $alert[]= "Connection failed please retry!";
  }

    }
        
    }
   

  } else {
    $alert[] = "$email this is invalid email";
  }


}

if(isset($_SESSION['user_id'])){
  header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Create account</title>
</head>

<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Create account</h3>

            <?php
               
               if(isset($alert)){
                foreach ($alert as $alert){
                    echo '<div class="alert">'.$alert.'</div>';
                }
               }
               
               ?>




            <!-- <div class="alert">Error please try agian</div> -->
            <input type="text" class="box" name="name" placeholder="Enter user name" required>
            <input type="email" class="box" name="email" placeholder="Enter user email" required>
            <input type="password" class="box" name="password" placeholder="enter password" required>
            <input type="password" class="box" name="cpassword" placeholder="confirm password" required>
            <input type="file" name="image" class="box " accept="image/*">
            <input type="submit" name="submit" class="btn" value="start chatting" required>
            <p>already have an acocunt? <a href="login.php">Login
                    Now</a></p>
        </form>
    </div>
</body>

              </html>