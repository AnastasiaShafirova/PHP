<?php

#$name = "Админ";

#var_dump([1,2,3]);

$a = 5;
$b = '05';
var_dump($a == $b); ///data/mysite.расположение/index.php:9:boolean true -- выводит такую строку, так как 5 = 05
var_dump((int)'012345'); ///data/mysite.расположение/index.php:10:int 12345 -- преобразует в число
var_dump((float)123.0 == (int)123.0); ///data/mysite.расположение/index.php:11:boolean true -- данное выражение верно
var_dump(0 == 'hello, world'); ///data/mysite.расположение/index.php:12:boolean false -- данное выражение не верно

//в версии 7.4 последняя строчка будет равна true, так как строку он приравняет к 0, соответственно выражения будут равны

$a = 1;
$b = 2;

$a = $a + $b; // a = 3
$b = $a - $b; // b = 1
$a = $a - $b; // a = 2, теперь a и b поменялись местами
