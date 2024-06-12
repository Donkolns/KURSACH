<?php
session_start();
require_once "../database/connect.php";
require_once "../header.php";
if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess');</script>";
    unset($_SESSION["message"]);
}

$name = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `users`"));
$option = isset($_GET["email"]) ? $_GET["email"] : false;
$variable = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `users` WHERE `id_user` = '$option'"));
?>

<section class="bg-user">

    <h1 class="shtat-h1">Управление пользователями</h1>

    <div class="edit-menu">
        <div>
            <h2 class="edit-menu-text">
                Добавить пользователя
            </h2>
            <form action="user-admin-add-db.php" method="post" class="form-add" enctype="multipart/form-data">
                <h3>Личная информация</h3>
                <input type="text" name="name" id="" placeholder="Имя" required>
                <input type="text" name="patronymic" id="" placeholder="Отчество" required>
                <input type="text" name="surname" id="" placeholder="Фамилия" required>
                <input type="date" name="birthday" id="" placeholder="дд.мм.ггг" required>
                <input type="text" name="job" id="" placeholder="Должность" required>
                <input type="email" name="email" id="" placeholder="Почта" required>
                <input type="text" name="password" id="" placeholder="Пароль" required>
                <input type="number" name="id_role" id="" placeholder="Роль" required>
                <h3>Образование</h3>
                <input type="text" name="specialty" id="" placeholder="Специальность" required>
                <input type="text" name="qualification" id="" placeholder="Квалификация" required>
                <input type="text" name="city" id="" placeholder="Город" required>
                <input type="number" name="number_diplom" id="" placeholder="Номер диплома" required>
                <input type="date" name="date_start" id="" placeholder="Дата начала обучения" required>
                <input type="date" name="date_finish" id="" placeholder="Дата выдачи диплома" required>
                <h3>Трудовая книжка</h3>
                <input type="number" name="work_number" id="" placeholder="Номер" required>
                <input type="text" name="work_experience" id="" placeholder="Трудовой стаж" required>
                <input type="date" name="work_date" id="" placeholder="Дата трудоустройства" required>
                <input type="text" name="work_place" id="" placeholder="Место работы" required>
                <h3>Документы</h3>
                <input type="number" name="seria_pass" id="" placeholder="Серия паспорта" required>
                <input type="number" name="number_pass" id="" placeholder="Номер паспорта" required>
                <input type="date" name="date_pass" id="" placeholder="Дата выдачи" required>
                <input type="number" name="inn" id="" placeholder="ИНН" minlength="10" maxlength="10" required>
                <input type="number" name="snils" id="" placeholder="СНИЛС" minlength="11" maxlength="11" required>
                <h3>Воинский учет</h3>
                <input type="text" name="category" id="" placeholder="Категория" required>
                <input type="text" name="structure" id="" placeholder="Состав" required>
                <input type="number" name="category_reserve" id="" placeholder="Категория запаса" required>
                <input type="text" name="code" id="" placeholder="Код ВУС" required>
                <input type="text" name="rank" id="" placeholder="Звание" required>
                <input type="text" name="military_office" id="" placeholder="Адрес воен.ком." required>

                <h3>Добавить фото</h3>
                <input type="file" name="photo_job" id="" placeholder="Выберите файл" required>
                <button type="submit" class="btn btn-success w-25">Добавить</button>
            </form>
        </div>
        <div>
            <h2 class="edit-menu-text">
                Редактировать пользователя
            </h2>

            <?php if ($variable) { ?>

                <?php foreach ($variable as $title_type) { ?>
                    <form action="" method="GET" id="myForm">
                        <select class="form-select h-25 w-50" name="title_type" id="mySelect">
                            <option class="" value="<?= $title_type['0'] ?> "><?= $title_type['1'] ?></option>
                            <?php foreach ($title_job as $title_type_2) { ?>
                                <option class="" value="<?= $title_type_2['0'] ?> "><?= $title_type_2['1'] ?></option>
                            <?php } ?>
                        </select>
                    </form>

                    <form action="user-admin-edit-db.php" method="post" class="form-add" enctype="multipart/form-data">
                        <label for="comment" class="h2-appl-model">Выберите пользователя:</label>
                        <input type="hidden" name="id" value="<?= $title_type["0"] ?>">
                        <h3>Личная информация</h3>
                        <input type="text" name="name" id="" value="<?= $title_type["1"] ?>">
                        <input type="text" name="patronymic" id="" value="<?= $title_type["2"] ?>">
                        <input type="text" name="surname" id="" value="<?= $title_type["3"] ?>">
                        <input type="date" name="birthday" id="" value="<?= $title_type["1"] ?>">
                        <input type="text" name="job" id="" value="<?= $title_type["2"] ?>">
                        <input type="email" name="email" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="password" id="" value="<?= $title_type["1"] ?>">
                        <input type="number" name="id_role" id="" value="<?= $title_type["2"] ?>">
                        <h3>Образование</h3>
                        <input type="text" name="specialty" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="qualification" id="" value="<?= $title_type["1"] ?>">
                        <input type="text" name="city" id="" value="<?= $title_type["2"] ?>">
                        <input type="number" name="number_diplom" id="" value="<?= $title_type["3"] ?>">
                        <input type="date" name="date_start" id="" value="<?= $title_type["1"] ?>">
                        <input type="date" name="date_finish" id="" value="<?= $title_type["2"] ?>">
                        <h3>Трудовая книжка</h3>
                        <input type="number" name="work_number" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="work_experience" id="" value="<?= $title_type["1"] ?>">
                        <input type="date" name="work_date" id="" value="<?= $title_type["2"] ?>">
                        <input type="text" name="work_place" id="" value="<?= $title_type["3"] ?>">
                        <h3>Документы</h3>
                        <input type="number" name="seria_pass" id="" value="<?= $title_type["1"] ?>">
                        <input type="number" name="number_pass" id="" value="<?= $title_type["2"] ?>">
                        <input type="date" name="date_pass" id="" value="<?= $title_type["3"] ?>">
                        <input type="number" name="inn" id="" value="<?= $title_type["1"] ?>">
                        <input type="number" name="snils" id="" value="<?= $title_type["2"] ?>">
                        <h3>Воинский учет</h3>

                        <input type="text" name="category" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="structure" id="" value="<?= $title_type["3"] ?>">
                        <input type="number" name="category_reserve" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="code" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="rank" id="" value="<?= $title_type["3"] ?>">
                        <input type="text" name="military_office" id="" value="<?= $title_type["3"] ?>">


                        <h3>Сменить фото</h3>
                        <input type="file" name="photo_job" id="" placeholder="Выберите файл">
                        <button type="submit" class="btn btn-success w-25">Изменить</button>

                    </form>
                <?php } ?>
            <?php } else { ?>
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
                Удаление пользователя
            </h2>
            <form action="user-admin-del-db.php" method="post" class="form-add" enctype="multipart/form-data" onsubmit="return confirm('Вы уверены?')">
                <label for="comment" class="h2-appl-model">Выберите пользователя:</label>
                <input type="hidden" name="user_id" value="<?= $id_user ?>">
                <select class="form-select h-25 w-50" name="title_type">
                    <?php foreach ($name as $name_user) { ?>
                        <option class="" value="<?= $name_user['0'] ?>"><?= $name_user['2'] ?> <?= $name_user['4'] ?></option>
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