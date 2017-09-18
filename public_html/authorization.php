<?php
require(__DIR__ . "/../script/config.php");

$mysqli = db_init();
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);

$res = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
$row = $res->fetch_assoc();
//если нет пользовтаеля с этим e-mail, то создаем новую запись
if (is_null($row)) {
    if ($mysqli->query("INSERT INTO `users` (`name`, `email`) VALUES ('$name', '$email')")) {
        setcookie("user_id", $mysqli->insert_id);
    } else {
        setcookie("user_id", "", time() - 3600);
    }
}
//если есть, то обновим имя
else {
    if ($mysqli->query("UPDATE `users` SET `name`= '$name' WHERE id = ".$row['id'])) {
        setcookie("user_id", $row['id']);
    } else {
        setcookie("user_id", "", time() - 3600);
    }
}
header('Location: '.$_SERVER['HTTP_REFERER']);