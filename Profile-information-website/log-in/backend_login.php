<?php 
include "./../db/db.php";
session_start();
if(isset($_SESSION['login'])){
    $_SESSION['already_login']==true;
    header("location: ./../profile/");
}
// if(!isset($phpsisid)){
//     header("location: localhost/website/log-in");
// }
$username=$password="";
$username_error=$password_error=$username_error_signup="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$password=$_POST["password"];
$username_array=["Username or email is required", "wrong email or username", "User not exit"];
if(empty($username)){
    $username_error=$username_array[0];
}elseif(!preg_match_all("/^[a-z]*([a-z0-9\-]+[@]+[a-z0-9\-]+[.]+[a-z]{2,}+)?$/i",$username)){
    $username_error=$username_array[1];
}
$password_array=["Password is required", "Wrong password"];
if(empty($password)){
    $password_error=$password_array[0];
}elseif(strlen($password)<6){
    $password_error=$password_array[1];
}
if(empty($password_error) && empty($username_error) && isset($username) && isset($password)){
    $validate_username_query= "SELECT * FROM signup where (username='$username' || email='$username')";
    $validate_username_mysql_query=mysqli_query($conn,$validate_username_query);
    if(mysqli_num_rows($validate_username_mysql_query)==0){
        $username_error=$username_array[2];
    }
    if(empty($username_error)){
        $username_email_query= "SELECT * FROM signup where (username='$username' || email='$username')";
        $username_email_query_result=mysqli_query($conn,$username_email_query);
        if(mysqli_num_rows($username_email_query_result)>0){
        $validate_password_query= "SELECT password FROM signup where (username='$username' || email='$username')";
        $validate_password_query_result=mysqli_query($conn,$validate_password_query);
        $validate_password_query_result_er= mysqli_fetch_assoc($validate_password_query_result);
        $verify_password_hash=password_verify($password, $validate_password_query_result_er['password']);
        if($verify_password_hash=="1"){
            $_SESSION['login']=true;
            $_SESSION['username']=$username;
            header("location: ./../profile/");
        }else{
            $password_error=$password_array[1];
        }
        }
    }
}
}
?>