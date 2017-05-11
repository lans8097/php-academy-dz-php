<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11.05.2017
 * Time: 3:24
 * 10. Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен вводиться с формы.
 */

function uniqueWords($text)
{
    $text = explode(' ', $text);
    $result=[];

    foreach ($text as $key => $value){
        if(empty($result[$value])){
            $result[$value] = 1;
        }else{
            $result[$value]++;
        }
    }

    //Остовляем только уникальные
    $result = array_filter($result,function($v){
        if($v == 1) return true;
    });

    return count($result);
}

echo uniqueWords('test1 test2 test3 test1 test1 test2 test1 awdawd azw3faw3');