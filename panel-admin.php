<?php session_start();
require_once "../database/connect.php";
require_once "../header.php";
?>

<section class="bg-admin">

    <h1 class="admin-h1">Админ-панель</h1>
    <div class="btns-admin">
        <div class="btns-admin-b1">
            <a href="shtat-admin.php"><button class="admin-btn1">Штатное расписание</button></a>
            <a href="application-admin.php"><button class="admin-btn1">Просмотр заявок</button></a>
        </div>
        <div class="btns-admin-b1">
            <a href="user-admin.php"><button class="admin-btn1">Редактировать информацию о рабочих</button></a>
        </div>
    </div>

</section>