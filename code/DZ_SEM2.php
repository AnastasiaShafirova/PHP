<?php
function arOperation($num1, $num2, $operation) { //у меня получилось объединить 2 задания в 1
    switch ($operation) {
        case 'sum':
            return $num1 + $num2;

        case 'subtract':
            return $num1 - $num2;

        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Ошибка: деления на ноль";
            }
        default:
            return "Ошибка: неверная операция";      
    }
}

$resultSum = arOperation(10, 5, 'sum');
$resultSubtract = arOperation(10, 5, 'subtract');
$resultMultiply = arOperation(10, 5, 'multiply');
$resultDivide = arOperation(10, 5, 'divide');

echo "Сложение: " . $resultSum . "\n";
echo "Вычитание: " . $resultSubtract . "\n";
echo "Умножение: " . $resultMultiply . "\n";
echo "Деление: " . $resultDivide . "\n";
?>

<?php

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Михайлов'],
    'Саратовская область' => ['Саратов', 'Энгельс', 'Балаково', 'Балашов']
];
 foreach ($regions as $region => $cities) {
    echo "$region: " . implode(', ', $cities) . "\n";
 }

 ?>

 <?php

$alphabet = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'ж' => 'zh',
    'з' => 'z',
    'и' => 'i',
    'й' => 'j',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'c',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'sch',
    'ы' => 'y',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya'
    
];
 function transliterate($string) {
    global $alphabet;
    $transliterated = strtr(mb_strtolower($string, 'UTF-8'), $alphabet); //приводм все буквы к нижнему регистру
    return mb_convert_case($transliterated, MB_CASE_TITLE, 'UTF-8'); //Первая буква заглавная 
 }

 $originalString = "Привет, как дела?";
 $translitString = transliterate($originalString);

 echo "Оригинал: $originalString\n";
 echo "Транслитерация: $translitString\n";

 ?>

 <?php

function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    if ($pow < 0) {
        return 1 / power ($val, -$pow);
    }
    return $val * power($val, $pow -1);
}

$result1 = power(5, 5);
$result2 = power(2, 3);
$result3 = power(7, 0);
$result4 = power(3, -2);

echo "Результат: $result1\n";
echo "Результат: $result2\n";
echo "Результат: $result3\n";
echo "Результат: $result4\n";
?>

 <?php

function getTime() {
    $time = new DateTime(); // получили текущее время
    $hours = $time->format('H'); 
    $minutes = $time->format('i'); 

    $hourText = getHourDeclension($hours);
    $minuteText = getMinuteDeclension($minutes);
     return "$hours $hourText $minutes $minuteText";
}

function getHourDeclension($hours) {
    if ($hours % 10 == 1 && $hours % 100 != 11) {
        return 'час';
    }
    elseif ($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours % 100 < 10 || $hours %100 >= 20)) {
        return 'часа';
    } else {
        return 'часов';
    }

}

function getMinuteDeclension($minutes) {
    if ($minutes % 10 == 1 && $minutes % 100 != 11) {
        return 'минута';
    }
    elseif ($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes % 100 < 10 || $minutes %100 >= 20)) {
        return 'минуты';
    } else {
        return 'чминут';
    }
}

echo getTime();