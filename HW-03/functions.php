<?php
ini_set("display_errors",1);
error_reporting(E_ALL);


// это рекурсия для task01 - первый вариант решения
function task01_0($file){
    //Читаем атрибуты и выводим их
    foreach ($file->attributes() as $attr=>$attrvalue) {
        echo '<b>'.$attr.':</b> '.$attrvalue.'<br>';
    }
    //Выводим поля у файла
    foreach ($file as $value) {
        if ($value->count() == 0) {
            echo $value->getName();
            echo ':  ';
            echo $value;
            echo '<br>';
        } else {
            echo '<br>';
            task01_1($value);//Запускаем рекурсию
        }

    }
    echo '<br>';
}

function task01($file){
    if (file_exists($file)) {
        $xml = simplexml_load_file($file); //читаем xml

        task01_0($xml);

    } else {
        exit('Не удалось открыть файл'.$file);
    }

}
// второй вариант решения задачи
function task01_1($file){
    if (file_exists($file)) {
        $xml = simplexml_load_file($file); //читаем xml

        echo 'Номер заказа на поставку: '.$xml->attributes()->PurchaseOrderNumber;
        echo '<br>';
        echo 'Дата заказа: '.$xml->attributes()->OrderDate;

        echo '<p>';
        foreach ($xml->children()->Address as $value){

            //print_r($value);
            if($value['Type'][0]=="Shipping") {

                echo '<div style="display: inline-block;margin:10px 10px 10px 0">';
                echo '<b>Груз доставить от:</b><br>';
            }
            else{
                echo '<div style="display: inline-block">';
                echo '<b>Груз доставить до:</b><br>';
            }
            echo 'Имя <i>' . $value->Name . '</i><br>';
            echo 'Улица <i>' . $value->Street . '</i><br>';
            echo 'Город <i>' . $value->City . '</i><br>';
            echo 'Штат <i>' . $value->State . '</i><br>';
            echo 'Почтовый код <i>' . $value->Zip . '</i><br>';
            echo 'Страна <i>' . $value->Country . '</i><br>';
            echo '</div>';
        }
        echo '</p>';

        echo '<p>Комментарий к заказу: '.$xml->children()->DeliveryNotes;
        echo '</p>';
        foreach ($xml->children()->Items->children() as $value){
            echo '<div style="display: inline-block;margin:10px 10px 10px 0">';
            echo 'Товар: '.$xml->children()->Items->children()->attributes()->PartNumber. '</i><br>';
            echo 'Название:  <i>' . $value->ProductName . '</i><br>';
            echo 'Количество: <i>' . $value->Quantity . '</i><br>';
            echo 'Цена: <i>' . $value->USPrice . '</i><br>';
            echo 'Комментарий: <i>' . $value->Comment . '</i><br>';
            echo '</div>';
        }
    } else {
        exit('Не удалось открыть файл'.$file);
    }

}

//массив для задания 2
$movies = array(
    array(
        "title" => "Rear Window",
        "director" => "Alfred Hitchcock",
        "year" => 1954,
        "actors"=>array(
            "first"=>"Vasya Dimin",
            "second"=>"Ivan ivanov",
            "third"=>"Kolya Dogomis"
        )
    ),
    array(
        "title" => "Full Metal Jacket",
        "director" => "Stanley Kubrick",
        "year" => 1987,
        "actors"=>array(
            "first"=>"Misha Petrov",
            "second"=>"Alexsanr Perov",
            "third"=>"Alina Pyshka"
        )
    ),
    array(
        "title" => "Mean Streets",
        "director" => "Martin Scorsese",
        "year" => 1973,
        "actors"=>array(
            "first"=>"Dasha Stopar",
            "second"=>"Kolya ivanov",
            "third"=>"Pacha Perov"
        )
    )
);

function task02($array){
    $json_massiv=json_encode($array);
    echo '<p>Массив с данными:</p>'.$json_massiv;

    // открываем файл, если файл не существует, делается попытка создать его
    $file = fopen("output.json", "w");

    // записываем в файл текст
    if(fwrite($file, $json_massiv)){
        echo '<p>Данные успешно записаны в output.json</p>';
    }else{
        echo '<p>Не хватает прав для записи на жестком диске</p>';
    }
    // закрываем
    fclose($file);

    //получаем содержимое файла
    $file2 = file_get_contents('output.json');
    $a = rand(1,100);
    if (($a % 2) == 0){
        echo "$a - четное число, значит изменяем данные." ;
        $data=json_decode($file2,TRUE); //декодируем в массив
        //print_r($data);
        foreach ( $data  as $key => $value){    // Найти в массиве
            //print_r($value).'<br>';
            foreach ($value as $k=>$v){
                //echo $k;
                if ($k=="year") {    // Совпадение значения переменной
                    //echo "Нашел";

                    $value[$k] = rand(1000,2017);  // Присвоить новое значение


                }
            }
            $data[$key]=$value; //обновляем основной массив

        }
        print_r($data);
        file_put_contents('output2.json',json_encode($data));
    //пишем все это в файл обратно

    }else {
        echo "$a - нечетное число, значит не изменяем данные." ;
        unset($file2); //удаляем
    }

    //ищем разницу в файлах

    $array1 = file_get_contents('output.json');
    $array2 = file_get_contents('output2.json');

    $arrayone =json_decode($array1,TRUE);
    $arraytwo =json_decode($array2,TRUE);
    echo '<p>Исходный массив:<br>';
    var_dump($arrayone);
    echo '</p><p>Измененный массив:<br>';
    var_dump($arraytwo);
    echo '</p>';

    //выводим разницу

    //$result = array_diff_assoc($arrayone, $arraytwo);
    //print_r(array_uintersect_assoc($arrayone, $arraytwo));

    //пишем свою функцию.
    function array_discrepancy($arrayone, $arraytwo){
        $result = array_diff($array1, $array2);
    }
    print_r(array_intersect($arrayone, $arraytwo));

    //print_r(array_diff($arrayone, $arraytwo));
    //var_dump($result);
}

function task03()
{
    //создаем массив и перемещиваем его
    $random_array = range('1', '102');
    shuffle($random_array);

    //открываем файл, если файл не существует, делается попытка создать его
    $fp = fopen('file.csv', 'w');
    //пишем в файл наш массив
    fputcsv($fp, $random_array);
    //закрываем
    fclose($fp);

    //код показывает количество полей в файле csv
    $row = 1;
    if (($handle = fopen("file.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num поле(й) в строке(ах) $row: <br /></p>\n";
            $row++;
        }
        fclose($handle);
    }


    $handle = fopen("file.csv", "r");
    $data = fgetcsv($handle, 1000, ",");
    foreach ($data as $key => $val){
        //проверяем значения на четность
        if ($val % 2 === 0) {
            //помещаем четные в массив
            $even_array[] = $val;
        }

    }
    //считаем сумму четных значений массива
    echo '<h2>Сумма четных значений массива '.array_sum ($even_array).'</h2>';

    fclose($handle);

}

function task04(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $out = curl_exec($curl);
        $out = json_decode($out,true);

    //бред но вывожу вот так

    echo     '<p><b>Page id</b> '.$out['query']['pages']['15580374']['pageid'].'</p>';
    echo     '<p><b>Title</b> '.$out['query']['pages']['15580374']['title'].'</p>';
    
    curl_close($curl);
}