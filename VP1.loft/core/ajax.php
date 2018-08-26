<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/pdo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/send_email.php';
$delivery = ['street', 'home', 'part', 'appt', 'floor'];
$email_user = assign_value('email');
$name_user = assign_value('name');
$phone_user = assign_value('phone');
$delivery_address = glue_address($delivery);
$comment = assign_value('comment');
$payment = assign_value('payment');
$callback = assign_value('callback');
$id_user = null;
$form_check = true;
if (!empty($email_user) && !empty($name_user) && !empty($phone_user) && !empty($delivery_address)) {
    if (empty(search_email($email_user))) {
        registration_user($email_user, $name_user, $phone_user);
        registration_order(search_email($email_user), $delivery_address, $comment, $payment, $callback);
        send_email();
    } else {
        registration_order(search_email($email_user), $delivery_address, $comment, $payment, $callback);
        send_email();
    }
    echo 1;
} else {
    echo 0;
}

function glue_address($delivery)
{
    $address = [];
    foreach ($delivery as $value) {
        if (!empty($_POST[$value])) {
            array_push($address, " {$value} : {$_POST[$value]}");
        }
    }
    $user_address = implode(',', $address);
    return $user_address;
}

function assign_value($variable)
{
    if (!empty($_POST[$variable])) {
        return $_POST[$variable];
    } else {
        if ($variable == 'comment' || $variable == 'payment' || $variable == 'callback') {
            return '-';
        }
    }
}
