<?php
//Задание #1
function task1()
{
    $file = file_get_contents('files/data.xml');
    $contents = new SimpleXMLElement($file);
    echo "<div style='border: 1px solid #000;width: 500px; padding-left:20px'>" . task1_parsing($contents) . "</div>";
}

function task1_parsing($contents)
{
    $date = implode('-', array_reverse(explode('-', $contents["OrderDate"])));
    $shipping_information = '<h1>Order № ' . $contents["PurchaseOrderNumber"] . '  Date: ' . $date . '</h1>';
    foreach ($contents as $data => $content) {
        switch ($data) {
            case 'Address':
                $shipping_information .= "<h3>{$data} {$content->attributes()->Type}</h3>";
                $shipping_information .= task1_parsing_details($content);
                break;
            case  'DeliveryNotes':
                $shipping_information .= "<h3>{$data} : {$content}</h3>";
                break;
            case 'Items':
                foreach ($content as $caption => $items) {
                    $shipping_information .= "<h4>PartNumber : {$items->attributes()->PartNumber}</h4>";
                    $shipping_information .= task1_parsing_details($items);
                }
                break;
        }
    }
    return $shipping_information;
}

function task1_parsing_details($content)
{
    $details = '';
    foreach ($content as $caption => $value) {
        $details .= "<p>{$caption} : {$value}</p>";
    }
    return $details;
}

//Задание #2
function task2($file_start, $file_end, $data)
{
    task2_write_json($file_start, $data);
    task2_rand_change_json($file_end, task2_read_json($file_start));
    if (!task2_compare($file_start, $file_end)) {
        echo '<p>Отличающихся элементов не найдено!</p>';
    } else {
        echo '<p>Отличающиеся элементы : </p>';
        echo task2_compare($file_start, $file_end);
    }
}

function task2_write_json($file, $data)
{
    $encoded = json_encode($data);
    file_put_contents($file, $encoded);
}

function task2_read_json($file)
{
    $json = file_get_contents($file);
    $decoded = json_decode($json, true);
    return $decoded;
}

function task2_rand_change_json($file, $decoded)
{
    $random_change = rand(0, 1);
    if ($random_change == 1) {
        task2_write_json($file, array_reverse($decoded));
    } else {
        task2_write_json($file, $decoded);
    }
}

function task2_compare($file_start, $file_end)
{
    $start = task2_read_json($file_start);
    $end = task2_read_json($file_end);
    $no_comp = '';
    for ($row = 0; $row < count($start); $row++) {
        for ($col = 0; $col < count($end); $col++) {
            if ($start[$row][$col] != $end[$row][$col]) {
                $no_comp .= '[' . $row . '][' . $col . ']' . $start[$row][$col] . ' != ' . $end[$row][$col] . '<br>';
            }
        }
    }
    return $no_comp;
}

//Задание #3
function task3($file)
{
    $array_csv = task3_create_array();
    task3_write_csv($file, $array_csv);
    if (!task3_get_sum_even($file)) {
        echo 'Четных чисел в массиве не обнаружено';
    } else {
        echo 'Сумма четных чисел равна : ' . task3_get_sum_even($file);
    }
}

function task3_create_array()
{
    $array_csv = [];
    for ($row = 0; $row < 50; $row++) {
        $array_csv[$row] = rand(1, 100);
    }
    return $array_csv;
}

function task3_write_csv($file, $array_csv)
{
    $csv_file = fopen($file, 'w');
    fputcsv($csv_file, $array_csv, ';');
    fclose($csv_file);
}

function task3_get_sum_even($file)
{
    return task3_search_and_sum_even(explode(';', file_get_contents($file)));
}

function task3_search_and_sum_even($numbers)
{
    $sum_even = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $sum_even += $number;
        }
    }
    return $sum_even;
}

//Задание #4
function task4($url)
{
    $content = file_get_contents($url);
    $decoded = json_decode($content, true);
    $cuts_out_content = array_shift($decoded['query']['pages']);
    echo 'page_id : ' . $cuts_out_content['pageid'] . ' title : ' . $cuts_out_content['title'];
}
