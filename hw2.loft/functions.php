<?php
//Задание #1
function task1($arr, $combined_str = false)
{
    if ($combined_str) {
        return implode(" ", $arr);
    } else {
        foreach ($arr as $value) {
            echo '<p>' . $value . '</p>';
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
    switch ($action) {
        case '+':
            foreach ($arr as $value) {
                $result += $value;
                if ($value != end($arr)) {
                    $result_text .= $value . ' + ';
                } else {
                    $result_text .= $value . ' = ';
                }
            }
            break;
        case '-':
            foreach ($arr as $value) {
                $result -= $value;
                if ($value != end($arr)) {
                    $result_text .= $value . ' - ';
                } else {
                    $result_text .= $value . ' = ';
                }
            }
            break;
        case '*':
            foreach ($arr as $value) {
                if ($result == 0 || $value == 0) {
                    $error_null = true;
                } else {
                    $result *= $value;
                }
                if ($value != end($arr)) {
                    $result_text .= $value . ' * ';
                } else {
                    $result_text .= $value . ' = ';
                }
            }
            break;
        case '/':
            foreach ($arr as $value) {
                if ($result == 0 || $value == 0) {
                    $error_null = true;
                } else {
                    $result /= $value;
                }
                if ($value != end($arr)) {
                    $result_text .= $value . ' / ';
                } else {
                    $result_text .= $value . ' = ';
                }
            }
            break;
    }
    if (is_float($result)) {
        $result = round($result, 2);
    }
    if (!$error_null) {
        return '<p>' . $result_text . $result . '</p>';
    } else {
        return '<p>' . $result_text . 'Error: умножение или деление на 0!!!</p>';
    }
}

//Задание #3
function task3($arg_1, $arg_2)
{
    $res = '';
    if (is_int($arg_1) && is_int($arg_2)) {
        $res .= '<table border="1" style="text-align: center"><tr>';
        for ($i = 1; $i <= $arg_1; $i++) {
            for ($j = 1; $j <= $arg_2; $j++) {
                $res .= '<td>' . $j * $i . '</td>';
            }
            if ($i != $arg_1) {
                $res .= '</tr><tr>';
            }
        }
        $res .= '</tr></table>';
        echo $res;
    } else {
        echo "<p>Error: Аргумент(-ты) NOT INT!!!</p>";
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
function task5($str_replace, $action_replace)
{
    if ($action_replace == 1) {
        echo str_replace('К', '', $str_replace);
    }
    if ($action_replace == 2) {
        echo '<br>' . str_replace('Две', 'Три', $str_replace);
    }
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
