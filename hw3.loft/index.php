<?php
require_once 'src/functions.php';
$array_json_task2 = [
    ['a', 'b', 'c'],
    [1, 2, 3],
    ['hi', 'good', 'work'],
];
$file_start_task2 = 'files/output.json';
$file_end_task2 = 'files/output2.json';
$file_task3 = 'files/data_task3.csv';
$url_task4 = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revision
s&rvprop=content&format=json';
echo "<h1>Задание #1</h1>";
task1();
echo "<h1>Задание #2</h1>";
task2($file_start_task2, $file_end_task2, $array_json_task2);
echo "<h1>Задание #3</h1>";
task3($file_task3);
echo "<h1>Задание #4</h1>";
task4($url_task4);
