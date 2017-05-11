<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11.05.2017
 * Time: 4:28
 */

$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

$array = explode(' ',$string);
$result=[];

foreach ($array as $value){
    if(empty($result[$value])){
        $result[$value] = 1;
    }else{
        $result[$value]++;
    }
}

//Остовляем только уникальные
arsort($result);

echo '<pre>';
print_r($result);