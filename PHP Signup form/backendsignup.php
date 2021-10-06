<?php
include "db.php";
$signup_succesfull="";
$email_error_signup=$username_error_signup="";
$name_error=$email_error=$username_error=$password_error=$cpassword_error=$phoneno_error=$gender_error="";
$name=$email=$username=$password=$phoneno=$gender="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       // values get from form
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phoneno=$_POST["phoneno"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        $name_array=["Name is required", "Only letter & White spaces allowed"];
       // name validation 
        if(empty($name)){
        $name_error=$name_array[0];
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $name_error="$name_array[1]";
        }
         /* Email validation
        (1): An error found when User don't fill email section in signup form
        (2): Another error found when user Enter Invalid email address
        */ 
        $email_array=["Email is required", "Invalid Email"];
        if(empty($email)){
            $email_error=$email_array[0];
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error=$email_array[1];
        }
        // Username validation
        // Error found when user put short username(length=6 or bigger), if don't enter username and if user fill username value other than character.
        $username_array=["Username is required", "Username is Short", "Username Contain only letters"];
        if(empty($username)){
            $username_error=$username_array[0];
        }elseif(strlen($username)<6){
            $username_error=$username_array[1];
        }elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
            $username_error=$username_array[2];

        }
        $phoneno_array=["Phone number is required", "Invalid Phone Number"];
        if(empty($phoneno)){
            $phoneno_error=$phoneno_array[0];
        }elseif(strlen($password)>12 && strlen($password)<10){
            $phoneno_error=$phoneno_array[1];
        }elseif(!preg_match('/^[0-9]*$/', $phoneno)){
            $phoneno_error=$phoneno_array[1];
        }
        // password validation
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
        $gender_array=["Gender is required", "Invalid gender"];
        if(empty($_POST["gender"])){
            $gender_error=$gender_array[0];
        }
        if(empty($gender_error)){
        if($_POST["gender"]==="Male" || $_POST["gender"]==="Female" || $_POST["gender"]==="Other"){
            $gender=$_POST["gender"];
        if(empty($cpassword_error) && empty($password_error) && empty($username_error) && empty($email_error) && empty($phoneno_error) && empty($name_error) && empty($gender_error)
        && isset($name) && isset($phoneno) && isset($email) && isset($username) && isset($password) && isset($gender)){
            $validate_mysqli_array=["Email already exist", "Username already Exist"];
                $validate_username_query= "SELECT * FROM signup where (username='$username')";
                $validate_username_mysql_query=mysqli_query($conn,$validate_username_query);
                if(mysqli_num_rows($validate_username_mysql_query)>0){
                $username_error_signup=$validate_mysqli_array[1];
                }
                $validate_email_query= "SELECT * FROM signup where (email='$email')";
                $validate_email_mysql_query=mysqli_query($conn,$validate_email_query);
                if(mysqli_num_rows($validate_email_mysql_query)>0){
                    $email_error_signup=$validate_mysqli_array[0];
                }
            if(empty($username_error_signup) && empty($email_error_signup)){
                $password_encript_signup=password_hash($password, PASSWORD_ARGON2I);
                if($password_encript_signup){
                    $signup_query="INSERT INTO signup (name, username, email, phoneno, password, gender ) ";
                    $signup_query.="VALUES ('$name', '$username', '$email', '$phoneno', '$password_encript_signup', '$gender')";
                    $result_signup=mysqli_query($conn, $signup_query);
                    if($result_signup){
                        $last_id_signup=mysqli_insert_id($conn);
                        if($last_id_signup){
                            $signup_succesfull="Account created sucessfully";
                            if($signup_succesfull){
                                $name=$email=$username=$phoneno=$gender="";
                            }
                        }
                    }
                }
            }    
        }
    }else{
        $gender_error=$gender_array[1];
    }
    }
    }
?>
