<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  include_once("con.php");
  $friend_chat = mysqli_real_escape_string($con, $_POST['friend_chat']);
  $your_chat = mysqli_real_escape_string($con, $_POST['your_chat']);
  $message = mysqli_real_escape_string($con, $_POST['chat']);
  if (!empty($message)) {
    $sqli = mysqli_query($con, "INSERT INTO message (friend_id, your_id, msg)
                       VALUES ({$friend_chat}, {$your_chat}, '{$message}')") or die();
  }
} else {
  header("../index.php");
}
?>