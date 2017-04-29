<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 16:34
27. Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице, $cols - кол-во столбцов в таблице. Есть список цветов, в массиве: $colors = array('red','yellow','blue','gray','maroon','brown','green'). Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols, в которой все ячейки будут иметь цвета, выбранные случайным образом из массива $colors. В каждой ячейке должно находиться случайное число.
 */

$rows = 10;
$cols = 10;
$colors = ['red','yellow','blue','gray','maroon','brown','green'];
$table = '';

$table.='<table>';
for ($r=1;$r<=$rows;$r++){
    $table.='<tr>';
    for ($c=0;$c<=$cols;$c++){
        $table.='<td bgcolor="'.$colors[rand(0,7)].'">'.rand(1,9999).'</td>';
    }
    $table.='</tr>';
}
$table.='</table>';

echo $table;