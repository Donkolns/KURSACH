<?php
session_start();

$role = empty($_SESSION["role"]) ? "false" : $_SESSION["role"];
$name = empty($_SESSION["name"]) ? "false" : $_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.7.1.js"></script>
    <link rel="icon" href="images/icon.png">
    <title>6Frames</title>
</head>

<body>
    <nav class="nav">
        <?php if ($role == 2) { ?>
            <img src="images/logo1 1.png" alt="">
            <a class="header-text" href="../shtat.php">Штатное Расписание</a>
            <a class="header-text" href="../user.php#appl_block">Заявки</a>
            <div class="user">
                <img src="images/User.png" alt="">
                <a class="header-text" href="../user.php"><?= $name; ?></a>
            </div>
            <a href="signout.php" class="signout">Выйти</a>
        <?php } ?>

        <?php if ($role == 1) { ?>
            <img src="../images/logo1 1.png" alt="">
            <a class="header-text" href="../../shtat.php">Штатное Расписание</a>
            <a class="header-text" href="../admin/panel-admin.php">Админ панель</a>
            <div class="user">
                <img src="../images/User.png" alt="">
                <a class="header-text" href="../admin/index.php"><?= $name; ?></a>
            </div>
            <a href="../signout.php" class="signout">Выйти</a>
        <?php } ?>
    </nav>