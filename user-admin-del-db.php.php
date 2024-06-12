<?php 
session_start();
require_once "../database/connect.php";
$id_users = isset($_POST['title_type']) ? $_POST['title_type'] : false;
$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `job` = '$id_job'");
// var_dump("SELECT * FROM `users` WHERE `job` = '$id_job'");
if(mysqli_num_rows($query) == 0) {
    $del = mysqli_query($connect, "DELETE FROM `users` WHERE `id_users` = '$id_users'");
    $_SESSION["message"] = "Полтзователь удален!";
    header ('Location: user-admin.php');
}
?>