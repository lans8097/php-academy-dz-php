<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:38
 *
 * 12. Дано число $n = 1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50. Какое число получится? Посчитайте количество итераций, необходимых для этого (итерации — это количество проходов цикла), и запишите его в переменную $num.
 */

$n = 1000;
$num = 0;

while($n >= 50){
    $n/=2;
    $num++;
}
echo 'проходов '.$num.' результат '.$n;