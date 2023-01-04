<?php

$sdb_name = "127.0.0.1";
$user_name = "root";
$user_password = "secret";
$db_name = "echat_amo_dev";

// соединение с сервером базы данных
if(!$link_amo = mysqli_connect($sdb_name, $user_name, $user_password, $db_name, '33062'))
{
    echo "<br>Не могу соединиться с сервером базы данных<br>";
    exit();
}

// выбираем базу данных
if(!mysqli_select_db($link_amo, $db_name))
{
    echo "<br>Не могу выбрать базу данных<br>";
    exit();
}
mysqli_set_charset($link_amo, "utf8mb4");

?>
