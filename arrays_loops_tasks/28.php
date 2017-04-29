<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 16:41
 * 28. Вывести таблицу умножения с помощью двух циклов for.
 */


$rows = 10;
$cols = 7;
$colors = ['red','yellow','blue','gray','maroon','brown','green'];
$table = '';

$table.='<table>';
for ($r=1;$r<=$rows;$r++){
    $table.='<tr>';
    for ($c=0;$c<=$cols;$c++){
        $table.='<td bgcolor="'.$colors[rand(0,7)].'">'.$r*$c.'</td>';
    }
    $table.='</tr>';
}
$table.='</table>';

echo $table;