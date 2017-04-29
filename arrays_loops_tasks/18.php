<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:13
 * 18. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, выходные дни следует вывести жирным.
 */

$days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
foreach ($days as $day){
    if (in_array($day,['Saturday', 'Sunday'])){
        echo '<b>'.$day.'</b><br>';
    }else{
        echo $day.'<br>';

    }
}