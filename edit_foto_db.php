<?php
session_start();
require_once "connect.php";
$id = isset($_POST["id"]) ? $_POST["id"] : false;
$photo = isset($_FILES["photo"]) ? $_FILES["photo"] : false;
$check =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE `id_user` = '$id'"));
if($photo["error"] == 0){
    $filename = $photo["name"]; 
    move_uploaded_file($photo['tmp_name'], "../images/".$filename);
    $query_update = "UPDATE users SET  photo = '$filename' WHERE `id_user` = '$id'";
    mysqli_query($connect,$query_update);
    $_SESSION['message'] = "Данные обновленны!";
    if($check["id_role"] == 1){
        header("Location: /admin");
    }else{
        header("Location: ../user.php");

    }
    
}else{
    $_SESSION['message'] = "Данные актуальны!";
    if($check["id_role"] == 1){
        header("Location: /admin");
    }else{
        header("Location: ../user.php");

    }
}

