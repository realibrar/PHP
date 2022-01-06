<?php include"backend_login.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/website/css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Log-in</div>
    <div class="content">
    <span class="details red">
      <?php
      $phpsisid=1;
      if(isset($_SESSION['signup_succesfull'])){
        echo $_SESSION['signup_succesfull'];
        unset($_SESSION['signup_succesfull']);
        }
        ?>
      </span>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username or Email</span>
            <input type="text" placeholder="Email or username" name="username" value="<?php echo $username;?>">
            <span class="details red"><?php echo $username_error?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Password" name="password" value="">
            <span class="details red"><?php echo $password_error?></span>
            <span class="details red"></span>
          </div>

        <div class="button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
    </div>
  </div>
</body>
</html>