<?php

$address = '/code/birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if(validate($date)){
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');
    
    if(fwrite($fileHandler, $data)){
        echo "Запись $data добавлена в файл $address";
    }
    else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }
    
    fclose($fileHandler);
}
else{
    echo "Введена некорректная информация";
}

function validate(string $date): bool {
    $dateBlocks = explode("-", $date);

    if(count($dateBlocks) !== 3){  //проверка на количество частей даты
        echo "Ошибка: Неверный формат даты. Необходимо ДД-ММ-ГГГГ";
        return false;
    }

    list($day, $month, $year) = $dateBlocks;

    if(!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) { 
        echo "Ошибка: Дата содержит недопустимые символы";
        return false;
    }
    
    if((int)$day <1 || (int)$day > 31) {
        echo "Ошибка: День должен быть в диапозоне от 1 до 31";
        return false;
    }

    if((int)$month <1 || (int)$month > 12) {
        echo "Ошибка: Месяц должен быть в диапозоне от 1 до 12";
        return false;
    }
    if((int)$year > date('Y')) {
        echo "Ошибка: Год не может быть больше текущего";
        return false;
    }

    $isValidDate = checkdate((int)$month, (int)$day, (int)$year);
    if (!$isValidDate) {
        echo "Ошибка: Указана некорректная дата";
    }
    return $isValidDate;
}

$dataInput = '29-02-2020';
if (validate($dataInput)) {
    echo "Дата корректна!";
} else {
    echo "Дата некорректна";
}

function findBirthdays(string $address) { //поиск 
    $today = date('d-m');
    $fileHandle = fopen($address, 'r');
    $found = false;

    while($line = fgets($fileHandle)) {
        $data = explode(", ", trim($line));
        if (count($data) === 2) {
            $birthdate = date('d-m', strtotime($data[1]));
            if ($birthdate === $today) {
                echo "Сегодня день рождения у: " . $data[0] . "\n";
                $found = true;
            }
        }
    }

    if (!$found) {
        echo "Сегодня никто не поздравляем";
    }

    fclose($fileHandle);
}

function deleteEntry(string $name, string $address) { //удаление строки
    $lines = file($address, FILE_IGNORE_NEW_LINES);
    $newLines = [];
    $found = false;

    foreach ($lines as $line) {
        if (strpos($line, $name) === false) {
            $newLines[] = $line; //Сохранится все, кроме той записи, которую нужно удалить
        } else {
            $found = true;
        }
    }

    if ($found) {
        file_put_contents($address, implode(PHP_EOL, $newLines));
        echo "Запись о $name удалена";
    } else {
        echo "Ошибка: Запись о $name не найдена";
    }
}

