<?php
$user = 'root';
$pass = 'root';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=burgers;charset=utf8', $user, $pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

/*Записать в базу нового юзера*/
function post_user_db($pdo,$email,$name,$telephone){
    $post_user_db = $pdo->prepare("INSERT INTO users (email, name, telephone) VALUES (:email, :name, :telephone)");
    $post_user_db->bindParam(':email', $email);
    $post_user_db->bindParam(':name', $name);
    $post_user_db->bindParam(':telephone', $telephone);
    $post_user_db->execute();
    return $pdo->lastInsertId();//возвращаем id новой записи в users
}
/*Записать в базу новый заказ*/
function post_order_db($pdo,$user_id,$address,$comment=null,$payment=null,$callback=null){
    $post_order_db = $pdo->prepare("INSERT INTO zakaz (user_id, address,comment,payment,callback) VALUES (:user_id,:address, :comment,:payment,:callback)");
    $post_order_db->bindParam(':user_id', $user_id);
    $post_order_db->bindParam(':address', $address);
    $post_order_db->bindParam(':comment', $comment);
    $post_order_db->bindParam(':payment', $payment);
    $post_order_db->bindParam(':callback', $callback);
    $post_order_db->execute();
    return $pdo->lastInsertId(); //Возвращаем id заказа
}

/*Проверка пользователя на существование по емейлу*/
function check_email_user($pdo,$email)
{
    $check_email_user = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $check_email_user->bindParam(':email', $email);
    $check_email_user->execute();
    return $check_email_user->fetch(PDO::FETCH_ASSOC);

}

function get_users($pdo){
    $allusers = $pdo->query('SELECT * FROM users');
    return $allusers->fetchall(PDO::FETCH_ASSOC);
}

function get_orders($pdo){
    $allorders= $pdo->query('SELECT * FROM zakaz');
    return $allorders->fetchall(PDO::FETCH_ASSOC);
}