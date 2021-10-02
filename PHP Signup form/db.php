<?php
$db_host="localhost";
$db_username="root";
$db_name="form";
$conn=mysqli_connect($db_host, $db_username, '', $db_name);
if(!$conn){
    die("Connection field" .mysqli_connect_error());
}




?>