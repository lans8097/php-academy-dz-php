<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:50
 * 13. Вывести таблицу умножения
 */

echo '<table>';
for ($i=1;$i<=10;$i++){
    echo '<tr>';
    for ($j=1;$j<=10;$j++){
        echo "<td>".($i*$j)."</td>";
    }
    echo '</tr>';
}
echo '</table>';