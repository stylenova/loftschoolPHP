<?php
function task1($arrayStr, $combineStr)
{
    if (!$combineStr) {
        foreach ($arrayStr as $kye => $value) {
            echo "<p> $value </p>";
        }
    } else {
        foreach ($arrayStr as $kye => $value) {
            echo "<span> $value </span>";
        }
    }
}

/**
 * Функция получает не определенное количество параметров и складывает их
 * @param $args - массив чисел для сложения
 */
function task2(...$args)
{
    $operator = array_shift($args);
    $expression = implode($operator, $args);
    $result = 0;
    eval("\$result = $expression;");
    echo $expression . '=' . $result;
}

/**
 * Функция создает таблицу умножения в зависемости от указаных чисел
 * @param $val1 - int, число до которого будет созаваться табица умножения по горизонтали
 * @param $val2 - int, число до которого будет созаваться табица умножения по вертикали
 */
function task3($val1, $val2)
{
    $int1 = is_int($val1);
    $int2 = is_int($val2);

    if ($int1 && $int2) {
        $rows = $val1;
        $cols = $val2;

        echo("<table border=\"1\" style='border: solid 1px #dadada; border-collapse: collapse; text-align: center;'>");

        echo("<tr style='background: #777'><th style='padding: 5px'>-</th>");
        for ($th = 1; $th <= $cols; $th++) {
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
    } else {
        echo ("НЕ ВЕРНОЕ ЗНАЧЕНИЕ");
    }
}

/**
 * Функция выодит текущее время и вермя определенной даты
 */
function task4()
{
    $today = date("d.m.Y H:i");
    $customDate = mktime(0, 0, 0, 2, 24, 2016);
    echo $today . "<br>";
    echo $customDate;
}

/**
 * Функция удаляет все заглавные буквы "К" в параметре $removing_letter и заменяет слово 'Две' на 'Три'
 * @param $removing_letter
 * @param $replacement
 */
function task5($removing_letter, $replacement)
{
    // первую часть задания я не понял как сделать
    echo str_replace('К', '', $removing_letter).PHP_EOL;
    echo str_replace('Две', 'Три', $replacement);
}

/**
 * Функция создает файл с указанным именем и текстом в аргументах
 * @param $name_file, название создаваемого файла
 * @param $content, текст внутри файла
 */
function task6($name_file, $content)
{
    file_put_contents("$name_file.txt", $content);
    echo file_get_contents("$name_file.txt");
}
