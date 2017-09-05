<?php
setcookie("user_id", "", time() - 3600);
header('Location: '.$_SERVER['HTTP_REFERER']);