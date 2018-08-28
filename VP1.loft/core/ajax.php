<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/pdo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/write_file.php';
$delivery = ['street', 'home', 'part', 'appt', 'floor'];
$email = get_post('email');
$name = get_post('name');
$phone = get_post('phone');
$address = get_address($delivery);
$comment = get_post('comment');
$payment = get_post('payment');
$callback = get_post('callback');
$result = 0;
if (empty($email) || empty($name) || empty($phone) || empty($address)) {
    echo 0;
} else {
    if (empty(search_email($email))) {
        registration_user($email, $name, $phone);
    }
    registration_order(search_email($email), $address, $comment, $payment, $callback);
    write_file();
    echo 1;
}
function get_address($post_keys)
{
    $address = [];
    foreach ($post_keys as $value) {
        if (!empty($_POST[$value])) {
            array_push($address, " {$value} : {$_POST[$value]}");
        }
    }
    return implode(',', $address);
}

function get_post($var_name)
{
    if (!empty($_POST[$var_name])) {
        return $_POST[$var_name];
    }
}
