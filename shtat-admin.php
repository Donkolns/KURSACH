<?php
session_start();
require_once "../database/connect.php";
require_once "../header.php";
if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess');</script>";
    unset($_SESSION["message"]);
}

$title_job = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `job`"));
// $id_job = $job["0"];
$option = isset($_GET["title_type"]) ? $_GET["title_type"] : false;
$variable = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `job` WHERE `id_job` = '$option'"));
?>

<section class="bg-shtat">

    <h1 class="shtat-h1">Управление штатным расписанием</h1>

    <div class="edit-menu">
        <div>
            <h2 class="edit-menu-text">
                Добавить должность
            </h2>
            <form action="shtat-admin-add-db.php" method="post" class="form-add" enctype="multipart/form-data">
                <input type="text" name="title" id="" placeholder="Название">
                <input type="text" name="salary" id="" placeholder="Зарплата">
                <input type="number" name="staff" id="" placeholder="Штатные ед.">
                <h3>Добавить фото</h3>
                <input type="file" name="photo_job" id="" placeholder="Выберите файл">
                <button type="submit" class="btn btn-success w-25">Добавить</button>
            </form>
        </div>
        <div>
            <h2 class="edit-menu-text">
                Отредактировать должность
            </h2>

            <?php if ($variable) { ?>
                
                <?php foreach ($variable as $title_type) { ?>
                    <form action="" method="GET" id="myForm">
                    <select class="form-select h-25 w-50" name="title_type" id="mySelect">
                    <option class="" value="<?= $title_type['0'] ?> " ><?= $title_type['1'] ?></option>
                    <?php foreach ($title_job as $title_type_2) { ?>
                        <option class="" value="<?= $title_type_2['0'] ?> " ><?= $title_type_2['1'] ?></option>
                    <?php } ?>
                </select>
            </form>
                
                    <form action="shtat-admin-edit-db.php" method="post" class="form-add" enctype="multipart/form-data">
                        <label for="comment" class="h2-appl-model">Выберите должность:</label>
                        <input type="hidden"name="id" value="<?= $title_type["0"] ?>">
                        <input type="text" name="title" id="" value="<?= $title_type["1"] ?>">
                        <input type="text" name="salary" id="" value="<?= $title_type["2"] ?>">
                        <input type="number" name="staff" id="" value="<?= $title_type["3"] ?>">
                        <h3>Сменить фото</h3>
                        <input type="file" name="photo_job" id="" placeholder="Выберите файл">
                        <button type="submit" class="btn btn-success w-25">Изменить</button>

                    </form>
                <?php } ?>
            <?php }else{ ?>
                <form action="" method="GET" id="myForm">
                <select class="form-select h-25 w-50" name="title_type" id="mySelect">
                    <?php foreach ($title_job as $title_type) { ?>
                        <option class="" value="<?= $title_type['0'] ?> " selected><?= $title_type['1'] ?></option>
                    <?php } ?>
                </select>
            </form>
                <?php } ?>




        </div>
        <div>
            <h2 class="edit-menu-text">
                Удаление должности
            </h2>
            <form action="shtat-admin-del-db.php" method="post" class="form-add" enctype="multipart/form-data" onsubmit="return confirm('Вы уверены?')">
                <label for="comment" class="h2-appl-model">Выберите должность:</label>
                <input type="hidden" name="user_id" value="<?= $id_job ?>">
                <select class="form-select h-25 w-50" name="title_type">
                    <?php foreach ($title_job as $title_type) { ?>
                        <option class="" value="<?= $title_type['0'] ?>"><?= $title_type['1'] ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-danger  w-25">Удалить</button>
            </form>
        </div>
    </div>


 


</section>
<script>
    const selectElement = document.getElementById('mySelect');
    const formElement = document.getElementById('myForm');

    selectElement.addEventListener('change', function() {
        formElement.submit();
    });

    
</script>