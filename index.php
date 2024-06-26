<?php session_start();
require_once "../database/connect.php";

if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess');</script>";
    unset($_SESSION["message"]);
}
$id_user = $_SESSION["user_id"];
$result = mysqli_query($connect, "SELECT * FROM `users` INNER JOIN job ON job.id_job = users.job
WHERE users.id_user = '$id_user'");
$education = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `education` where id_user = '$id_user' "));
$work_record = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `work_record` where id_user = '$id_user' "));
$documents = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `documents` where id_user = '$id_user' "));
$military = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `military` where id_user = '$id_user' "));
$type_application = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `type_application`"));

$appl_info = mysqli_fetch_all(
    mysqli_query(
        $connect,
        "SELECT * FROM `application` 
INNER JOIN users on users.id_user = application.id_user
INNER JOIN  status on status.id_status = application.status_application 
INNER JOIN  type_application on type_application.id_type= application.type_application
where application.id_user = '$id_user' "
    )
);
require_once "../header.php";
?>
<section class="bg1">
    <div class="lichn">
        <h1>Личный кабинет</h1>
        <?php while ($info = mysqli_fetch_array($result)) { ?>
            <div class="persacc">
                <div>
                    <img src="../images/<?= $info['photo']; ?>" alt="" class="photo_profile">
                    <p class="p-user">Сменить аватарку</p>
                    <form action="../database/edit_foto_db.php" method="POST" enctype="multipart/form-data" class="form_photo">
                        <input type="hidden" name="id" value="<?= $id_user ?>">
                        <input type="file" name="photo" class="input_photo">
                        <input type="submit" value="Сменить" class="submit_photo">
                    </form>
                </div>
                <div class="persacc-inf">
                    <div>
                        <p class="name-info"><b>Имя:</b></p>
                        <p class="name-info"><b>Фамилия:</b></p>
                        <p class="name-info"><b>Отчество:</b></p>
                        <p class="name-info"><b>Дата рождения:</b></p>
                        <p class="name-info"><b>Почта:</b></p>
                        <p class="name-info"><b>Должность:</b></p>
                    </div>
                    <div>
                        <p class="name-info"><?= $info['name']; ?></p>
                        <p class="name-info"> <?= $info['surname']; ?></p>
                        <p class="name-info"><?= $info['patronymic']; ?></p>
                        <p class="name-info"><?= $info['birthday']; ?></p>
                        <p class="name-info"><?= $info['email']; ?></p>
                        <p class="name-info"><?= $info['title']; ?></p>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>

    <div class="user-info">
        <h1>Личная информация</h1>
        <div class="flex">
            <div class="info-user">
                <h2 class="h2-user">Образование</h2>
                <p class="p-user"><b>Специальность</b><br>
                    <?= $education['specialty'] ?>
                </p>
                <p class="p-user"><b>Квалификация</b><br>
                    <?= $education['qualification'] ?>
                </p>
                <p class="p-user"><b>Город</b><br>
                    <?= $education['city'] ?>
                </p>
                <p class="p-user"><b>Номер диплома</b><br>
                    <?= $education['number_diplom'] ?>
                </p>
                <p class="p-user"><b>Дата начала обучения</b><br>
                    <?= $education['date_start'] ?>
                </p>
                <p class="p-user"><b>Дата конца обучения</b><br>
                    <?= $education['date_finish'] ?>
                </p>
            </div>
            <div class="info-user">
                <h2 class="h2-user">Трудовая книжка</h2>
                <p class="p-user"><b>Номер</b><br>
                    <?= $work_record['work_number'] ?>
                </p>
                <p class="p-user"><b>Трудовой стаж</b><br>
                    <?= $work_record['work_experience'] ?>
                </p>
                <p class="p-user"><b>Дата трудоустройства</b><br>
                    <?= $work_record['work_date'] ?>
                </p>
                <p class="p-user"><b>Место работы</b><br>
                    <?= $work_record['work_place'] ?>
                </p>
            </div>
            <div class="info-user">
                <h2 class="h2-user">Документы</h2>
                <p class="p-user"><b>Серия паспорта</b><br>
                    <?= $documents['seria_pass'] ?>
                </p>
                <p class="p-user"><b>Номер паспорта</b><br>
                    <?= $documents['number_pass'] ?>
                </p>
                <p class="p-user"><b>Дата выдачи</b><br>
                    <?= $documents['date_pass'] ?>
                </p>
                <p class="p-user"><b>ИНН</b><br>
                    <?= $documents['inn'] ?>
                </p>
                <p class="p-user"><b>СНИЛС</b><br>
                    <?= $documents['snils'] ?>
                </p>
            </div>
            <div class="info-user">
                <h2 class="h2-user">Военная инф.</h2>
                <p class="p-user"><b>Категория</b><br>
                    <?= $military['category'] ?>
                </p>
                <p class="p-user"><b>Состав</b><br>
                    <?= $military['structure'] ?>
                </p>
                <p class="p-user"><b>Категория запаса</b><br>
                    <?= $military['category_reserve'] ?>
                </p>
                <p class="p-user"><b>Код ВУС</b><br>
                    <?= $military['code'] ?>
                </p>
                <p class="p-user"><b>Звание</b><br>
                    <?= $military['rank'] ?>
                </p>
                <p class="p-user"><b>Воен.ком</b><br>
                    <?= $military['military_office'] ?>
                </p>
            </div>
        </div>
    </div>
</section>
</body>

</html>