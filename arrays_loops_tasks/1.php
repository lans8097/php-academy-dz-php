<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:09
 *
 * 1. Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'. С помощью цикла foreach выведите эти слова в столбик.
 */

$arr =['html', 'css', 'php', 'js', 'jq'];

foreach ($arr as $value){
    echo $value.'<br>';
}
