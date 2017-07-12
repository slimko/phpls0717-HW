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

function arithmetic(array $arr,$arithmetic= null){
    $res = $arr[0];
    /*Производим проверку предоставленного массива на количество чисел, если меньше 1, то выдаем предупреждение*/
    if(count($arr)<=1){
        echo 'В предоставленном массиве не более одного числа, что недостаточно для арифметических действий';
    }else{
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
                    echo "<p>Используйте только следующие арифметические операторы: + - * / %</p>";
                    exit;
            }
        }
        if($res){
            echo 'Результат арифметических действий над Вашими числами: '.$res;

        }elseif($res === 0){
            echo "Ответ: 0";
        }
        else{
            echo 'На ноль делить нельзя!';
        }
    }
}

//////////////////////////////////////////////////////


/*Задание #3*/

function calcEverything(){
    /*Получаем аргументы функции*/
    $arr = func_get_args();
    /*Извлекаем первый элемент массива, он же арифметическое действие*/
    $arithmetic = array_shift($arr);
    if(is_string($arithmetic)){
        $res = $arr[0];
        /*Производим проверку предоставленного массива на количество чисел, если меньше 1, то выдаем предупреждение*/
        if(count($arr)<=1){
            echo 'В предоставленном массиве не более одного числа, что недостаточно для арифметических действий';
        }else{
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
                        echo "<p>Используйте только следующие арифметические операторы: + - * / %</p>";
                        exit;
                }
            }
            if($res){
                echo 'Результат арифметических действий над Вашими числами: '.$res;

            }elseif($res === 0){
                echo "Ответ: 0";
            }
            else{
                echo 'На ноль делить нельзя!';
            }
        }
    }else{
        echo 'Первым аргументом функции обязательно должна быть строка, обозначающая арифметическое действие. Передайте ее.';
    }
}

/////////////////////////////////////////////////