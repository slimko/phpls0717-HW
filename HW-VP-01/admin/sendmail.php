<?php
require_once('phpmailer/PHPMailerAutoload.php');
require_once('config.php');

function sendmail($email,$id_order, $adress, $text){
    
    $mail = new PHPMailer;
    $mail->setLanguage('ru', 'phpmailer/language/');
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = SMTPSERVERS;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = EMAILPASS;                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = TCPPORT;                                    // TCP port to connect to
    $mail->CharSet = "UTF-8";

    $mail->setFrom(EMAIL, 'Заказ №'.$id_order);
    $mail->AddAddress($email, 'DarkBeefBurger за 500 рублей');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'DarkBeefBurger за 500 рублей, 1 шт';
    $mail->Body = '<p>Ваш заказ будет доставлен по адресу: '.$adress.'
                   <p>Заказ:  DarkBeefBurger за 500 рублей, 1 шт</p>
                   <p>'.$text.'</p>';
    $mail->send();
//    if ($mail->send()) {
//        echo 'Вам отправлено письмо на почту';
//    } else {
//        echo 'Ошибка отправки письма на почту';
//    }
    //die($answer);

    }