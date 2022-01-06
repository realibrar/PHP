<?php
include "./../db/db.php";
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login_first']="1";
    header("location: ./../");
}
$newpassword=$cnewpassword=$oldpassword="";
$old_password_error=$new_password_error=$cpassword_error="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $newpassword=$_POST['newpassword'];
 $cnewpassword=$_POST['cnewpassword'];
 $oldpassword=$_POST['oldpassword'];
 if(empty($oldpassword)){
     $old_password_error="Please Input old password";
 }
 if(empty($newpassword)){
    $new_password_error="Please Input new password";
 }
 if(empty($cnewpassword)){
    $cpassword_error="Please Input confirm password";
 }
 if(empty($old_password_error) && empty($new_password_error) && empty($cpassword_error) && 
 isset($newpassword) && isset($cnewpassword) && isset($oldpassword)){
    if($newpassword != $cnewpassword){
        $cpassword_error="New & Confirm password is mismatched";
    }
    if($newpassword == $cnewpassword){
            $username=$_SESSION['username'];
            $confirm_old_password="SELECT password FROM signup WHERE username='$username'";
            $confirm_old_password_query=mysqli_query($conn, $confirm_old_password);
            $confirm_old_password_fetch=mysqli_fetch_assoc($confirm_old_password_query);
            $old_password_verify=password_verify($oldpassword, $confirm_old_password_fetch['password']);
            if($old_password_verify=="0"){
                $old_password_error="Worng old password";
            }elseif($newpassword==$oldpassword){
                $old_password_error="New & old password are same";
            }else{
                $new_password_hash=password_hash($newpassword, PASSWORD_ARGON2I);
                $change_password_query="UPDATE signup SET password='$new_password_hash' where username='$username'";
                $change_password_query_result=mysqli_query($conn, $change_password_query);
                if($change_password_query_result){
                $_SESSION['update_password']=true;
                header("location: ./../profile/");
            }
            }
    }
 }
}
?>