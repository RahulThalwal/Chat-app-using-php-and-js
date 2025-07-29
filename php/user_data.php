<?php


 while($row = mysqli_fetch_assoc($query)){

    $sql2 = "SELECT  * FROM messages WHERE (incoming_msg_id = {$row['user_id']} OR  outgoing_msg_id = {$row[$user_id]})
    AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY  msg_id DESC LIMIT 1";

 $query =  mysqli_query($conn, $sql2);




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

?>