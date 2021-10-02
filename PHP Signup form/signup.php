<?php include "backendsignup.php";


?>
<!doctype html>
<html>
    <head>
        <title>signup</title>
        <link rel='stylesheet' href='./style.css' type='text/css'/>
</head>
<body>
</body>
<h2>Weekly Coding Challenge #1: Sign in/up Form</h2>
<h2><?php echo $signup_succesfull;?></h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<h1>Create Account</h1>
			<input type="text" name="fname" placeholder="First Name"  value="<?php echo $fname;?>"/>
			<?php echo $fname_error;?>
     		<input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"/>
			 <?php echo $lname_error;?>
			<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"/>
			<?php echo $email_error;?>
			<?php echo $email_error_signup;?>
			<input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"/>
			<?php echo $username_error;?>
			<?php echo $username_error_signup;?>
			<input type="password" name="password" placeholder="Password" />
			<?php echo $password_error;?>
      <input type="password" name="cpassword" placeholder="Confirm Password" />
	 		<?php echo $cpassword_error;?>

      			<button name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p class="p">To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p class="p">Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});</script>
</footer>
</html>