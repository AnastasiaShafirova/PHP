<?php
$array1 = [1, 6, 4, 8, 6];
$array2 = [5, 7, 2, 9];

$result = [];

$count1 = 0;
$count2 = 0;


while ($count1 < count($array1) && $count2 < count($array2)) {
    if ($array1[$count1] < $array2[$count2]) {
        $result[] = $array1[$count1];
        $count1++;
    } else {
        $result[] = $array2[$count2];
        $count2++;
    }
}
if ($count1 < count($array1)) {                     //чтобы перебрать все оставшиеся элементы
    for (; $count1 < count($array1); $count1++) {
        $result[] = $array1[$count1];
    }
} 
if ($count2 < count($array2)) {                     //чтобы перебрать все оставшиеся элементы
    for (; $count2 < count($array2); $count2++) {
        $result[] = $array2[$count2];
    }
}
sort($result);
// echo "<pre>";
print_r($result);
//var_dump($result);