<?php include "backend_update.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/website/css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Update your information</div>
    <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" value="">
            <span class="details red"></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" value="">
            <span class="details red"></span>
            <span class="details red"></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" value="">
            <span class="details red"></span>
            <span class="details red"></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneno" value="" >
            <span class="details red"></span>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1"  value="Male">
          <input type="radio" name="gender" id="dot-2"  value="Female">
          <input type="radio" name="gender" id="dot-3"  value="Other">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
          <span class="details red"></span>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="submit">
        </div>
        </form>
        <button onclick="document.location='http://localhost/website/change-password/'" class="button button4">Change password</button>        
    </div>
  </div>
</body>
</html>