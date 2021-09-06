<?php
session_start();
include_once("con.php");
$friend_id = $_SESSION['unique_id'];
$searchUser = mysqli_real_escape_string($con, $_POST['searchTerm']);
$mysql = mysqli_query($con, "SELECT * FROM users WHERE NOT unique_id = {$friend_id} AND (fname LIKE '%{$searchUser}%' OR lname LIKE '%{$searchUser}%')");
$user = "";

if (mysqli_num_rows($mysql) > 0) {
  include("user.php");
}else {
  $user .= "No user found!";
}
echo($user);
?>