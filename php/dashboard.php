<?php
session_start();
include_once("con.php");
$friend_id = $_SESSION['unique_id'];
$mysql = mysqli_query($con, "SELECT * FROM users WHERE NOT unique_id = {$friend_id}");
$user = "";

if(mysqli_num_rows($mysql) == 0) {
  $user .= "No user available to chat.";
} elseif (mysqli_num_rows($mysql) > 0) {
  include("user.php");
}
echo($user);
?>