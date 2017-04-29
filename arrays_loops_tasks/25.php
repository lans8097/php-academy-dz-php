<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:41
 * 25. Ваше задание создать массив, наполнить это случайными значениями (функция rand), найти максимальное и минимальное значение и поменять их местами.
 */
$arr=[];
for($i=0;$i<=100;$i++) $arr[]=rand(1,1000);

$min = 0;
$max = 0;
$count = count ($arr);

for ($i = 1; $i < $count; $i++) {
    if ($arr[$i] > $arr[$max]) $max = $i;
    if ($arr[$i] < $arr[$min]) $min = $i;
}

$arr[$min] += $arr[$max];
$arr[$max] = $arr[$min] - $arr[$max];
$arr[$min] = $arr[$min] - $arr[$max];
print_r($arr);