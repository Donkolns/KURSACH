<?php
session_start();
require_once "../database/connect.php";
$name = isset($_POST["name"]) ? $_POST["name"] : false;
$patronymic = isset($_POST["patronymic"]) ? $_POST["patronymic"] : false;
$surname = isset($_POST["surname"]) ? $_POST["surname"] : false;
$birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : false;
$job = isset($_POST["job"]) ? $_POST["job"] : false;
$email = isset($_POST["email"]) ? $_POST["email"] : false;
$password = isset($_POST["password"]) ? $_POST["password"] : false;
$id_role = isset($_POST["id_role"]) ? $_POST["id_role"] : false;

$specialty = isset($_POST["specialty"]) ? $_POST["specialty"] : false;
$qualification = isset($_POST["qualification"]) ? $_POST["qualification"] : false;
$city = isset($_POST["city"]) ? $_POST["city"] : false;
$number_diplom = isset($_POST["number_diplom"]) ? $_POST["number_diplom"] : false;
$date_start = isset($_POST["date_start"]) ? $_POST["date_start"] : false;
$date_finish = isset($_POST["date_finish"]) ? $_POST["date_finish"] : false;

$work_number = isset($_POST["work_number"]) ? $_POST["work_number"] : false;
$work_experience = isset($_POST["work_experience"]) ? $_POST["work_experience"] : false;
$work_date = isset($_POST["work_date"]) ? $_POST["work_date"] : false;
$work_place = isset($_POST["work_place"]) ? $_POST["work_place"] : false;

$seria_pass = isset($_POST["seria_pass"]) ? $_POST["seria_pass"] : false;
$number_pass = isset($_POST["number_pass"]) ? $_POST["number_pass"] : false;
$date_pass = isset($_POST["date_pass"]) ? $_POST["date_pass"] : false;
$inn = isset($_POST["inn"]) ? $_POST["inn"] : false;
$snils = isset($_POST["snils"]) ? $_POST["snils"] : false;

$category = isset($_POST["category"]) ? $_POST["category"] : false;
$structure = isset($_POST["structure"]) ? $_POST["structure"] : false;
$category_reserve = isset($_POST["category_reserve"]) ? $_POST["category_reserve"] : false;
$code = isset($_POST["code"]) ? $_POST["code"] : false;
$rank = isset($_POST["rank"]) ? $_POST["rank"] : false;
$military_office = isset($_POST["military_office"]) ? $_POST["military_office"] : false;

$photo = isset($_FILES["photo_job"]) ? $_FILES["photo_job"] : false;

$check = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");

$name_user = $_POST['name_user'];

$users_info = mysqli_fetch_all(
    mysqli_query(
        $connect,
        "SELECT * FROM `users` 
INNER JOIN education on education.id_user = users.id_user
INNER JOIN  work_record on work_record.id_user= users.id_user
INNER JOIN  documents on documents.id_user = users.id_user
INNER JOIN  military on military.id_user= users.id_user;
where users.id_user = '$id_user' "
    )
);

$check = mysqli_query($connect, "SELECT * FROM job WHERE title = '$title'");
$file = $photo_job["name"];
$users = "INSERT INTO `users`( `name`, `patronymic`, `surname`, `birthday`, `job`, `email`, `password`, `id_role`) VALUES ('$name','$patronymic','$surname','$birthday', '$job','$email','$password','$id_role')";
$education = "INSERT INTO `education`( `specialty`, `qualification`, `city`, `number_diplom`, `date_start`, `date_finish`) VALUES ('$specialty','$qualification','$city','$number_diplom', '$date_start','$date_finish')";
$work_record = "INSERT INTO `work_record`( `work_number`, `work_experience`, `work_date`, `work_place`) VALUES ('$work_number','$work_experience','$work_date','$work_place')";
$documents = "INSERT INTO `documents`( `seria_pass`, `number_pass`, `date_pass`, `inn`, `snils`) VALUES ('$seria_pass','$number_pass','$date_pass','$inn','$snils')";
$military = "INSERT INTO `military`( `category`, `structure`, `category_reserve`, `code`, `rank`, `military_office`) VALUES ('$category','$structure','$category_reserve','$code','$rank','$military_office')";



if (mysqli_num_rows($check) == 0) {
    move_uploaded_file($photo_job["tmp_name"], "../images/" . $file);
    $_SESSION["message"] = "Пользователь добавлен!";
    $don = mysqli_query($connect, $query);
    header('Location: shtat-admin.php');
} else {
    $_SESSION["message"] = "Пользователь уже существует!";
    header('Location: shtat-admin.php');
}
