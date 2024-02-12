<?php
include "nav.php";
$username = $_GET["username"];

if(isset($_POST["update_user"])){
    $email = $_POST["email"];
    $role = $_POST["role"];
    $balance = $_POST["balance"];
    if($db->update("user","email='$email',role='$role',balance='$balance'","username='$username'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=user'</script>";
    }
}
if(isset($_POST["del_user"])){
    if($db->del("user","username='$username'")){
        echo "<script type='text/javascript'>document.location='admin_dashboard.php?mod=user'</script>";
    }
}
?>