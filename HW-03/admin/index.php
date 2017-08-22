<?php
require_once('dbconn.php'); //возвращает $pdo - коннект к базе

echo '<h1>Привет. Ты в админке</h1>';
echo '<ul>';
echo '<li><a href="index.php?data=users">Все пользователи</a></li>';
echo '<li><a href="index.php?data=orders">Все заказы</a></li>';
echo '</ul>';




function print_allusers($pdo){
    print('
    <table border="1" cellpadding="10">
        <caption>Все заказчики</caption>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>Имя</th>
            <th>Телефон</th>
        </tr>');


        $allusers = get_users($pdo);
        foreach ($allusers as $k=>$value){
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['email'].'</td>';
            echo '<td>'.$value['name'].'</td>';
            echo '<td>'.$value['telephone'].'</td>';
            echo '</tr>';
        }

    echo '</table>';
}

function print_allorders($pdo){
    print('
    <table border="1" cellpadding="10">
        <caption>Все покупки</caption>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Телефон</th>
        </tr>');

        foreach (get_orders($pdo) as $k=>$value){
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['address'].'</td>';
            echo '<td>'.$value['comment'].'</td>';
            echo '<td>'.$value['payment'].'</td>';
            echo '<td>'.$value['callback'].'</td>';
            echo '</tr>';
        }

    echo '</table>';
}

if(!empty($_GET)) {
    switch ($_GET['data']) {
        case 'users':
            print_allusers($pdo);
            break;
        case 'orders':
            print_allorders($pdo);
            break;
    }
}
?>