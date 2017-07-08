<?php
//называем константу
//const NAME = "Иван";
//или
define("NAME", "Коля");

if (defined('NAME')) {
    echo "Константа NAME существует и равна: ".NAME;
}
echo "<hr>";
echo "<p>Выводим переменную с помощью constant(\"имя переменной\");</p>";
echo constant("NAME");

define("NAME", "Меняю константу и получаю ничего");
echo "<hr>";
echo "Константа NAME существует и попрежнему равна: ".NAME;