<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/pdo.php';
function send_email()
{
    $info_order = get_info_for_order();
    $letter = date("d.m.Y H:i") . '
               Заказ №' . $info_order["id_order"] . '
               “Ваш заказ будет доставлен по адресу” ' . $info_order["delivery_address"] . '
               DarkBeefBurger за 500 рублей, 1 шт
               “Спасибо - это ваш ' . number_user_orders($info_order['buyer']) . ' заказ”
               ';
    $file_name = $_SERVER['DOCUMENT_ROOT'] . '/mails/order № ' . $info_order["id_order"] . '.txt';
    file_put_contents($file_name, $letter);
}
