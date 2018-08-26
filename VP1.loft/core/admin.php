<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/pdo.php';
$users = users_list();
$orders = orders_list();
//users_list
$users_list = '<table border="1" cellspacing="0" cellpadding="10">
  <caption style="font-size: 20px; font-weight: 600">Users list</caption>
  <tr>
    <th>id</th>
    <th>email</th>
    <th>name</th>
    <th>phone</th>
  </tr>';

foreach ($users as $user) {
    $users_list .= "<tr>
                    <th>{$user['id_user']}</th>
                    <th>{$user['email_user']}</th>
                    <th>{$user['name_user']}</th>
                    <th>{$user['phone_user']}</th>
                   </tr>";
}
$users_list .= '</table>';
//orders_list
$orders_list = '<table border="1" cellspacing="0" cellpadding="10">
  <caption style="font-size: 20px; font-weight: 600">Orders list</caption>
  <tr>
    <th>№ order</th>
    <th>name</th>
    <th>email</th>
    <th>phone</th>
    <th>delivery_address</th>
    <th>comment</th>
    <th>payment</th>
    <th>callback</th>
  </tr>';
foreach ($orders as $order) {
    $orders_list .= "<tr>
                    <th>{$order['id_order']}</th>
                    <th>{$order['name_user']}</th>
                    <th>{$order['email_user']}</th>
                    <th>{$order['phone_user']}</th>
                    <th>{$order['delivery_address']}</th>
                    <th>{$order['comment']}</th>
                    <th>{$order['payment']}</th>
                    <th>{$order['callback']}</th>
                   </tr>";
}
$orders_list .= '</table>';
echo $users_list;
echo $orders_list;
