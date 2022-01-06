<?php
include "./../db/db.php";
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login_first']="1";
    header("location: ./../");
}
?>