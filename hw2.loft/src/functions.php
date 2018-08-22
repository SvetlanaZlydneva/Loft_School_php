<?php
//Задание #1
function task1($strings, $combined_str = false)
{
    if ($combined_str) {
        return implode(" ", $strings);
    } else {
        foreach ($strings as $string) {
            echo '<p>' . $string . '</p>';
        }
    }
}

//Задание #2
function task2(...$args)
{
    $actions = ['-', '+', '/', '*'];
    $action = array_shift($args);
    $numbers = $args;
    if (!empty($action) && !empty($numbers)) {
        if (in_array($action, $actions)) {
            if (task2_numeric($numbers) == 0) {
                echo task2_calc($action, $numbers);
            } else {
                echo "<p>Error: Аргумент(-ты) не являются целыми или вещественными цислами!!!</p>";
            }
        } else {
            echo "<p>Error: Первым аргументом должно быть арифметическое действие!!!</p>";
        }
    } else {
        echo "<p>Error: Аргументы не переданы!!!</p>";
    }
}

function task2_numeric($numbers)
{
    $not_numeric = 0;
    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            $not_numeric++;
        }
    }
    return $not_numeric;
}

function task2_calc($action, $numbers)
{
    $implodedExpression = implode(" {$action} ", $numbers);
    $error_null = false;
    $result = 0;
    if ($action == '/') {
        foreach ($numbers as $number) {
            if ($number == 0) {
                $error_null = true;
            }
        }
    }
    if (!$error_null) {
        eval("\$result = $implodedExpression;");
        if (is_float($result)) {
            $result = round($result, 2);
        }
        return "<p>{$implodedExpression} = {$result}</p>";
    } else {
        return "<p>{$implodedExpression} = Нельзя / на 0!!!</p>";
    }
}

//Задание #3
function task3($start, $end)
{
    $res = '';
    if (is_int($start) && is_int($end)) {
        $res .= '<table border="1" style="text-align: center"><tr>';
        for ($row = 1; $row <= $start; $row++) {
            for ($col = 1; $col <= $end; $col++) {
                $res .= '<td>' . $col * $row . '</td>';
            }
            if ($row != $start) {
                $res .= '</tr><tr>';
            }
        }
        $res .= '</tr></table>';
        echo $res;
    } else {
        if (!is_int($start)) {
            echo "<p>Error: First argument {$start} is not INT type!!!</p>";
        } else {
            echo "<p>Error: Second argument {$end} is not INT type!!!</p>";
        }
    }
}

//Задание #4
function task4($date = 0)
{
    if ($date) {
        return strtotime($date);
    } else {
        return date("d.m.Y H:i");
    }
}

//Задание #5
function task5_del_letter($str_delete)
{
    echo str_replace('К', '', $str_delete);
}

function task5_replace_word($str_replace)
{
    echo '<br>' . str_replace('Две', 'Три', $str_replace);
}

//Задание #6
function task6($file)
{
    if (!file_exists($file)) {
        $f = fopen($file, 'w');
        fwrite($f, '“Hello again!”');
        fclose($f);
    }
    echo file_get_contents($file);
}
