<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:20
 *
 * 6. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские — в массив $ru. $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой'); $en = array('green', 'red','blue'); $ru = array('зеленый', 'красный', 'голубой');
 */

$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
foreach ($arr as $key => $value){
    $en[]=$key;
    $ru[]=$value;
}

print_r($en);
print_r($ru);