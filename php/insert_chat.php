<?php

session_start();
if(isset($_SESSION['user_id'])){
    include "config.php";
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
     $message = mysqli_real_escape_string($conn, $_POST['message']);


     if(!empty($message)){
        $insert_img = mysqli_query($conn, "INSERT INTO `messages`( `outgoing_msg_id`, `incoming_msg_id`, `msg` ) VALUES ( '{$outgoing_id}','{$incoming_id}','$message' )");
     }




}else{
    header('location: login.php');
}


?>