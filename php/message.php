<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  include_once("con.php");
  $friend_id = mysqli_real_escape_string($con, $_POST['friend_chat']);
  $your_id = mysqli_real_escape_string($con, $_POST['your_chat']);
  $chat = "";
  
  $sqli = "SELECT * FROM message 
           LEFT JOIN users ON users.unique_id = your_id
           WHERE (friend_id = {$friend_id} AND your_id = {$your_id}) 
           OR (friend_id = {$your_id} AND your_id = {$friend_id}) ORDER BY id ASC";
  $mysqli = mysqli_query($con, $sqli);
  if(mysqli_num_rows($mysqli) > 0){
    while($row = mysqli_fetch_assoc($mysqli)){
      if($row['friend_id'] === $friend_id){
        $chat .= '<div class="chat outgoing">
                    <div class="chat-details">
                      <p>'. $row['msg'] .'</p>
                    </div>
                  </div>';
      }else{
        $chat .= '<div class="chat incomming">
                      <img src="/php/profile/'.$row['img'].'" alt="profile" />
                        <div class="chat-details">
                        <p>'. $row['msg'] .'</p>
                        </div>
                  </div>';
      }
    }
    echo $chat;
  }
} else {
  header("../index.php");
}
?>