<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="/icon.png" />
  <meta name"description" content="Real Time Chat"/>
  <meta name="author" content="Noel Mallari"/>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Real Time Chat - Register</title>
  <link rel="stylesheet" href="/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="form sign_up">
      <header>
        Real Time Chat - Register
      </header>
      <form action="#" enctype="multipart/form-data" autocomplete="off">
        <div class="error-notification"></div>
          <div class="user-details">
            <div class="field input">
              <label for="fname">First Name</label>
              <input type="text" name="fname" placeholder="Enter First Name" required />
            </div>
            <div class="field input">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" placeholder="Enter Last Name" required />
            </div>
          </div>
          <div class="field input">
            <label for="email">Email Address</label>
            <input type="text" name="email" placeholder="Enter your Email" required />
          </div>
          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password" required />
            <i class="fas fa-eye"></i>
          </div>
          <div class="field image">
            <label for="image">Select Profile</label>
            <input class="img" type="file" name="image" required/>
          </div>
          <div class="field button">
            <input type="submit" value="Register Now!" />
          </div>
      </form>
      <div class="login">
        Already signed up? <a href="/index.php">Login Now!</a>
      </div>
    </section>
  </div>
  <script src="/javascript/password.js"></script>
  <script src="/javascript/signup.js"></script>
</body>
</html>
