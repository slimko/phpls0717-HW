<?php

$age = rand(0,92);

echo "<p>$age</p>";

if ($age >= 18 and $age <= 65) {
    echo "Вам   еще работать и работать";
} elseif ($age > 65) {
    echo "Вам пора на пенсию";
} elseif ($age < 18 and $age!=0) {
    echo "Вам еще рано работать";
} else {
    echo "Неизвестный возраст";
}