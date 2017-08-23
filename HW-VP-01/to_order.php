<?php
require_once('admin/dbconn.php'); //возвращает $pdo - коннект к базе
require_once('admin/sendmail.php'); //отправка емейл письма


if($_POST) {
    // var_dump($_POST);
    //Выполняю проверку данных пришедших со страницы
    $errormsg ='';
    if (empty($_POST['email'])) {
        $errormsg.='Введите корректный емейл адрес</br>';
    }else{
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        } else {
            $errormsg.='Введите корректный емейл адрес</br>';
        }
    }

    if(empty($_POST['phone'])){
        $errormsg.='Введите номер телефона</br>';
    }else{
        $telephone = preg_replace("/[^,.0-9]/", '', $_POST['phone']); //выбираем цифры для БД
        //проверка целостности телефона
        if(strlen($telephone)<11){
            $errormsg.='Введите номер телефона</br>';
        }
    }

    if(empty($_POST['name'])){
        $errormsg.='Введите ваше имя</br>';
    }else{
        $name = $_POST['name'];
    }

    if(empty($_POST['adress']['street']) AND empty($_POST['adress']['home'])){
        $errormsg.='Введите адрес доставки';
    }

    if($_POST['callback']==='true'){
        $callback=1;
    }else{
        $callback=null;
    }
    $adress ='';
    if($_POST['adress']){
        if(!empty($_POST['adress']['street'])){
            $adress .= 'Улица '.$_POST['adress']['street'];
        }
        if(!empty($_POST['adress']['home'])){
            $adress .= ', дом '.$_POST['adress']['home'];
        }
        if(!empty($_POST['adress']['part'])){
            $adress .= ', корпус '.$_POST['adress']['part'];
        }
        if(!empty($_POST['adress']['appt'])){
            $adress .= ', квартира '.$_POST['adress']['appt'];
        }
        if(!empty($_POST['adress']['floor'])){
            $adress .= ', этаж '.$_POST['adress']['floor'];
        }
    }

    //проверяем значение по оплате товара
    if(!isset($_POST['payment'])){$_POST['payment']=null;}

    //в случае если нет ошибок - отправляем данные в базу
    if (!empty($errormsg)){
        echo json_encode($errormsg);
    }else{
        $text='';
        //проверка на существование юзера
        if($user=check_email_user($pdo,$email)){
            //$mess ='Вы уже в базе под id='.$user['id'];
            $id_users = $user['id'];
            //подсчитать количество сделанных заказов
            $text ='Спасибо. Это ваш '.(get_count_orders($pdo, $id_users)+1).' заказ';
        }else{
            //пишем в базу нового юзера и возвращем его id
            $id_users = post_user_db($pdo,$email,$name,$telephone);
            $text ='Спасибо. Это ваш первый заказ.';
        }
        //записываем товар в базу и возвращаем id записи юзера
        $id_order = post_order_db($pdo,$id_users,$adress, $_POST['comment'], $_POST['payment'],$callback);
        sendmail($email,$id_order,$adress,$text);
        echo json_encode('<br>Ваш заказ №'.$id_order.' поступил в обработку. Письмо с подробностями отправлено на почту '.$email.'<br>'.$text);
    }


}