<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:08
 * 17.Сосктавьте массив месяцев. С помощью цикла foreach выведите все месяцы, а текущий месяц выведите жирным. Текущий месяц должен храниться в переменной $month.
 */

$month = 'April';
$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

foreach ($months as $value){
    if ($value == $month){
        echo '<p><b>'.$value.'</b></p>';
    }else{
        echo '<p>'.$value.'</p>';
    }
}