<?php
require_once '../settings/functions.php';
require_once '../settings/variables.php';
?>

<!doctype html>
<html lang="ru">
    <head>
        <title>Админ-панель</title>
    </head>
    <body>
        <h1 style="margin-bottom: 50px; text-transform: uppercase;">Добро пожаловать в админ панель!</h1>
        <h3 style="margin-bottom: 10px;">Таблица пользователй</h3>
        <table border='1' style='margin-bottom: 50px; border: solid 1px #dadada; border-collapse: collapse; text-align: left;'>
            <tr>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">id</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Имя</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Мэил</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Телефон</th>
            </tr>

            <?php
            $sql = allUsers();
            foreach ($sql as $key) {
                echo "<tr>";
                foreach ($key as $item) {
                    echo "<td style=\"padding: 5px 10px;\">{$item}</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <h3 style="margin-bottom: 10px;">Таблица заказов</h3>
        <table border='1' style='border: solid 1px #dadada; border-collapse: collapse; text-align: left;'>
            <tr>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Id users</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Id orders</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Адресс</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Сообщение</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Перезвонить</th>
                <th style="padding: 5px 10px; background: #7f7f7f; color: #fff;">Рассчет</th>
            </tr>

            <?php
            $sql = allOrders();
            foreach ($sql as $key) {
                echo "<tr>";
                foreach ($key as $item) {
                    echo "<td style=\"padding: 5px 10px;\">{$item}</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

    </body>
</html>