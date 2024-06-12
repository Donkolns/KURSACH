<?php
session_start();
require_once "../database/connect.php";
$success = $_GET['id_appl'];
$result = mysqli_query($connect, "UPDATE `application` SET `status_application`= 1 WHERE id_application = '$success'");
$_SESSION["message"] = "Завяка принята!";
header ('Location: application-admin.php');
?>