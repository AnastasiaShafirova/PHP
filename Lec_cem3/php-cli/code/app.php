<?php

// подключение файлов логики
require_once('src/main.function.php');
require_once('src/template.function.php');
require_once('src/file.function.php');

require_once('vendor/autoload.php');

// вызов корневой функции
$configFileAddress = "/code/config.ini";
$result = main($configFileAddress);

// поиск пользователей
$address = '/code/birthdays.txt';
findBirthdays($address);

//запрос на удаление
$nameToDelete = readline("Введите имя для удаления: ");
deleteEntry($nameToDelete, $address);

// вывод результата
echo $result;
