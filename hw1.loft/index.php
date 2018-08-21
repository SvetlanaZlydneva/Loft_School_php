<?php
//Задание #1
$name = 'Светлана';
$age = 30;
echo 'Меня зовут: ' . $name . '<br>';
echo 'Мне ' . $age . ' лет<br>';
echo '"!|\/\'"\<br>';

//Задание #2
const ALL = 80;
const MARKER = 23;
const PENCIL = 40;
$paints = ALL - MARKER - PENCIL;
echo '<br>' . $paints . ' рисунков выполненно красками.<br>';

//Задание #3
$working_age = rand(1, 120);
if ($working_age >= 18 && $working_age <= 65) {
    echo 'Возраст: ' . $working_age . '- Вам еще работать и работать<br>';
} elseif ($working_age > 65 && $working_age < 99) {
    echo 'Возраст: ' . $working_age . '- Вам пора на пенсию<br>';
} elseif ($working_age >= 1 && $working_age <= 17) {
    echo 'Возраст: ' . $working_age . '- Вам ещё рано работать<br>';
} else {
    echo 'Возраст: ' . $working_age . '- Неизвестный возраст<br>';
}

//Задание #4
$day = rand(1, 9);
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo $day . ' Это рабочий день<br>';
        break;
    case 6:
    case 7:
        echo $day . ' Это выходной день<br>';
        break;
    default:
        echo $day . ' Неизвестный день<br>';
}
//Задание #5
$bmw = ['model' => 'X5', 'sped' => 120, 'doors' => 5, 'year' => '2015'];
$toyota = ['model' => 'Corolla', 'sped' => 185, 'doors' => 4, 'year' => '2014'];
$opel = ['model' => 'Omega', 'sped' => 160, 'doors' => 4, 'year' => '2013'];
$auto = ['bmw' => $bmw, 'toyota' => $toyota, 'opel' => $opel];
foreach ($auto as $key => $value) {
    $array_value_print .= '<br>CAR ' . $key . '<br>';
    foreach ($auto[$key] as $k => $v) {
        $array_value_print .= ' ' . $v . ' ';
    }
}
echo $array_value_print;

//Задание #6
echo '<br><br><table border="1" style="text-align: center"><tr>';
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        if ($i % 2 == 0 && $j % 2 == 0) {
            echo '<td>(' . $j * $i . ')</td>';
        } elseif ($i % 2 == 1 && $j % 2 == 1) {
            echo '<td>[' . $j * $i . ']</td>';
        } else {
            echo '<td>' . $j * $i . '</td>';
        }
    }
    if ($i != 10) {
        echo '</tr><tr>';
    }
}
echo '</tr></table>';
