<?php
require_once('function.php');

$array_str = array (
    "first" => "Программист знает тайны Вселенной всей,",
    "second" => "Он имеет огромную силу.",
    "third" => "Он путь нужный отыщет мышкой своей,",
    "fourth" => "И найдёт золотую жилу."
);
echo '<h1>Первый вариант Задания №1</h1>';
echo '<h2>Выводим массив строк в отдельном параграфе</h2>';
echo task1($array_str, false);


echo '<h2>Выводим массив строк в одну строку</h2>';
echo task1($array_str, true);

echo '<p></p>';
echo '<h1>Второй вариант Задания №1</h1>';
echo '<h2>Выводим массив строк в отдельном параграфе</h2>';
task11($array_str);
echo '<h2>Выводим массив строк в одну строку</h2>';
echo task11($array_str,true);

echo '<hr>';
echo '<h1>Задание №2</h1>';



arithmetic(array(15,0),'+');