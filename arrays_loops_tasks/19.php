<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:18
 * 19. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите курсивом. Текущий день должен храниться в переменной $day.
 */

$days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$thisDay = date('N')-1;
foreach ($days as $kay => $day){
    if ($kay == $thisDay){
        echo '<b>'.$day.'</b><br>';
    }else{
        echo $day.'<br>';

    }
}