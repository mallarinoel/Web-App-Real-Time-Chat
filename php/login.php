<?php
session_start();
include_once("con.php");
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
if (!empty($email) && !empty($password)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sqlQuery = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sqlQuery) > 0) {
      $fetch_row = mysqli_fetch_assoc($sqlQuery);
      $status = "Active Now";
      $update = "UPDATE users SET status = '{$status}' WHERE unique_id = {$fetch_row['unique_id']}";
      $query = mysqli_query($con, $update);
      if($query){
      $_SESSION['unique_id'] = $fetch_row['unique_id'];
      echo("Success");
      }
    } else {
      echo("Your email or password is incorrect.");
    }
  } else {
    echo("Please enter a valid email address.");
  }
} else if (empty($email)) {
  echo("Please enter your email.");
} else if (empty($password)) {
  echo("Please enter your password.");
}
?>