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
function task2()
{
    $action = ['-', '+', '/', '*'];
    $get_args = func_get_args();
    if (isset($get_args) && !empty($get_args)) {
        if (in_array($get_args[0], $action)) {
            if (task2_numeric($get_args) == 0) {
                echo task2_calc($get_args);
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

function task2_numeric($arr)
{
    $not_numeric = 0;
    foreach ($arr as $key => $zn) {
        if ($key == 0) {
            continue;
        } else {
            if (!is_numeric($arr[$key])) {
                $not_numeric++;
            }
        }
    }
    return $not_numeric;
}

function task2_calc($arr)
{
    $action = $arr[0];
    $result = $arr[1];
    $result_text = $result . ' ' . $action . ' ';
    $error_null = false;
    unset($arr[0], $arr[1]);
    foreach ($arr as $value) {
        switch ($action) {
            case '+':
                $result += $value;
                break;
            case '-':
                $result -= $value;
                break;
            case '*':
                $result *= $value;
                break;
            case '/':
                if ($result == 0 || $value == 0) {
                    $error_null = true;
                } else {
                    $result /= $value;
                }
                break;
        }
        if ($value != end($arr)) {
            $result_text .= $value . $action;
        } else {
            $result_text .= $value . ' = ';
        }
    }

    if (is_float($result)) {
        $result = round($result, 2);
    }
    if (!$error_null) {
        return '<p>' . $result_text . $result . '</p>';
    } else {
        return '<p>' . $result_text . 'Error: Нельзя / на 0!!!</p>';
    }
}

//Задание #3
function task3($first_int, $second_int)
{
    $res = '';
    if (is_int($first_int)) {
        if (is_int($second_int)) {
            $res .= '<table border="1" style="text-align: center"><tr>';
            for ($i = 1; $i <= $first_int; $i++) {
                for ($j = 1; $j <= $second_int; $j++) {
                    $res .= '<td>' . $j * $i . '</td>';
                }
                if ($i != $first_int) {
                    $res .= '</tr><tr>';
                }
            }
            $res .= '</tr></table>';
            echo $res;
        } else {
            echo "<p>Error: Second argument {$second_int} is not INT type!!!</p>";
        }
    } else {
        echo "<p>Error: First argument {$first_int} is not INT type!!!</p>";
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