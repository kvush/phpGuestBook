<?php
/**
 * свойства для пагинации
 * @param Mysqli $mysqli ссылка на объект соединения с БД
 * @param $rows_per_page int кол-во сообщений на странице
 * @return array свойств
 */
function get_pagination(Mysqli $mysqli, $rows_per_page) {
    //TODO: почему то зависает сервер при SELECT COUNT(id) и последующем fetch_row
    $total_rows = $mysqli->query("SELECT `id` FROM `messages` WHERE `status` = 1")->num_rows; //общие кол-во сообщений

    $last_page = ceil($total_rows/$rows_per_page); //общее кол-во страниц
    $last_page = $last_page < 1 ? 1 : $last_page;

    $page = isset($_GET["page"]) ? $_GET["page"] : 1 ; //текущяя старница
    $start_page = ($page-1) * $rows_per_page; // страница с которой начнется запрос к БД

    return ["total_messages" => $total_rows, "start_pages" => $start_page, "page" => $page, "last_page" => $last_page];
}

/**
 * Рисует ссылки переходы по старницам и укзатель на текущую старницу.
 * @param $pagination array
 */
function render_pagination_control($pagination) {
    echo '<div class="col-12">';
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';
    $disabled_pr = "";
    if ($pagination['page'] == 1) {
        $disabled_pr = "disabled";
    }
    echo '<li class="page-item '.$disabled_pr.'"><a class="page-link" href="/?page='.($pagination['page']-1).'"> < </a></li>';
    for ($p = 1; $p <= $pagination['last_page']; $p++) {
        $active = "";
        if ($pagination['page'] == $p) {
            $active = "active";
        }
        echo '<li class="page-item '.$active.'"><a class="page-link" href="/?page='.$p.'">'.$p.'</a></li>';
    }
    $disabled_nx = "";
    if ($pagination['page'] == $pagination['last_page']) {
        $disabled_nx = "disabled";
    }
    echo '<li class="page-item '.$disabled_nx.'"><a class="page-link" href="/?page='.($pagination['page']+1).'"> > </a></li>';

    echo '<ul>';
    echo '</nav>';
    echo '</div>';
}

/**
 * Делаем основной запрос к БД
 */
function get_messages() {
    $mysqli = new mysqli(HOST, USER, PASS, DATABASE);
    if ($mysqli->connect_errno) {
        return ["title" => "Ошибка", "message" => "Не удалось подключится к базе"];
    }
    $pagination = get_pagination($mysqli, ROW_PER_PAGE);
    $res = $mysqli->query('SELECT * FROM `messages` WHERE `status` != 3 ORDER BY `date` DESC LIMIT '.$pagination["start_pages"].','.ROW_PER_PAGE);
    $result = [];
    while ($row = $res->fetch_assoc()) {
        $result[] = $row;
    }
    return ["res" => $result, "pagination" => $pagination];
}

/**
 * Делаем основной запрос к БД для админки
 * @param bool $approved
 * @return array
 */
function get_all_messages($approved = true) {
    $mysqli = new mysqli(HOST, USER, PASS, DATABASE);
    if ($mysqli->connect_errno) {
        return ["title" => "Ошибка", "message" => "Не удалось подключится к базе"];
    }
    if ($approved) {
        $res = $mysqli->query('SELECT * FROM `messages` WHERE `status` != 3 ORDER BY `id` DESC');
    } else {
        $res = $mysqli->query('SELECT * FROM `messages` WHERE `status` = 3 ORDER BY `id` DESC');
    }

    $result = [];
    while ($row = $res->fetch_assoc()) {
        $result[] = $row;
    }
    return $result;
}

/**
 * Получаем пользователя по id
 * @param $id
 * @return array user row from bd
 */
function get_user($id) {
    $mysqli = new mysqli(HOST, USER, PASS, DATABASE);
    $res = $mysqli->query("SELECT * FROM `users` WHERE `id` = $id");
    $row = $res->fetch_assoc();
    return $row;
}
