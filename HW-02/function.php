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

function task2(array $arr,$arithmetic= null){
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
                    if($arr[$i]){
                    $res /= $arr[$i];
                    }else{
                        echo 'На ноль делить нельзя';
                        return;
                    }
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
//        else{
//            echo 'На ноль делить нельзя!';
//        }
    }
}

/////////////////////////////////////////////////


/*Задание #3*/

function task3(){
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

/*Задание #4*/

function task4($num_one=null,$num_two=null){
    if(is_int($num_one) AND $num_one>0 AND is_int($num_two) AND $num_two>0){
        echo '<table><tr>';
        for ($i = 1; $i <= $num_one; $i++){
            for ($j = 1; $j <= $num_two; $j++){
                echo '<td>&nbsp' . ($i * $j) . '&nbsp</td>';
            }
            if ($i != $num_one){
                echo '</tr><tr>';
            }
        }
        echo '</tr></table>';
    }else{
        echo 'Введите целые числа больше 0';
    }
}

/////////////////////////////////////////////////

function task5_one($str){
    //удаляем пробелы из строки и приводим все к нижнему регистру
    $var1 = mb_strtolower(preg_replace('/\s/', '', $str));

    //функция переворачивает строку
    function utf8_strrev($str){
        preg_match_all('/./us', $str, $ar);
        return implode(array_reverse($ar[0]));
    }

    //переворачиваем строку
    $var2 = utf8_strrev($var1);

    //проверяем на совпадение строк
    if (strcasecmp($var1, $var2) == 0) {
        return true;
    }else{
        return false;
    }
}

function task5_two($str){
    if(task5_one($str)){
        echo 'Введенное значение палиндром';
    }else{
        echo 'Введенное значение не палиндром';
    }
}

//////////////////////////////////////////////////////////

function task7_one($s) {
    //удаляем буквы К с модификатором /u
    print_r(preg_replace('([К])u','',$s));
    //u (PCRE_UTF8) - Этот модификатор включает дополнительную функциональность PCRE, которая не совместима с Perl: шаблон и целевая строка обрабатываются как UTF-8 строки. Модификатор u доступен в PHP 4.1.0 и выше для Unix-платформ, и в PHP 4.2.3 и выше для Windows платформ. Валидность UTF-8 в шаблоне и целевой строке проверяется начиная с PHP 4.3.5. Недопустимая целевая строка приводит к тому, что функции preg_* ничего не находят, а неправильный шаблон приводит к ошибке уровня E_WARNING. Пятый и шестой октеты UTF-8 последовательности рассматриваются недопустимыми с PHP 5.3.4 (согласно PCRE 7.3 2007-08-28); ранее они считались допустимыми.
}
function task7_two($s, $replacement) {
    //удаляем буквы К с модификатором /u
    print_r(preg_replace('(Две)u',$replacement,$s));
    //u (PCRE_UTF8) - Этот модификатор включает дополнительную функциональность PCRE, которая не совместима с Perl: шаблон и целевая строка обрабатываются как UTF-8 строки. Модификатор u доступен в PHP 4.1.0 и выше для Unix-платформ, и в PHP 4.2.3 и выше для Windows платформ. Валидность UTF-8 в шаблоне и целевой строке проверяется начиная с PHP 4.3.5. Недопустимая целевая строка приводит к тому, что функции preg_* ничего не находят, а неправильный шаблон приводит к ошибке уровня E_WARNING. Пятый и шестой октеты UTF-8 последовательности рассматриваются недопустимыми с PHP 5.3.4 (согласно PCRE 7.3 2007-08-28); ранее они считались допустимыми.
}

/////////////////////

function printSmile(){
    echo "<pre>
             OOOOOOOOOOO
         OOOOOOOOOOOOOOOOOOO
      OOOOOO  OOOOOOOOO  OOOOOO
    OOOOOO      OOOOO      OOOOOO
  OOOOOOOO  #   OOOOO  #   OOOOOOOO
 OOOOOOOOOO    OOOOOOO    OOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
OOOO  OOOOOOOOOOOOOOOOOOOOOOOOO  OOOO
 OOOO  OOOOOOOOOOOOOOOOOOOOOOO  OOOO
  OOOO   OOOOOOOOOOOOOOOOOOOO  OOOO
    OOOOO   OOOOOOOOOOOOOOO   OOOO
      OOOOOO   OOOOOOOOO   OOOOOO
         OOOOOO         OOOOOO
             OOOOOOOOOOOO
              </pre>";
}
function task8($s){
    if(preg_match("|:\)|", $s)){
        printSmile();
    }else{
        preg_match_all("|RX\s?packets:\d+|", $s, $match);
        foreach ($match[0] as $value) {
            preg_match("|\d+|", $value, $result);

            if ($result[0] > 1000) {
                echo "Сеть есть";
            }
        }
    }
}

//////////////////////////////////

function task9($filename){
    // название файла
    $file = $filename.'.txt';
    //получаем содержимое файла
    echo file_get_contents($file);
}

//////////////////////////////

function task10(){
    // текст, который будем записывать
    $text = "Hello again!";
    // открываем файл, если файл не существует создаем его
    $fp = fopen("anothertest.txt", "w+");
    // записываем в файл текст
    if (fwrite($fp, $text)){
        echo 'Запись в файл anothertest.txt произведена';
    }
    // закрываем
    fclose($fp);
}