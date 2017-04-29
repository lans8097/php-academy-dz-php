<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 16:17
 * 26. Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф­я rand). Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы. После вывести на экран элементы, которые больше ноля и у которых не парный индекс.
 */

$arr=[];
for($i=0;$i<=100;$i++) $arr[]=rand(1,1000);

$sum_par = '';
$sum_n_par = '';
$arr_par = [];
$arr_n_par= [];

foreach ($arr as $kay =>$value){
    if((($kay%2)==0) && ($kay!=0)){
        $sum_par+=$value;
        $arr_par[$kay]=$value;
    }else{
        $sum_n_par+=$value;
        $arr_n_par[$kay]=$value;
    }
}
echo '<pre>';
//Вывод произведения с парными ключами
var_dump(array_product($arr_par));
//Вывод без парных индексов
var_dump($arr_n_par);
