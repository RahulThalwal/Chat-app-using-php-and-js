<?php 

include 'php/config.php'; // including the database connection
session_start();
if (isset($_POST['submit'])){ // If user click the submit button 

 
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    
  // declaring input

  if (filter_var($email, FILTER_VALIDATE_EMAIL)){ //checking if email and password is correct 
 $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email='$email' AND password= '$password' " ); 
 
 if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $status = 'Active Now'; //User status

    $update = mysqli_query($conn, "UPDATE user_form SET status = '$status' WHERE user_id = '{$row['user_id']}' ");

    if($update){
        $_SESSION['user_id'] = $row['user_id'];
        header('location: home.php');
    }


 }else{
    $alert[]="Incorrect password or email!";
 } 

  }else {
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
       <title>Welcome Back</title>
    </head>
    <body>
        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
               <h3>Welcome Back</h3>
                <?php
                if(isset($select)){
                    foreach($alert as $alert){
                        echo '<div class="alert"> '.$alert .' </div>';
                    }
                }
                ?>



                

                <input type="email" class="box" name="email"
                    placeholder="Enter user email"
                    required>
                <input type="password" class="box" name="password"
                    placeholder="enter password"
                    required>


                <input type="submit" name="submit" class="btn" value="start chatting"
                    required>
                <p>don't have an acocunt? <a href="index.html">Register
                        Now</a></p>
            </form>
        </div>
    </body>
</html>