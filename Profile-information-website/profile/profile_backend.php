<?php
include "./../db/db.php";
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login_first']="1";
    header("location: ./../");
}
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
$profile_data_query="SELECT name, username, email, phoneno, gender FROM signup where (username='$username' || email='$username')";
$profile_data_query_result=mysqli_query($conn, $profile_data_query);
$profile_data_fetch=mysqli_fetch_assoc($profile_data_query_result);
$name_fetch=$profile_data_fetch['name'];
$username_fetch=$profile_data_fetch['username'];
$email_fetch=$profile_data_fetch['email'];
$phoneno_fetch=$profile_data_fetch['phoneno'];
$gender_fetch=$profile_data_fetch['gender'];
}
?>