<?php
include('/Users/macbook/Documents/dashboard/bd/bd_bitrix.php'); //Подключились к БД
include('/Users/macbook/Documents/dashboard/bd/bd_amo.php'); //Подключились к БД

include('/Users/macbook/Documents/dashboard/bd/bd_analytics.php'); //Подключились к БД
//check user for admin
//session_start();
//
//if (!isset($_SESSION["session_username"])) {
//    header("location:login.php");
//} else {
//    include($_SERVER['DOCUMENT_ROOT'] . '/bd/bd.php'); //Подключились к БД
//    $login = $_SESSION['session_username'];
//    $query = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'  AND `is_partner` = 10");
//    $numrows = mysqli_num_rows($query);
//    if ($numrows == 0) header("location:logout.php");
//
//}


//Check new users

//SELECT DB BITRIX
$qw_cnt_new_users_bitrix = mysqli_query($link_bitrix, "SELECT id FROM accounts
        WHERE datetime BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE();");
$cnt_new_users_bitrix = mysqli_num_rows($qw_cnt_new_users_bitrix);
//var_dump($cnt_new_users_bitrix);

//SELECT DB AMO
$qw_cnt_new_users_amo = mysqli_query($link_amo, "SELECT id FROM accounts 
          WHERE datetime BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE();");
$cnt_new_users_amo = mysqli_num_rows($qw_cnt_new_users_amo);
$grand_total_new_users = $cnt_new_users_amo + $cnt_new_users_bitrix;
//var_dump($cnt_new_users_amo);
//echo '<pre>';
//echo "new users" . ($grand_total_new_users);
//echo '<pre>';

////CHECK DB ANALYTICS (INSERT or UPDATE DUPLICATE one database entry per day)
$qw_total_new_users = mysqli_query($link_analytics, "INSERT INTO countNewUsers (`user`, `date`) 
VALUES('$grand_total_new_users', CURRENT_DATE() - INTERVAL 1 DAY) ON DUPLICATE KEY UPDATE `user` = '$grand_total_new_users';");

//New Phones

//SELECT DB BITRIX
$qw_cnt_new_phones_bitrix = mysqli_query($link_bitrix, "SELECT id FROM users
            WHERE create_date BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE();");
$cnt_new_phones_bitrix = mysqli_num_rows($qw_cnt_new_phones_bitrix);
//SELECT DB AMO
$qw_cnt_new_phones_amo = mysqli_query($link_amo, "SELECT id FROM users 
          WHERE create_date BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE();");
$cnt_new_phones_amo = mysqli_num_rows($qw_cnt_new_phones_amo);

$grand_total_new_phones = $cnt_new_phones_amo + $cnt_new_phones_bitrix;

////CHECK DB ANALYTICS (INSERT or UPDATE DUPLICATE one database entry per day)
$qw_total_new_users = mysqli_query($link_analytics, "INSERT INTO count_new_phones (`phone`, `date`) 
VALUES('$grand_total_new_phones ', CURRENT_DATE() - INTERVAL 1 DAY) ON DUPLICATE KEY UPDATE `phone` = '$grand_total_new_phones ';");

//echo "new phone " . ($grand_total_new_phones);

//Active tariff

//SELECT DB BITRIX
$qw_cnt_active_tariff_bitrix = mysqli_query($link_bitrix, "SELECT id FROM users
WHERE end_tarif >= CURRENT_DATE() - INTERVAL 1 DAY ;");
$cnt_active_tariff_bitrix = mysqli_num_rows($qw_cnt_active_tariff_bitrix);

//SELECT DB AMO
$qw_cnt_active_tariff_amo = mysqli_query($link_amo, "SELECT id FROM users
WHERE end_tarif >= CURRENT_DATE() - INTERVAL 1 DAY ;");
$cnt_active_tariff_amo = mysqli_num_rows($qw_cnt_active_tariff_amo);

$grand_total_active_tariff = $cnt_active_tariff_amo + $cnt_active_tariff_bitrix;

////CHECK DB ANALYTICS (INSERT or UPDATE DUPLICATE one database entry per day)
$qw_total_active_tariff = mysqli_query($link_analytics, "INSERT INTO count_active_tariff (`tariff`, `date`) 
VALUES('$grand_total_active_tariff ', CURRENT_DATE() - INTERVAL 1 DAY) ON DUPLICATE KEY UPDATE `tariff` = '$grand_total_active_tariff ';");
//echo '<pre>';
//echo "active tariff " . ($grand_total_active_tariff);

//disabled tariff

//SELECT DB BITRIX
$qw_cnt_disabled_tariff_bitrix = mysqli_query($link_bitrix, "SELECT * FROM users
WHERE disabled != '0' AND end_tarif  = CURRENT_DATE() - INTERVAL 4 DAY;");
$cnt_disabled_tariff_bitrix = mysqli_num_rows($qw_cnt_disabled_tariff_bitrix);

//SELECT DB AMO
$qw_cnt_disabled_tariff_amo = mysqli_query($link_amo, "SELECT * FROM users
WHERE disabled != '0' AND end_tarif  = CURRENT_DATE() - INTERVAL 4 DAY;");
$cnt_disabled_tariff_amo = mysqli_num_rows($qw_cnt_disabled_tariff_amo);

$grand_total_disabled_tariff = $cnt_disabled_tariff_amo + $cnt_disabled_tariff_bitrix;

////CHECK DB ANALYTICS (INSERT or UPDATE DUPLICATE one database entry per day)
$qw_total_disabled_tariff = mysqli_query($link_analytics, "INSERT INTO count_disabled_tariff (`tariff`, `date`)
VALUES('$grand_total_disabled_tariff ', CURRENT_DATE() - INTERVAL 1 DAY) ON DUPLICATE KEY UPDATE `tariff` = '$grand_total_disabled_tariff ';");

//echo '<pre>';
//echo "disabled tariff " . ($grand_total_disabled_tariff);


//Count first and next payment tariff by number
//SELECT DB BITRIX
$qw_cnt_payments_bitrix = mysqli_query($link_bitrix, "SELECT login,
    (
        SELECT COUNT(p1.login) FROM payments as p1 WHERE p1.login = payments.login group by p1.login HAVING COUNT(p1.login) = 1
        ) as first_pay,
    (
        SELECT COUNT(p1.login) FROM payments as p1 WHERE p1.login = payments.login group by p1.login HAVING COUNT(p1.login) > 1
        ) as next_pay
FROM payments
WHERE date BETWEEN CURRENT_DATE() - INTERVAL 2 DAY AND CURRENT_DATE() GROUP BY login;");

$cnt_payments_bitrix_payments = mysqli_fetch_all($qw_cnt_payments_bitrix);

$qw_cnt_payments_bitrix_bal_log = mysqli_query($link_bitrix, "SELECT  number,
    (
        SELECT COUNT(bl.number) FROM balance_log as bl WHERE bl.number = balance_log.number group by bl.number HAVING COUNT(bl.number) = 1
    ) as first_pay,
    (
        SELECT COUNT(bl.number) FROM balance_log as bl WHERE bl.number = balance_log.number group by bl.number HAVING COUNT(bl.number)  > 1
    ) as next_pay

FROM balance_log

WHERE datetime BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE() GROUP BY number;");

$cnt_payments_bitrix_bal_log = mysqli_fetch_all($qw_cnt_payments_bitrix_bal_log);
//echo '<pre>' .'cnt_payments_bitrix_bal_log ';
//print_r($cnt_payments_bitrix_bal_log );

//echo '<pre>';
//print_r($cnt_payments_bitrix_payments);
//echo '<pre>';

$total_first_pay = 0;
$total_next_pay = 0;
$new_array = [];

foreach ($cnt_payments_bitrix_payments as $array) {
    if (!isset($new_array[$array[0]])) {
        $new_array[$array[0]] = 0;
    }
    if (is_null($array[1])) {
        $new_array[$array[0]] += $array[2];
    } else {
        $new_array[$array[0]] += $array[1];
    }
}

foreach ($cnt_payments_bitrix_bal_log as $array) {
    if (!isset($new_array[$array[0]])) {
        $new_array[$array[0]] = 0;
    }
    if (is_null($array[1])) {
        $new_array[$array[0]] += $array[2];
    } else {
        $new_array[$array[0]] += $array[1];
    }
}//сравнение номеров из выробки двух таблиц

foreach ($new_array as $val) {

    if ($val == 1) {
        $total_first_pay++;
    }
    if
    ($val > 1) {
        $total_next_pay++;
    }
}

//SELECT DB AMO
$qw_cnt_payments_amo = mysqli_query($link_amo, "SELECT
    (
        SELECT COUNT(p1.login) FROM payments as p1 WHERE p1.login = payments.login group by p1.login HAVING COUNT(p1.login) = 1
        ) as first_pay,
    (
        SELECT COUNT(p1.login) FROM payments as p1 WHERE p1.login = payments.login group by p1.login HAVING COUNT(p1.login) > 1
        ) as no_first_pay
FROM payments
WHERE date BETWEEN CURRENT_DATE() - INTERVAL 2 DAY AND CURRENT_DATE() GROUP BY login");

$cnt_payments_amo = mysqli_fetch_all($qw_cnt_payments_amo);

foreach ($cnt_payments_amo as $arr) {
    if ($arr[0] == 1) {
        $total_first_pay++;
    }
    if
    ($arr[1] >= 1) {
        $total_next_pay++;
    }
}
echo '<pre>';
var_dump($cnt_payments_amo);
echo '<pre>';

////CHECK DB ANALYTICS (INSERT or UPDATE DUPLICATE one database entry per day)
$qw_total_disabled_tariff = mysqli_query($link_analytics, "INSERT INTO count_payments (`first_payment`,`next_payment`, `date`)
VALUES('$total_first_pay','$total_next_pay', CURRENT_DATE() - INTERVAL 1 DAY) ON DUPLICATE KEY UPDATE `first_payment` = '$total_first_pay', `next_payment`='$total_next_pay';");

echo '<br>';
echo 'first_pay ' . $total_first_pay;
echo '<br>';
echo 'next_pay ' . $total_next_pay;

