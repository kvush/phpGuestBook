<?php
setcookie("admin", "", time() - 3600);
header('Location: '.$_SERVER['HTTP_REFERER']);