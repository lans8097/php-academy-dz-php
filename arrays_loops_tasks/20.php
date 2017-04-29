<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 29.04.2017
 * Time: 15:21
 * 20.Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 20 рядов, а не 5.

x
xx
xxx
xxxx
xxxxx
 */


for ($i=1;$i<=20;$i++){
    echo str_repeat('x',$i).'<br>';
}