<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db.php';
function search_email($email)
{
    global $pdo;
    $search = $pdo->prepare("SELECT user_id FROM users WHERE email = :email");
    $search->execute([':email' => $email]);
    $user_id = $search->fetch();
    return $user_id['user_id'];
}

function registration_user($email, $name, $phone)
{
    global $pdo;
    $entry_user = $pdo->prepare("INSERT INTO users (email, name, phone) VALUES (:email,:name,:phone)");
    $entry_user->execute([':email' => $email, ':name' => $name, ':phone' => $phone]);
}

function registration_order($id, $address, $comment, $payment, $callback)
{
    global $pdo;
    $entry_order = $pdo->prepare("INSERT INTO orders (buyer, delivery_address, comment, payment, callback) VALUES (:buyer, :address, :comment, :payment, :callback)");
    $entry_order->execute([
        'buyer' => $id,
        ':address' => $address,
        ':comment' => $comment,
        ':payment' => $payment,
        ':callback' => $callback
    ]);
}

function remember_order_id()
{
    global $pdo;
    $order_id = $pdo->query("SELECT order_id FROM orders ORDER BY order_id DESC")->fetch(PDO::FETCH_ASSOC);
    return $order_id['order_id'];
}

function get_info_for_order()
{
    global $pdo;
    $order_id=remember_order_id();
    $info_order = $pdo->query("SELECT * FROM orders WHERE order_id ='$order_id'")->fetch(PDO::FETCH_ASSOC);
    return $info_order;
}

function get_number_user_orders($user_id)
{
    global $pdo;
    $number = $pdo->query("SELECT COUNT(*) FROM orders WHERE buyer = '$user_id'")->fetchAll();
    return $number[0][0];
}

function get_users_list()
{
    global $pdo;
    $users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function get_orders_list()
{
    global $pdo;
    $orders = $pdo->query("SELECT * FROM orders LEFT JOIN users ON orders.buyer=users.user_id ORDER BY order_id ASC")->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}
