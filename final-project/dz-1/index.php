<?php
// ДОМАНЕЕ ЗАДАНИЕ №1
// Задание 1
$name = "Сергей";
$age = 34;

echo("<br><h2>ЗАДАНИЕ 1</h2>");
echo("<pre>");

echo("Меня зовут $name \n<br>");
echo('Мне' . $age . 'лет' . "\n<br>");
echo("\"!|\\/’\"\\");

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 2</h2>");
echo("<pre>");

// Задание 2
const TOTAL_PICTURES = 80;
const FELT_PEN = 23;
const PEN = 40;
$result = TOTAL_PICTURES - PEN - FELT_PEN;

echo("На школьной выставке " . TOTAL_PICTURES . " рисунков.<br>" . FELT_PEN . " из них выполнены
фломастерами, " . PEN . " карандашами, а остальные — красками. <br>Сколько рисунков, выполненные красками, на школьной выставке? <br><br>Красками выполенно - " . $result . "картин");

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 3</h2>");
echo("<pre>");

// Задание 3
$age = rand(1, 121);
echo("Ваш возраст: " . $age . " лет/года </br>");
if ($age >= 18 && $age <= 65) {
    echo("Вам еще работать и работать");
} elseif ($age > 65 && $age < 120) {
    echo("Вам пора на пенсию");
} elseif ($age >= 1 && $age <= 17) {
    echo("Вам ещё рано работать");
} else {
    echo("Неизвестный возраст");
}

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 4</h2>");
echo("<pre>");

// Задание 4
$day = rand(1, 10);

switch ($day) {
    case 1:
        echo "Это рабочий день";
        break;
    case 2:
        echo "Это рабочий день";
        break;
    case 3:
        echo "Это рабочий день";
        break;
    case 4:
        echo "Это рабочий день";
        break;
    case 5:
        echo "Это рабочий день";
        break;

    case 6:
        echo "Это выходной день";
        break;
    case 7:
        echo "Это выходной день";
        break;

    default:
        echo "Неизвестный день";
}

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 5</h2>");
echo("<pre>");

// Задание 5
$cars = array (
    'bmw' => array (
        "model" => "X5",
        "speed" => 100,
        "doors" => 5,
        "year" => "2015"
    ),
    'toyota' => array (
        "model" => "v5",
        "speed" => 130,
        "doors" => 6,
        "year" => "2016"
    ),
    'opel' => array (
        "model" => "f5",
        "speed" => 120,
        "doors" => 7,
        "year" => "2017"
    )
);

foreach ($cars as $brend => $car) {
    echo "Название машины: $brend <br> {$car['model']} {$car['speed']} {$car['doors']} {$car['year']}".PHP_EOL;
}

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 6</h2>");
echo("<pre>");

// Задание 6
$rows = 10;
$cols = 10;

echo("<table border=\"1\" style='border: solid 1px #dadada; border-collapse: collapse; text-align: center;'>");

echo("<tr style='background: #777'><th style='padding: 5px'>-</th>");
for ($th = 1; $th <= 10; $th++) {
    echo("<th style='color: #fff; padding: 5px 10px'>$th</th>");
}
echo("</tr>");

for ($tr = 1; $tr <= $rows; $tr++) {
    echo("<tr><th style='color: #fff; padding: 5px; background: #777;'>" . $tr . "</th>");
    if ($tr % 2 == 0) {
        for ($td = 1; $td <= $cols; $td++) {
            if ($td % 2 == 0) {
                echo("<td>(" . $tr * $td . ")</td>");
            } elseif ($td % 1 == 0) {
                echo("<td>" . $tr * $td . "</td>");
            }
        }
    } elseif ($tr % 1 == 0) {
        for ($td = 1; $td <= $cols; $td++) {
            if ($td % 2 == 0) {
                echo("<td>" . $tr * $td . "</td>");
            } elseif ($td % 1 == 0) {
                echo("<td>[" . $tr * $td . "]</td>");
            }
        }
    }

    echo("</tr>");
}

echo("</table>");
