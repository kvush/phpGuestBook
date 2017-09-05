<?php
require(__DIR__ . "/../../script/config.php");
$mysqli = new mysqli(HOST, USER, PASS, DATABASE);
$id = $_GET['id'];
$mysqli->query("UPDATE `messages` SET `status`= '2' WHERE id = $id");
header('Location: '.$_SERVER['HTTP_REFERER']);