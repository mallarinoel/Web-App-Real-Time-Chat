<?php
session_start();
include_once("con.php");
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $checkMe = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");

    if (mysqli_num_rows($checkMe) > 0) {
      echo("This email is already exist.");
    } else {
      if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);
        $img_extension = ['png', 'jpg', 'jpeg'];
        if (in_array($img_ext, $img_extension) === true) {
          $time = time();
          if (move_uploaded_file($tmp_name, "profile/".$img_name)) {
            $status = "Offline Now";
            $random_id = rand(time(), 10000000);
            $mysql = mysqli_query($con, "INSERT INTO users(unique_id, fname, lname, email, password, img, status)
                                      VALUES ({$random_id}, '{$fname}', '{$lname}','{$email}', '{$password}', '{$img_name}', '{$status}')");
            if ($mysql) {
              $myquery = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
              if (mysqli_num_rows($myquery) > 0) {
                $fetch_row = mysqli_fetch_assoc($myquery);
                $_SESSION['unique_id'] = $fetch_row['unique_id'];
                echo("Success");
              }
            } else {
              echo("Something went wrong with your query");
            }
          }
        } else {
          echo("Please select a valid image File - .jpg .jpeg .png");
        }
      } else {
        echo("Please select an image file.");
      }
    }
  } else {
    echo("$email - This email is not valid.");
  }

} else {
  echo("Please fill up the form below!");
}



?>