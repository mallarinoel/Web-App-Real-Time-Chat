<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: /login.php");
}?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nam - Real Time Chat</title>
  <link rel="icon" href="/icon.png" />
  <meta name"description" content="Real Time Chat"/>
  <meta name="author" content="Noel Mallari"/>
  <link rel="stylesheet" href="/style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <section class="user-chat">
      <header>
        <?php
        include_once("php/con.php");
        $user_id = mysqli_real_escape_string($con, $_GET['id']);
        $sqli = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
        
        if(mysqli_num_rows($sqli) > 0){
          $row = mysqli_fetch_assoc($sqli);
        }
        ?>
        
        <a href="/dashboard.php" class="user-back"><i class="fas fa-arrow-left"></i></a>
        <img src="/php/profile/<?php echo $row['img'] ?>" alt="profile" />
        <div class="details">
          <span><?php echo $row['fname'], " ", $row['lname'] ?></span>
          <p><?php echo $row['status']?></p>
        </div>
      </header>
      <div class="user-chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" name="your_chat" value="<?php echo $_SESSION['unique_id']; ?>" hidden/>
        <input type="text" name="friend_chat" value="<?php echo $user_id; ?>" hidden/>
        <input class="message" name="chat" type="text" placeholder="Type a message here.." />
        <button><i class="send-icon fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="/javascript/chat.js"></script>
</body>
</html>