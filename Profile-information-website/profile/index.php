<?php include "profile_backend.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
      <link rel="stylesheet" href="http://localhost/website/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
      <div class="container">
        <div class="title">Profile Data</div>
          <div class="content">
            <div class="user-details">
            <span class="details red">
              <?php 
              if(isset($_SESSION['already_login'])){
              echo "You already login";
              unset($_SESSION['already_login']);
              }
              ?>
              <?php 
              if(isset($_SESSION['update_password'])){
              echo " Password change succesfully";
              unset($_SESSION['update_password']);
              }
              ?>
              </span>
              <div class="input-box">
                <span class="details"></br>Name: <span class="details red"><?php echo $name_fetch;?></span></span>
              </div>
              <div class="input-box">
                <span class="details"></br>Username: <span class="details red"><?php echo $username_fetch;?></span></span>
              </div>
              <div class="input-box">
                <span class="details"></br>Email: <span class="details red"><?php echo $email_fetch;?></span></span>
              </div>
              <div class="input-box">
                <span class="details"></br>Phone no: <span class="details red"><?php echo $phoneno_fetch;?></span></span>
              </div>
              <div class="input-box">
                <span class="details"></br>Gender: <span class="details red"><?php echo $gender_fetch;?></span></span>
              </div>
              </br> <button onclick="document.location='http://localhost/website/update/'" class="button button4">Update information</button>
              </br> <button onclick="document.location='http://localhost/website/log-out/'" class="button button4">Log out</button>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>