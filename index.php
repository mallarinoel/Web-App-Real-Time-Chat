<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Time Chat - Login</title>
  <link rel="icon" href="/icon.png" />
  <meta name"description" content="Real Time Chat"/>
  <meta name="author" content="Noel Mallari"/>
  <link rel="stylesheet" href="/style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="form Login">
      <header>
        Real Time Chat - Login
      </header>
      <form action="#">
        <div class="error-notification"></div>
        <div class="field input">
          <label for="email">Email Address</label>
          <input type="text" name="email" placeholder="Enter your Email" />
        </div>
        <div class="field input">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter Password" />
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" value="Continue to chat" />
        </div>
      </form>
      <div class="login">
        Not yet signed up? <a href="/register.php">Signup Now!</a>
      </div>
    </section>
  </div>
  <script src="/javascript/password.js"></script>
  <script src="/javascript/login.js"></script>
</body>
</html>