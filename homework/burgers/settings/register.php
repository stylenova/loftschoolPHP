<?php
require_once 'functions.php';
require_once 'variables.php';
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../User/temp');
$twig = new Twig_Environment($loader);

// Проверяем существует ли пользователь
if (empty($userId)) {
    addNewUser($name, $email, $phone);
    $userId = searchUser($email);

    addNewOrder($userId, $shippingInfo, $orderData);
    $numberOrder = getLastOrder();

    $getTotalUserOrder = 'Спасибо - это ваш первый заказ';

    echo $twig->render('index.phtml', array(
        'numberOrder' => $numberOrder,
        'addresDelivery' => $addresDelivery,
        'getTotalUserOrder' => $getTotalUserOrder
    ));

    die;
}

$numberOrder = getLastOrder();
$orderId = addNewOrder($userId, $shippingInfo, $orderData);

echo $twig->render('index.phtml', array(
    'numberOrder' => $numberOrder,
    'dataOrderText' => $infoOrder,
    'addresDelivery' => $addresDelivery,
    'getTotalUserOrder' => $getTotalUserOrder
));