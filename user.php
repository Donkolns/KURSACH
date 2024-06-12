<?php session_start();
require_once "database/connect.php";

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
require_once "header.php";


$id_appl = isset($_GET["id_appl"]) ? $_GET["id_appl"] : 1;
$query = "SELECT * from `application`       ";
$check = mysqli_query($connect, $query);
$appll = mysqli_fetch_all(mysqli_query($connect, $query));
$page =  isset($_GET["page"]) ? $_GET["page"] : 1;
$paginate_count = 1;

$offset = $page * $paginate_count - $paginate_count;
$query = "SELECT * FROM `application` 
INNER JOIN users on users.id_user = application.id_user
INNER JOIN  status on status.id_status = application.status_application 
INNER JOIN  type_application on type_application.id_type= application.type_application
where application.id_user = '$id_user' ";
$result_2 = " LIMIT $paginate_count OFFSET $offset ";
$result_1 = mysqli_fetch_all(mysqli_query($connect, $query . $result_2));
$id_appl = $appll["0"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <title>Страница пользователя</title>
</head>

<body>

</body>

</html>
<section class="bg-user-cab">
    <div class="lichn">
        <h1>Личный кабинет</h1>
        <?php while ($info = mysqli_fetch_array($result)) { ?>
            <div class="persacc">
                <div>
                    <img src="images/<?= $info['photo']; ?>" alt="" class="photo_profile">
                    <p class="p-user">Сменить аватарку</p>
                    <form action="database/edit_foto_db.php" method="POST" enctype="multipart/form-data" class="form_photo">
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

    <div class="appl-user">
        <h1 id="appl_block">Заявки</h1>
        <div class="appl">
            <div class="appl_form_one">
                <h2 class="h2_appl">Поле для <br> заполнения заявки</h2>

                <form action="../database/application-db.php" method="POST" class="form_appl">
                    <div class="pirch">
                        <label for="comment" class="h2-model">Причина:</label>
                        <input type="hidden" name="user_id" value="<?= $id_user ?>">
                        <select class="form-select h-25 w-50" name="appl_type">

                            <?php foreach ($type_application as $appl_type) { ?>
                                <option class="" value="<?= $appl_type['0'] ?>"><?= $appl_type['1'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="form__item">
                            <label for="comment" class="h2-model">Комментарий:</label>
                            <textarea type="text" class="input-model" name="comment" required></textarea>
                        </div>
                    </div>


                    <input type="submit" value="Отправить" class="send_appl">
                </form>

            </div>

            <div class="appl_form_two">
                <p><a name="top"></a></p>
                <h2 class="h2_appl">Отправленные заявки</h2>
                <div class="persacc-inf">
                    <div class="appl-info-div">
                        <?php foreach ($result_1 as $info) { ?>
                            <p class="appl-info">Имя: <span class="appl-name-info"><?= $info['7']; ?></span></p>
                            <p class="appl-info">Фамилия: <span class="appl-name-info"><?= $info['9']; ?></span></p>
                            <p class="appl-info">Причина: <span class="appl-name-info"><?= $info['20']; ?></span></p>
                            <p class="appl-info">Комментарий: <span class="appl-name-info"><?= $info['2']; ?></span></p>
                            <p class="appl-info">Статус: <span class="appl-name-info"><?= $info['18']; ?></span></p>
                        <?php } ?>
                    </div>

                </div>

                <nav class="appl-nav" aria-label="Page navigation example" class="nav-pag">
                    <ul class="pagination">


                        <?php
                        if (mysqli_num_rows($check) == 0) { ?>
                            <p>Нет заявок</p>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= ceil(mysqli_num_rows($check) / $paginate_count); $i++) { ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>#top">
                                        <?= $i ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>
</body>

</html>