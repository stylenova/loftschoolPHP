<?php
//Задача 1
function task1()
{
    $fileData = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($fileData);
    echo '<pre>';

    echo '<table>';
    echo '<tr><td colspan="2" style="font-size: 18px;"><b>Purchase Order Number:</b> ' . $xml->attributes()->PurchaseOrderNumber . '</td></tr>';
    echo '<tr><td colspan="2" style="padding: 0 0 20px; font-size: 18px;"><b>Order Date:</b> ' . $xml->attributes()->OrderDate . '</td></tr>';
    echo '<tr>';
    foreach ($xml->Address as $address) {
        echo '<td valign="top" style="width: 300px; margin: 0; padding: 0 50px 0 0;">';
        echo '<h2>' . $address->attributes()->Type . PHP_EOL . '</h2>';
        echo '<p style="font-size: 14px;">Name: ' . $address->Name->__toString() . '</p>';
        echo '<p style="font-size: 14px;">Street: ' . $address->Street->__toString() . '</p>';
        echo '<p style="font-size: 14px;"> City: ' . $address->City->__toString() . '</p>';
        echo '<p style="font-size: 14px;">State: ' . $address->State->__toString() . '</p>';
        echo '<p style="font-size: 14px;">Zip: ' . $address->Zip->__toString() . '</p>';
        echo '<p style="font-size: 14px;">Country: ' . $address->Country->__toString() . '<p>';
        echo '</td>';
    }
    echo '</tr>';
    echo '<tr><td colspan="2" style="padding: 30px 0 40px; font-size: 18px;"><b>Delivery notes:</b> Please leave packages in shed by driveway</td></tr>';
    echo '<tr>';
    foreach ($xml->Items->Item as $item) {
        $comment = $item->Comment->__toString();
        $shipDate = $item->ShipDate->__toString();
        echo '<td valign="top" style="width: 300px; margin: 0; padding: 0 50px 0 0;">';
        echo '<h2>PartNumber: ' . $item->attributes()->PartNumber . PHP_EOL . '</h2>';
        echo '<p style="font-size: 14px;">Product name: ' . $item->ProductName->__toString() . '</p>';
        echo '<p style="font-size: 14px;">Quantity: ' . $item->Quantity->__toString() . '</p>';
        echo '<p style="font-size: 14px;"> USPrice: ' . $item->USPrice->__toString() . '</p>';
        if ($comment != '') {
            echo '<p style="font-size: 14px;">State: ' . $item->Comment->__toString() . '</p>';
        } elseif ($shipDate != '') {
            echo '<p style="font-size: 14px;">Ship date: ' . $item->ShipDate->__toString() . '</p>';
        }
        echo '</td>';
    }
    echo '</tr>';
    echo '</table>';
}

//Задача 2
function task2($param)
{
    file_put_contents('output.json', json_encode($param));
    $arrayChange = ['Rita' => ['age' => 27]];
    $cahnge = rand(0, 1);
    if ($cahnge) {
        $output = json_decode(file_get_contents('output.json'), true);
        file_put_contents('$output2.json', json_encode($output + $arrayChange));
        $output2 = json_decode(file_get_contents('$output2.json'), true);

        echo '<br>';
        echo "При сравнение дух файлов: output.json и output2.json, обнаружены расходения!<br>";
        print_r(array_diff_assoc($output2, $output));
    } else {
        echo 'Пока новых друзей нет!!! Обновляйте страницу дальше.';
    }
}

//Задание 3
function task3($file)
{
    $arrayCsv = addNuberArray();
    writeCsv($file, $arrayCsv);
    $numbers = getCsv($file);
    echo 'Сумма четных чисел = ' . sumEvan($numbers);
}

function addNuberArray()
{
    $arrayCsv = [];
    for ($i = 1; $i <= 50; $i++) {
        $arrayCsv[$i] = rand(1, 100);
    }
    return $arrayCsv;
}

function writeCsv($file, $arrayCsv)
{
    $csvFile= fopen($file, 'w');
    fputcsv($csvFile, $arrayCsv, ';');
    fclose($csvFile);
}

function getCsv($file)
{
    $handle = fopen($file, 'r');
    $openFile = fgetcsv($handle, 1000, ';');
    return $openFile;
}

function sumEvan($numbers)
{
    $sum = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }
    return $sum;
}

//Задание 4
function task4($url)
{
    $json = json_decode(file_get_contents($url), true);
    var_dump($json['query']['pages'][15580374]['pageid']);
}
