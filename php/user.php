<?php 
while($row = mysqli_fetch_assoc($mysql)) {
   $sql = "SELECT * FROM message WHERE (your_id = {$row['unique_id']}
           OR friend_id = {$row['unique_id']}) AND (friend_id = {$friend_id}
           OR your_id = {$friend_id}) ORDER BY id DESC LIMIT 1";
   $query = mysqli_query($con, $sql);
   $rowfetch = mysqli_fetch_assoc($query);
   if(mysqli_num_rows($query) > 0){
     $res = $rowfetch['msg'];
   }else {
     $res = "No message available";
   }
   
   (strlen($res) > 20) ? $msg = substr($res, 0, 20). '...' : $msg = $res; 
   ($friend_id == $rowfetch['your_id']) ? $you = "You : " : $you = "";
   ($row['status'] == "Offline Now") ? $offline = "offline" : $offline = "";
   $user .= '<a href="chat-area.php?id='.$row['unique_id'].'">
          <div class="content">
            <img src="/php/profile/'.$row['img'].'" alt="profile" />
            <div class="user-details">
              <span>'.$row['fname']." ".$row['lname'].'</span>
              <p>'. $you . $msg .'</p>
            </div>
          </div>
          <div class="user-status '.$offline.'"><i class="fas fa-circle"></i></div>
        </a>';
  }?>