<?php
include "db.php";
$signup_succesfull="";
$email_error_signup=$username_error_signup="";
$fname_error=$lname_error=$email_error=$username_error=$password_error=$cpassword_error="";
$fname=$lname=$email=$username=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $fname_array=["First Name is required Field", "Only letter & White spaces allowed"];
    if(empty($fname)){
        $fname_error=$fname_array[0];
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
            $fname_error="$fname_array[1]";
        }
    $lname_array=["Last Name is required Field", "Only letter & White spaces allowed"];
    if(empty($lname)){
        $lname_error=$lname_array[0];
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
            $lname_error="$lname_array[1]";
        }
        $email_array=["Email is required.", "Invalid Email", "Email already exist"];
        if(empty($email)){
            $email_error=$email_array[0];
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error=$email_array[1];
        }
        $username_array=["Username is required", "Username is Short", "Username Contain only letters", "Username already exist"];
        if(empty($username)){
            $username_error=$username_array[0];
        }elseif(strlen($username)<6){
            $username_error=$username_array[1];
        }elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
            $username_error=$username_array[2];

        }
        $password_array=["Password is required", "Password is Short"];
        if(empty($password)){
            $password_error=$password_array[0];
        }elseif(strlen($password)<6){
            $password_error=$password_array[1];

        }
        $cpassword_array=["Password doesnot match"];
        if($password===$cpassword){
        }else{
            $cpassword_error=$cpassword_array[0];
        }
        if(empty($cpassword_error && $password_error && $username_error && $email_error && $lname_error && $fname_error) && isset($fname) && isset($lname) && isset($email) && isset($username) && isset($password)){
                $validate_mysqli_array=["Email already exist", "Username already Exist"];
                $validate_email_query= "SELECT * from signup where (email='$email')";
                $validate_email_mysql_query=mysqli_query($conn,$validate_email_query);
                if(mysqli_num_rows($validate_email_mysql_query)>0){
                    $email_error_signup=$validate_mysqli_array[0];
                }
                $validate_username_query= "SELECT * from signup where (username='$username')";
                $validate_username_mysql_query=mysqli_query($conn,$validate_username_query);
                if(mysqli_num_rows($validate_username_mysql_query)>0){
                    $username_error_signup=$validate_mysqli_array[1];
                }
                if(empty($username_error_signup && $email_error_signup)){
                    $password_encript_signup=password_hash($password, PASSWORD_ARGON2I);
                    if($password_encript_signup){
                    $signup_query="INSERT INTO signup (fname, lname, email, username, password ) ";
                    $signup_query.="VALUES ('$fname', '$lname', '$email', '$username', '$password_encript_signup')";
                    $result_signup=mysqli_query($conn, $signup_query);
                    if($result_signup){
                        $last_id_signup=mysqli_insert_id($conn);
                        if($last_id_signup){
                            $signup_succesfull="Account created sucessfully";
                            if($signup_succesfull){
                                $fname=$lname=$email=$username="";
                            }
                        }
                    }
                    }
                }   
        }
}

?>