<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 16:41
 * 28. Вывести таблицу умножения с помощью двух циклов for.
 */


$rows = 10;
$cols = 10;
$table = '';

$table.='<table border="1">';
for ($r=1;$r<=$rows;$r++){
    $table.='<tr>';
    for ($c=1;$c<=$cols;$c++){
        $table.='<td>'.($r*$c).'</td>';
    }
    $table.='</tr>';
}
$table.='</table>';

echo $table;