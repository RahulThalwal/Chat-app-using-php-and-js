<?php 
include 'php/config.php'; // including the database connection
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
  } else {
    $alert[] = "$email this is invalid email";
  }


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
                <input type="text" class="box" name="name"
                    placeholder="Enter user name"
                    required>
                <input type="email" class="box" name="email"
                    placeholder="Enter user email"
                    required>
                <input type="password" class="box" name="password"
                    placeholder="enter password"
                    required>
                <input type="password" class="box" name="cpassword"
                    placeholder="confirm password"
                    required>
                <input type="file" name="image" class="box " accept="image/*"
                    >
                <input type="submit" name="submit" class="btn" value="start chatting"
                    required>
                <p>already have an acocunt? <a href="login.html">Login
                        Now</a></p>
            </form>
        </div>
    </body>
</html>