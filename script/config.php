<?php
define ("ROW_PER_PAGE", 30);

define ("HOST", "localhost");
define ("DATABASE", "kv_guestBook");
define ("USER", "root");
define ("PASS", "");

/**
 * @return mysqli connect to db
 */
function db_init() {
    $mysqli = new mysqli(HOST, USER, PASS, DATABASE);
    $mysqli->set_charset("utf8");
    return $mysqli;
}
