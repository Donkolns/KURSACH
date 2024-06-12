<?php
session_start();
require_once "connect.php";

if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess');</script>";
    unset($_SESSION["message"]);
}

$email = isset($_POST["email"]) ? $_POST["email"] : false;
$password = isset($_POST["password"]) ? $_POST["password"] : false;

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_fetch_assoc(mysqli_query($connect, $sql));

if (!empty($result)) {
    if ($email and $password) {
        if ($email == $result["email"]) {
            if ($password == $result["password"]) {
                $_SESSION["role"] = $result["id_role"];
                $_SESSION["auth"] = true;
                $_SESSION["user_id"] = $result['id_user'];
                $_SESSION["name"] = $result['name'];
                $_SESSION["message"] = "Добро пожаловать!";
                if ($_SESSION["role"] == "2") {
                    header("Location: ../user.php");
                } else {
                    header("Location: ../admin/");
                }
            } else {
                $_SESSION["message"] = "Неверный пароль!";
                header("Location: ../");
            }
        } else {
            $_SESSION["message"] = "Неверный логин!";
            header("Location: ../");
        }
    } else {
        $_SESSION["message"] = "Заполните все поля!";
        header("Location: ../");
    }
} else {
    $_SESSION["message"] = "Данный пользователь не существует!";
    header("Location: ../");
}
