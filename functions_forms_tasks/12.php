<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11.05.2017
 * Time: 4:13
 */


function textRevers($text){
    $array = explode('.', $text);
    $text = '';

    foreach (array_reverse($array) as $str){
        if(empty($str)) continue;
        $text.=$str.'. ';
    }

    return $text;
}


echo textRevers('А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.');