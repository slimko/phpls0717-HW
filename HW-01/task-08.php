<?php
$str = "Раз Два Три Четыре Пять";
echo "<p>$str<p>";

$arr = explode(' ', $str);
echo '<pre>' . print_r($arr, true) . '</pre>';

$length = count($arr);
while ($length) {
    $r_array[] = $arr[$length - 1];
    $length--;
}
$newStr = implode(' * ', $r_array);
echo $newStr;