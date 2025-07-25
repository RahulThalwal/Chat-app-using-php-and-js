<?php
session_start();

include "config.php";
$outgoing_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_form WHERE NOT user_id = {$outgoing_id} ORDER BY user_id DESC ";

$query = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($query) == 0 ){
    $output .= "No  Users are available to chat";
}elseif(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)){
    $output .=    '<a href="chat.php?user_id=' . $row['user_id'] . '">
                        <div class="content">
                            <img src="uploaded_img/' . trim($row['img']) .'" alt=""> 
                            <div class="details">
                                <span>'. htmlspecialchars($row['name']) .'</span>
                                <p>' . htmlspecialchars($row['status']) . '</p>
                            </div>
                        </div>
                        <div class="status-dot">

                        </div>
                    </a>';
  }
}
echo $output;
?>