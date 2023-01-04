<?php
include('/Users/macbook/Documents/dashboard/bd/bd_analytics.php'); //Подключились к БД

foreach ($_GET as $param_key => $param_value) {
    if (function_exists($param_key)) {
        $param_key();
        return;
    }
}

echo 'function not found';

function get_new_users()
{
    global $link_analytics;
    $qw_total_new_users = mysqli_query($link_analytics, "SELECT user, DATE(date) as date FROM countNewUsers
    WHERE date BETWEEN (curdate() - interval 30 day)
    and  (curdate() - interval 1 day) ORDER by date;");
    $total_new_users = mysqli_fetch_all($qw_total_new_users, MYSQLI_ASSOC);
    echo json_encode($total_new_users);
}

function get_new_phones()
{
    global $link_analytics;
    $qw_total_new_phones = mysqli_query($link_analytics, "SELECT phone, DATE(date) as date FROM count_new_phones
    WHERE date BETWEEN (curdate() - interval 30 day)
    and  (curdate() - interval 1 day) ORDER by date;");
    $total_new_phones = mysqli_fetch_all($qw_total_new_phones, MYSQLI_ASSOC);
    echo json_encode($total_new_phones);
}

function get_active_tariff()
{
    global $link_analytics;
    $qw_total_active_tariff = mysqli_query($link_analytics, "SELECT tariff, DATE(date) as date FROM count_active_tariff
    WHERE date BETWEEN (curdate() - interval 30 day)
    and  (curdate() - interval 1 day) ORDER by date;");
    $total_active_tariff = mysqli_fetch_all($qw_total_active_tariff, MYSQLI_ASSOC);
    echo json_encode($total_active_tariff);
}

function get_disabled_tariff()
{
    global $link_analytics;
    $qw_total_disabled_tariff = mysqli_query($link_analytics, "SELECT tariff, DATE(date) as date FROM count_disabled_tariff
    WHERE date BETWEEN (curdate() - interval 30 day)
    and  (curdate() - interval 1 day) ORDER by date;");
    $total_disabled_tariff = mysqli_fetch_all($qw_total_disabled_tariff, MYSQLI_ASSOC);
    echo json_encode($total_disabled_tariff);
}

function get_count_payments()
{
    global $link_analytics;
    $qw_total_payments = mysqli_query($link_analytics, "SELECT first_payment , next_payment FROM count_payments
    WHERE date BETWEEN CURRENT_DATE() - INTERVAL 1 DAY AND CURRENT_DATE();");
    $ctn_total_payments = mysqli_fetch_array($qw_total_payments, MYSQLI_ASSOC);
    echo json_encode(['count_payments' => [['x' => 'первая оплата', 'value' => $ctn_total_payments['first_payment']], ['x' => 'вторая оплата', 'value' => $ctn_total_payments['next_payment']]]], JSON_UNESCAPED_UNICODE);

}