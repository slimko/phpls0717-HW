<?php
//первый вариант исполнения Задания 1
function task1(array $array, $str = false){
    $res = '';
    foreach ($array as $key => $value){
        if($str == false){
            $res .= "<p>$value</p>";
        } else {
            $res .= $value.' ';
        }
    }
    return $res;
}
//второй вариант выполнения Задания 1 (более логичный)
function task11(array $array, $str = false){
    if($str == false) {
        foreach ($array as $key => $value) {
            echo "<p>$value</p>";
        }
    }else{
        $res = implode(" ", $array);
        return $res;
    }
}

/////////////////////////////////////////////////

/*Задание 2*/

function arithmetic(array $arr,$arithmetic='+'){
    $res = $arr[0];
    for($i=1;$i<count($arr);$i++) {
        switch ($arithmetic) {
            case '+':
                $res += $arr[$i];
                break;
            case '-':
                $res -= $arr[$i];
                break;
            case '*':
                $res *= $arr[$i];
                break;
            case '/':
                $res /= $arr[$i];
                break;
            case '%':
                $res %= $arr[$i];
                break;
            default:
                $res = "<p>Допускается использовать только следующтие операторы: + - * / %</p>";
                break;
        }
    }
    echo $res;
}