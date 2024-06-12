<?php session_start();
require_once "database/connect.php";
$id_user = $_SESSION["user_id"];
$result = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `job`"));
require_once "header.php";
$query = "SELECT * FROM `job`";
$check = mysqli_query($connect, $query);

$id_appl = isset($_GET["id_appl"]) ? $_GET["id_appl"] : 1;
$query = "SELECT * FROM `job`";
$check = mysqli_query($connect, $query);
$appll = mysqli_fetch_all(mysqli_query($connect, $query));
$page =  isset($_GET["page"]) ? $_GET["page"] : 1;
$paginate_count = 2;

$offset = $page * $paginate_count - $paginate_count;
$query = "SELECT * FROM `job`";
$result_2 = " LIMIT $paginate_count OFFSET $offset ";
$result_1 = mysqli_fetch_all(mysqli_query($connect, $query . $result_2));
$id_appl = $appll["0"];

$cat = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `job`"));

$salary = isset($_GET["salary"]) ? $_GET["salary"] : 0;

if($salary) {
    $query = "SELECT * FROM `job` ORDER BY `salary` $salary";
}
$result = mysqli_fetch_all(mysqli_query($connect, $query));
?>
<section class="bg-2">
    <h1 class="h1-info">Штатное расписание</h1>
    <div class="div_select">
        <p>Выбор должности</p>
        <form action="" method="GET">
            <select name="salary" id="">
                    <option value="0">Все</option>
                    <option value="ASC"><a href="shtat.php?salary=ASC">По возрастанию</a></option>
                    <option value="DESC"><a href="shtat.php?salary=DESC">По убыванию</a></option>
            </select>
            <input type="submit" value="Отфильтровать">
        </form>
    </div>
    <?php
    if (mysqli_num_rows($check) == 0) { ?>
        <p>Штатные должности отсутствуют</p>
    <?php } else { ?>
        <div class="cards">
            <?php foreach ($result_1  as $info) { ?>

                <div class="cards-shtat">
                    <div>
                        <img src="images/<?= $info["4"]; ?>" alt="" class="photo_shtat">
                    </div>
                    <div class="persacc-inf">
                        <div>
                            <p class="shtat-name"><b>Должность:</b></p>
                            <p class="shtat-name"><b>Зарплата:</b></p>
                            <p class="shtat-name"><b>Штатные единицы:</b></p>
                        </div>
                        <div>
                            <p class="shtat-name"><?= $info['1']; ?></p>
                            <p class="shtat-name"><?= $info['2']; ?> руб.</p>
                            <p class="shtat-name"><?= $info['3']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        </div>

        <nav class="appl-nav" aria-label="Page navigation example" class="nav-pag">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= ceil(mysqli_num_rows($check) / $paginate_count); $i++) { ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i ?>">
                            <?= $i ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
</section>
</body>

</html>