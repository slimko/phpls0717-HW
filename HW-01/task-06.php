<?php
$bmw['model']='X5';
$bmw['speed']=120;
$bmw['doors']=5;
$bmw['year']=2015;

$toyota=[
    'model'=>'Supra',
    'speed'=>300,
    'doors'=>2,
    'years'=>2008
];

$opel=[
    'model'=>'Zafira Tourer',
    'speed'=>100,
    'doors'=>4,
    'years'=>2009
];

$arrayResult['bmw'] = $bmw;
$arrayResult['toyota'] =$toyota;
$arrayResult['opel'] =$opel;

foreach ($arrayResult as $key=>$value){
    echo "<p>CAR  $key<br>";
    foreach ($value as $k=>$v){
        echo $v.'&nbsp';
    }
    echo '</p>';
}