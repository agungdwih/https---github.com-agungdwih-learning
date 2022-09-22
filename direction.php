<?php
session_start();

if (isset($_SESSION['username'])){
    $role=$_SESSION['role'];
    
    if($role=='user'){
        header('location:user.php');
    }
    else{
        header('location:admin_home.php');
    }
}
else{
    header("location:login.php");
}
?>