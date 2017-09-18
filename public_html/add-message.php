<?php
require(__DIR__ . "/../script/config.php");

$mysqli = db_init();
$title = $mysqli->escape_string($_POST['title']);
$message = $mysqli->escape_string($_POST['message']);

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = 0;
}

$date = time();
$status = 1;
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];


if ($mysqli->connect_errno) {
    $_SESSION['alert'] = 'Ошибка при подключнии к БД';
}
if ($mysqli->query("INSERT INTO `messages` (`user_id`, `title`, `message`, `date`, `status`, `ip`, `user_agent`) VALUES ('$user_id', '$title', '$message', '$date', '$status', '$ip', '$user_agent')")) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION['alert'] = 'Сообщение успешно добавлено';
} else {
    $_SESSION['alert'] = 'Ошибка при добавлении';
}
header('Location: '.$_SERVER['HTTP_REFERER']);