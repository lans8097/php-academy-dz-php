<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:05
 * 16. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach и оператора if выведите на экран столбец элементов массива, как показано на картинке. 1, 2, 3 4, 5, 6 7, 8, 9
*/



$arr = [1,2,3,4, 5, 6, 7, 8, 9];

for ($i=0;$i<=count($arr)-1;$i++){
    echo $arr[$i];
    if ((($i+1)%3)==0){
        echo '<br>';
    }else{
        echo ',';
    }
}

