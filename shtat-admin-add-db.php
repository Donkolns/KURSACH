<?php
session_start();
require_once "../database/connect.php";
$title = isset($_POST["title"]) ? $_POST["title"] : false;
$salary = isset($_POST["salary"]) ? $_POST["salary"] : false;
$staff = isset( $_POST["staff"]) ? $_POST["staff"] : false;
$photo_job = isset($_FILES["photo_job"]) ? $_FILES["photo_job"] : false;

$check = mysqli_query($connect, "SELECT * FROM job WHERE title = '$title'");
$file = $photo_job["name"];
$query = "INSERT INTO `job`( `title`, `salary`, `staff`, `photo_job`) VALUES ('$title','$salary','$staff','$file')";
if (mysqli_num_rows($check) == 0) {
    move_uploaded_file($photo_job["tmp_name"], "../images/" . $file);
 $_SESSION["message"] = "Штатная должность добавлена!";
 $don = mysqli_query($connect, $query);
 header ('Location: shtat-admin.php');
} else {
    $_SESSION["message"] = "Штатная должность уже существует!";
    header ('Location: shtat-admin.php');
}