<?php
session_start();
require_once "../database/connect.php";
require_once "../header.php";
if (isset($_SESSION["message"])) {
    $mess = $_SESSION["message"];
    echo "<script>alert('$mess');</script>";
    unset($_SESSION["message"]);
}
$option = isset($_GET["title_type"]) ? $_GET["title_type"] : false;

$result = $appl_info = mysqli_fetch_all(
    mysqli_query(
        $connect,
        "SELECT * FROM `application` 
INNER JOIN users on users.id_user = application.id_user
INNER JOIN  status on status.id_status = application.status_application 
INNER JOIN  type_application on type_application.id_type= application.type_application where 
`application`.`status_application` = '$option'"
    )
);
$check = mysqli_fetch_all(
    mysqli_query(
        $connect,
        "SELECT * FROM `status` WHERE`id_status` = '$option'"
    )
);

$title_job = mysqli_fetch_all(
    mysqli_query(
        $connect,
        "SELECT * FROM `status` "
    )
);
?>

<section class="bg-shtat">

    <h1 class="shtat-h1">Просмотр заявок</h1>
    <!-- <div class="edit-menu">
        <div>
            <a href="" class="edit-menu-text">
                На рассмотрении
            </a>
        </div>
        <div>
            <a class="edit-menu-text">
                Принятые
            </a>
        </div>
        <div>
            <a class="edit-menu-text">
                Отклоненные
            </a>
        </div> 
    </div>-->
    <form action="" method="GET" id="myForm" class="form-filter">
        <select class="form-select h-25 w-50" name="title_type" id="mySelect">
            <option class=""><?php if (!isset($option)) { ?>
                    <?php $check_1 ?>
                <?php } else { ?>
                    Выберите Фильтрацию
                <?php } ?>
            </option>
            <?php foreach ($title_job as $title_type) { ?>
                <option class="" value="<?= $title_type['0'] ?>"><?= $check_1 = $title_type['1'] ?></option>
            <?php } ?>
        </select>
    </form>
    <div class="cards-admin card_decor">
        <?php foreach ($result as $value) { ?>
            <div class="card " style="width: 18rem;">
                <div class="card-header">
                    Заявка №<?= $value["0"] ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Фамилия: <?= $value["9"] ?></li>
                    <li class="list-group-item">Имя: <?= $value["7"] ?></li>
                    <li class="list-group-item">Почта: <?= $value["6"] ?></li>
                    <li class="list-group-item">Комментарий: <?= $value["2"] ?></li>
                    <li class="list-group-item">Тип заявки: <?= $value["20"] ?></li>
                    <li class="list-group-item">Статус: <?= $value["18"] ?></li>
                </ul>
                <?php if ($value['4'] == 1 or $value['4'] == 3) { ?>

                <?php } else { ?>
                    <a href="application-admin-db-success.php?id_appl=<?= $value["0"] ?>"><button type="button"
                            class="btn btn-success">Принять</button></a>
                    <a href="application-admin-db-danger.php?id_appl=<?= $value["0"] ?>"><button type="button"
                            class="btn btn-danger">Отклонить</button></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    const selectElement = document.getElementById('mySelect');
    const formElement = document.getElementById('myForm');

    selectElement.addEventListener('change', function () {
        formElement.submit();
    });
</script>