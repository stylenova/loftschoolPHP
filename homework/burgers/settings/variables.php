<?php

// Таблица users
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Таблица orsers
$street = $_POST['street'];
$home = $_POST['home'];
$part = $_POST['part'];
$appt = $_POST['appt'];
$floor = $_POST['floor'];
$comment = $_POST['comment'];
$payment = $_POST['payment'];
$callbackt = $_POST['callback'];

// ID пользоватея/номер заказа и общее количество заказов
$userId = searchUser($email);
$numberOrder = getLastOrder() + 1;
$getTotalUserOrder  = getTotalUserOrder($userId) + 1;

// Массив из базы данных orders
$orderData = ['street' => $street, 'home' => $home, 'part' => $part, 'appt' => $appt, 'floor'=>$floor, 'comment' => $comment, 'payment' => $payment, 'callback'=>$callback];
$shippingInfo = 'улица: ' . $orderData['street'] . ', дом: ' . $orderData['home'] . ', корпус: ' . $orderData['part'] . ', квартира: ' . $orderData['appt'] . ', этаж: ' . $orderData['floor'];

// Переменные для вывода сообщений
$addresDelivery = 'Ваш заказ будет доставлен по адресу:' . $shippingInfo;
$infoOrder = 'Информация о заказе: DarkBeefBurger за 500 рублей, 1 шт';
$getTotalUserOrder = 'Спасибо! Это уже ' . $getTotalUserOrder . ' заказ' . PHP_EOL;