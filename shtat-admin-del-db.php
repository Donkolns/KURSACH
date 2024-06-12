<?php 
session_start();
require_once "../database/connect.php";
$id_job = isset($_POST['title_type']) ? $_POST['title_type'] : false;
$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `job` = '$id_job'");
// var_dump("SELECT * FROM `users` WHERE `job` = '$id_job'");
if(mysqli_num_rows($query) == 0) {
    $del = mysqli_query($connect, "DELETE FROM `job` WHERE `id_job` = '$id_job'");
    $_SESSION["message"] = "Должность удалена!";
    header ('Location: shtat-admin.php');
} else {
    $_SESSION["message"] = "В данной должности есть пользователи!";
    header ('Location: shtat-admin.php');
}
?>