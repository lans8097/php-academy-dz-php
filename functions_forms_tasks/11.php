<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11.05.2017
 * Time: 3:54
 * 11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.
Пример:
 */

/*Было лень думать, просто скопипастил
плохо !!! зато честно =)
*/
function mb_ucfirst($str, $encoding='UTF-8')
{
    $str = mb_ereg_replace('^[\ ]+', '', $str);
    $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
        mb_substr($str, 1, mb_strlen($str), $encoding);
    return $str;
}

/*
 * а это от меня
 * */
function sixText($text){
    $array = explode('.', $text);
    $text = '';

    foreach ($array as $str){
        if(empty($str)) continue;
        $text.=mb_ucfirst($str).'. ';
    }
    return $text;
}

echo sixText('а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.');