<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/website/css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Home</div>
    <div cslass="content">
    <span class="details red">
    <?php 
    session_start();
    if(isset($_SESSION['login_first'])){
        echo "Create an new account or login first";
        unset($_SESSION['login_first']);
    }

    ?>
</span>
    </br> <button onclick="document.location='http://localhost/website/sign-up/'" class="button button4">Create an Account</button>
<button onclick="document.location='http://localhost/website/log-in/'" class="button button4">Log in</button>

      </form>
    </div>
  </div>
</body>
</html>