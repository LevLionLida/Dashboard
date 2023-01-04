<?php

$sdb_name = "127.0.0.1";
$user_name = "root";
$user_password = "secret";
$db_name = "echat_bitrix_dev";

// соединение с сервером базы данных
if(!$link_bitrix = mysqli_connect($sdb_name, $user_name, $user_password, $db_name, '33061'))
{
    echo "<br>Не могу соединиться с сервером базы данных<br>";
    exit();
}

// выбираем базу данных
if(!mysqli_select_db($link_bitrix, $db_name))
{
    echo "<br>Не могу выбрать базу данных<br>";
    exit();
}
mysqli_set_charset($link_bitrix, "utf8mb4");

?>
