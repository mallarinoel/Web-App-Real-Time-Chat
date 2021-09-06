<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  include_once("con.php");
  $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
  if(isset($user_id)){
    $status = "Offline Now";
    $update = "UPDATE users SET status = '{$status}' WHERE unique_id = {$user_id}";
    $query = mysqli_query($con, $update);
    if($query){
      session_unset();
      session_destroy();
      header("Location: ../index.php");
    }
  }else{
   header("Location: ../dashboard.php");
  }
} else {
  header("Location: ../index.php");
}


?>