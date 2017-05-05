<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 05.05.2017
 * Time: 2:21
 * 4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
 */

function ls($dir){
    if(is_dir($dir)){
        $ls = scandir($dir);
        foreach ($ls as $line){
            if($line == '.' || $line == '..') continue;

            echo '<p>'.$line.'</p>';
        }
    }else{
        echo '<h2>Директория не существует</h2>';
    }
}

ls(__DIR__);