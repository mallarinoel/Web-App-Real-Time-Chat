<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: /login.php");
}?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Time Chat - Dashboard</title>
  <link rel="icon" href="/icon.png" />
  <meta name"description" content="Real Time Chat"/>
  <meta name="author" content="Noel Mallari"/>
  <link rel="stylesheet" href="/style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <section class="user-dashboard">
      <header>
        <?php
        include_once("php/con.php");
        $sqli = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        
        if(mysqli_num_rows($sqli) > 0){
          $row = mysqli_fetch_assoc($sqli);
        }
        ?>
        <div class="content">
          <img src="/php/profile/<?php echo $row['img'] ?>" alt="profile" />
          <div class="user-details">
            <span><?php echo $row['fname'], " ", $row['lname'] ?></span>
            <p><?php echo $row['status']?></p>
          </div>
        </div>
        <a href="php/logout.php?user_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
      </header>
      <div class="user-search">
        <span class="search">Pumili ng gustong kausapin.</span>
        <input type="text" placeholder="Ilagay ang pangalan ng hahanapin..." />
        <button type="submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="user-list">
       
      </div>
    </section>
  </div>
  <script src="/javascript/search.js"></script>
</body>
</html>
