<?php
require_once 'functions.php';
$array_string_task1 = [
    'Функция - поименованный фрагмент программного кода (подпрограмма),',
    ' к которому можно обратиться из другого места программы.',
    ' С именем функции неразрывно связан адрес первой инструкции (оператора),',
    ' входящей в функцию, которой передаётся управление при обращении к функции.',
    ' После выполнения функции, управление возвращается обратно в адрес возврата',
    ' — точку программы, где данная функция была вызвана.'
];
$string_1_task5 = 'Карл у Клары украл Кораллы';
$string_2_task5 = 'Две бутылки лимонада';
$file_task6 = 'files/test.txt';
//Задание #1
echo '<h3>Задание #1</h3>';
echo task1($array_string_task1);
echo task1($array_string_task1, true);
//Задание #2
echo '<h3>Задание #2</h3>';
task2('+', 34, 5, 6);
task2('-', 34, 5, 6);
task2('*', 34, 0, 6);
task2('*', 34, 3, 6);
task2('/', 34, 0, 6);
task2('/', 3444, 8, 6, 12.48, 13.84);
task2('dfd', 34, 0, 6);
task2('/', 'mas', 0, 6);
//Задание #3
echo '<h3>Задание #3</h3>';
task3(5, 6);
task3(5.5, 6);
//Задание #4
echo '<h3>Задание #4</h3>';
echo task4() . ' - Текущая дата<br>';
echo task4("24.02.2016 00:00:00") . ' - UNIX_TIME 24.02.2016 00:00:00';
//Задание #5
echo '<h3>Задание #5</h3>';
task5($string_1_task5, 1);
task5($string_2_task5, 2);
//Задание #6
echo '<h3>Задание #6</h3>';
task6($file_task6);
