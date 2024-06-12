<?php
session_start();
require_once "connect.php";
$id_user = $_POST['user_id'];
$appl_type = $_POST['appl_type'];
$comment = $_POST['comment'];
$result = mysqli_query($connect, "INSERT INTO `application`( `id_user`, `title`, `type_application`) VALUES ($id_user,'$comment','$appl_type')");
$_SESSION["message"] = "Заявка отправлена!";
 header("Location: ../user.php");
?>