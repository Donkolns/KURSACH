<?php
session_start();
require_once "../database/connect.php";
$id = isset($_POST["id"]) ? $_POST["id"] : false;
$title = isset($_POST["title"]) ? $_POST["title"] : false;
$salary = isset($_POST["salary"]) ? $_POST["salary"] : false;
$staff = isset( $_POST["staff"]) ? $_POST["staff"] : false;
$photo_job = isset($_FILES["photo_job"]) ? $_FILES["photo_job"] : false;
$query = " SELECT * FROM `job` WHERE `id_job` = '$id' ";
$query_update = "UPDATE job SET ";
$check_update = false;
$check =  mysqli_fetch_assoc(mysqli_query($connect,$query));


if($title != $check["title"]){
    $check_update = true;
    $query_update .= "title = '$title', ";
}
if($salary != $check["salary"]){
    $check_update = true;
    $query_update .= "salary = '$salary', ";
}
if($staff != $check["staff"]){
    $check_update = true;
    $query_update .= "staff = '$staff', ";
}
if($photo_job["error"] == 0){
    $filename = $photo_job["name"]; 
    move_uploaded_file($photo_job['tmp_name'], "../images/".$filename);
    $check_update = true;
    $query_update .= "photo_job = '$filename', ";
}
if ($check_update == true) {
    $query_update = substr($query_update, 0, -2);
    $query_update .= " WHERE `id_job` = '$id'"; 
    $result = mysqli_query($connect, $query_update);
    $_SESSION['message'] = "Данные обновленны!";
    header ("Location: shtat-admin.php");
} else {
    $_SESSION['message'] = "Данные актуальны!";
    header ("Location: shtat-admin.php");

}
?>