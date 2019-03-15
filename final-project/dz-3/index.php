<?php
require_once('src/function.php');
echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 1</h2>");
echo("<pre>");

task1();

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 2</h2>");
echo("<pre>");

$friends = [
    'Dima' => [
        'age' => 30,
    ],
    'Ivan' => [
        'age' => 31,
    ],
    'Sacha' => [
        'age' => 33,
    ],
];
task2($friends);

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 3</h2>");
echo("<pre>");

task3('array-cvs.csv');

for ($i = 1; $i <= 50; $i++) {
    $numbers[$i] = rand(1, 100);
}

// ВТОРОЙ ВАРИАНТ, БОЛЕЕ ПРОСТОЙ
//$fd = fopen('array-number.csv', 'w');
//$numbers = fputcsv($fd, $numbers, ';');
//fclose($fd);
//
//$handle = fopen('array-number.csv', 'r');
//$openFile = fgetcsv($handle, 1000, ';');
//
//$sum = 0;
//foreach ($openFile as $number) {
//    if ($number % 2 == 0) {
//        $sum += $number;
//    }
//}
//
//print_r($sum);

echo("<pre>");
echo("<br><h2>ЗАДАНИЕ 4</h2>");
echo("<pre>");

//task4();

$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
task4($url);

