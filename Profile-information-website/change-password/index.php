<?php include"backend_change_password.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/website/css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Change password</div>
    <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">New password</span>
            <input type="password" placeholder="New password" name="newpassword" value="<?php echo $newpassword;?>">
            <span class="details red"><?php echo $new_password_error;?></span>
          </div>
          <div class="input-box">
            <span class="details">Confirm password</span>
            <input type="password" placeholder="Confirm password" name="cnewpassword" value="<?php echo $cnewpassword;?>">
            <span class="details red"><?php echo $cpassword_error;?></span>
          </div>
          <div class="input-box">
            <span class="details">Old password</span>
            <input type="password" placeholder="Old password" name="oldpassword" value="<?php echo $oldpassword;?>">
            <span class="details red"><?php echo $old_password_error;?></span>
          </div>

        <div class="button">
          <input type="submit" name="submit" value="Confirm">
        </div>
      </form>
    </div>
  </div>
</body>
</html>