<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:11
 *
 * 2. Дан массив с элементами 1, 20, 15, 17, 24, 35. С помощью цикла foreach найдите сумму элементов этого массива. Запишите ее в переменную $result.
 */

$arr = [1, 20, 15, 17, 24, 35];

$result = 0;
foreach ($arr as $value) $result +=(int)$value;

echo $result;