<?php

$str = "(())()())";
echo chec($str) ? "Строка валидна" : "Ошибка";

function chec(string $str): bool 
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === "(") {
            $count++;
        } else if ($str[$i] === ")") {
            $count--;
        }
        if ($count < 0) {
            return false;
        }
    }
    return $count === 0;
}
