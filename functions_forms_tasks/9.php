<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11.05.2017
 * Time: 3:19
 * 9. Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */

function stringRevers($string)
{
    $count = mb_strlen($string)-1;
    $result='';
    for ($i = $count; $i>=0; $i--){
        $result.=$string{$i};
    }
    return $result;
}

echo stringRevers('abcde');