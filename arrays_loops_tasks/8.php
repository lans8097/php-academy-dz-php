<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:28
 *
 * 8. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach создайте строку '­1­2­3­4­5­6­7­8­9­'. Циклы while и for
 */

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$str = '-';
foreach ($arr as $value){
    $str.=$value.'-';
}

echo $str;