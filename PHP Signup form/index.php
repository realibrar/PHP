<?php include "backendsignup.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
    <span class="details red"><?php echo $signup_succesfull;?></span>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" value="<?php echo $name;?>">
            <span class="details red"><?php echo $name_error;?></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" value="<?php echo $username;?>">
            <span class="details red"><?php echo $username_error;?></span>
            <span class="details red"><?php echo $username_error_signup;?></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" value="<?php echo $email;?>">
            <span class="details red"><?php echo $email_error;?></span>
            <span class="details red"><?php echo $email_error_signup;?></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneno" value="<?php echo $phoneno;?>" >
            <span class="details red"><?php echo $phoneno_error;?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" >
            <span class="details red"><?php echo $password_error;?></span>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" >
            <span class="details red"><?php echo $cpassword_error;?></span>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" <?php if(isset($gender) && $gender == "Male") echo "checked";?> value="Male">
          <input type="radio" name="gender" id="dot-2" <?php if(isset($gender) && $gender == "Female") echo "checked";?> value="Female">
          <input type="radio" name="gender" id="dot-3"  <?php if(isset($gender) && $gender == "Other") echo "checked";?> value="Other">
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
          <span class="details red"><?php echo $gender_error;?></span>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="submit">
        </div>
      </form>
    </div>
  </div>
</body>
</html>