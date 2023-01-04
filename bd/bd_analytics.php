<?php

$sdb_name = "127.0.0.1";
$user_name = "root";
$user_password = "secret";
$db_name = "analytics";

// соединение с сервером базы данных
if(!$link_analytics = mysqli_connect($sdb_name, $user_name, $user_password, $db_name, '33063'))
{
    echo "<br>Не могу соединиться с сервером базы данных<br>";
    exit();
}

// выбираем базу данных
if(!mysqli_select_db($link_analytics, $db_name))
{
    echo "<br>Не могу выбрать базу данных<br>";
    exit();
}
mysqli_set_charset($link_analytics, "utf8mb4");

?>
