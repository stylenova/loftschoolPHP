<?php

require_once 'classes/PriceBase.php';
require_once 'classes/PriceHourly.php';
require_once 'classes/PriceDaily.php';
require_once 'classes/PriceStudent.php';

echo 'Тарифы компании: <br>';

echo '<pre>';
echo '<pre>';
echo 'Название тарифва "Базовый"<br>';
$base = new PriceBase(30, true);
echo 'К оплате: ' . $base->calculate(30, 5) . ' руб.';

echo '<pre>';
echo 'Название тарифва "Почасовой"<br>';
$hourly = new PriceHourly(30, true);
echo 'К оплате: ' . $hourly->calculate(30, 5) . ' руб.';

echo '<pre>';
echo 'Название тарифва "Суточный"<br>';
$daily = new PriceDaily(30, true);
echo 'К оплате: ' . $daily->calculate(30, 5) . ' руб.';

echo '<pre>';
echo 'Название тарифва "Студентский"<br>';
$student = new PriceStudent(20, true);
echo 'К оплате: ' . $student->calculate(30, 5) . ' руб.';
