<?php
$day = mt_rand(0,9);
$rabday = range(1,5); //упрощаем поиск для вывода рабочего дня

echo "<p>День:$day</p>";

switch ($day) {
    case 0:
        echo "Неизвестный день";
        break;
    case in_array($day,$rabday):
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}