<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/pdo.php';
function write_file()
{
    $info_order = get_info_for_order();
    $letter = date("d.m.Y H:i") . '
               Заказ №' . $info_order["order_id"] . '
               “Ваш заказ будет доставлен по адресу” ' . $info_order["delivery_address"] . '
               DarkBeefBurger за 500 рублей, 1 шт
               “Спасибо - это ваш ' . get_number_user_orders($info_order['buyer']) . ' заказ”
               ';
    $file_name = $_SERVER['DOCUMENT_ROOT'] . '/files/order № ' . $info_order["order_id"] . '.txt';
    file_put_contents($file_name, $letter);
}
