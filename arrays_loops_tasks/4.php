<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 14:14
 *
 * 4. Дан массив $arr. С помощью первого цикла foreach выведите на экран столбец ключей, с помощью второго — столбец элементов.
 */

$arr = ['green' => 'зеленый',
        'red'   => 'красный',
        'blue'  => 'голубой'
];

foreach ($arr as $key => $value) echo 'key:'.$key.' = '.$value.'<br>';

