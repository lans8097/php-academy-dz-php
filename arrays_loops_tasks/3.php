<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:12

3. Дан массив с элементами 26, 17, 136, 12, 79, 15. С помощью цикла foreach найдите сумму квадратов элементов этого массива. Результат запишите переменную $result.
 */

$arr =[26, 17, 136, 12, 79, 15];
$result = 0;
foreach ($arr as $value) $result +=($value**$value);

echo $result;