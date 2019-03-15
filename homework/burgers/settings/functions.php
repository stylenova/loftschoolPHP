<?php
require_once 'init.php';

/**
 * Поиск зарег пользователя
 * @param $email
 * @return mixed
 */
function searchUser($email)
{
    $searchId = "SELECT id FROM users WHERE email = '{$email}'";
    $db = getDbConnection();
    $ret = $db->prepare($searchId);
    $ret->execute();
    $ret = $ret->fetchAll(PDO::FETCH_ASSOC)[0];

    return $ret['id'];
}

/**
 * Добавление нового пользователя
 * @param $name
 * @param $phone
 * @param $email
 * @return false|PDOStatement
 */
function addNewUser($name, $email, $phone)
{
    $query = "INSERT INTO users (name, phone, email) VALUES ('{$name}', '{$phone}', '{$email}');";
    $ret = getDbConnection()->query($query);

    return $ret;
}

/**
 * Все пользователи
 * @return array|bool|PDOStatement
 */
function allUsers()
{
    $searchUsers = "SELECT * FROM users";
    $db = getDbConnection();
    $ret = $db->prepare($searchUsers);
    $ret->execute();
    $ret = $ret->fetchAll(PDO::FETCH_ASSOC);

    return $ret;
}

/**
 * Добавление нового заказа
 * @param $userId
 * @param $shippingInfo
 * @param $orderData
 * @return string
 */
function addNewOrder($userId, $shippingInfo,  $orderData)
{
    $comment = $orderData['comment'];
    $callBack = $orderData['callback'];
    $payment = $orderData['$payment'];

    $query = "INSERT INTO
    orders (user_id, address, comment, callback, payment) 
    VALUES ('{$userId}', '{$shippingInfo}', '{$comment}', '{$callBack}', '{$payment}');";
    $db = getDbConnection();
    $statement = $db->prepare($query);
    $statement->execute();

    return $db->lastInsertId();
}

/**
 * Все заказы
 * @return array|bool|PDOStatement
 */
function allOrders()
{
    $searchOrders = "SELECT * FROM orders";
    $db = getDbConnection();
    $ret = $db->prepare($searchOrders);
    $ret->execute();
    $ret = $ret->fetchAll(PDO::FETCH_ASSOC);

    return $ret;
}

/**
 * Общее количество заказов
 * @param $userId
 * @return mixed
 */
function getTotalUserOrder($userId)
{
    $query = " SELECT COUNT(*) as total FROM orders WHERE user_id = '$userId'";
    $db = getDbConnection();
    $ret = $db->prepare($query);
    $ret->execute();
    $orderSum = $ret->fetchAll(PDO::FETCH_ASSOC);

    return $orderSum[0]['total'];
}

/**
 * Последний заказ пользователя
 * @return mixed
 */
function getLastOrder()
{
    $query = "SELECT MAX(order_id) FROM orders";
    $db = getDbConnection();
    $ret = $db->prepare($query);
    $ret->execute();
    $lastOrder = $ret->fetchAll(PDO::FETCH_ASSOC);

    return $lastOrder[0]['MAX(order_id)'];
}
