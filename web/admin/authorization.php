<?php
$name = $_POST['name'];
$pass = $_POST['pass'];

if ($name == "admin" && $pass == "admin") {
    setcookie("admin", true);
} else {
    setcookie("admin", "", time() - 3600);
}

header('Location: '.$_SERVER['HTTP_REFERER']);