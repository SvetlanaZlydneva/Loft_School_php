<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db.php';
function search_email($email)
{
    global $pdo;
    $search = $pdo->prepare("SELECT id_user FROM users WHERE email_user = :email");
    $search->execute([':email' => $email]);
    $id_user = $search->fetch();
    return $id_user['id_user'];
}

function registration_user($email, $name, $phone)
{
    global $pdo;
    $entry_user = $pdo->prepare("INSERT INTO users (email_user, name_user, phone_user) VALUES (:email,:name,:phone)");
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

function get_info_for_order()
{
    global $pdo;
    return $id_order = $pdo->query("SELECT * FROM orders ORDER BY id_order DESC")->fetch(PDO::FETCH_ASSOC);
}

function number_user_orders($id_user)
{
    global $pdo;
    $number = $pdo->query("SELECT COUNT(*) FROM orders WHERE buyer = '$id_user'")->fetchAll();
    return $number[0][0];
}

function users_list()
{
    global $pdo;
    $users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function orders_list()
{
    global $pdo;
    $orders = $pdo->query("SELECT * FROM orders LEFT JOIN users ON orders.buyer=users.id_user ORDER BY id_order ASC")->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}
