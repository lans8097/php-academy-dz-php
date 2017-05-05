<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 05.05.2017
 * Time: 0:59
 * 2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.
 */

function topBigStr($text)
{
    $arr = str_word_count($text,2,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя123456789");
    if(count($arr)<3) die('Надо как минимум 3 слова');
    $top = [];
    foreach ($arr as $key => $value){
        $top[$key] = mb_strlen($value);
    }

    //Сортируем по длине
    arsort ($top);
    $i = 0;
    $res = '';
    $top = array_slice($top,0,3, true);

    foreach ($top as $key => $value){
        $res .= ++$i.'. '.$arr[$key].'<br>';
    }

    return $res;
}


if(!empty($_POST['text'])){
    $text = trim($_POST['text']);

    //Топ по длине
    echo '
        <p>Результат:</p><pre>'.topBigStr($text).'</pre>
        ';
}else{
    echo '<p>Нет данных для сравнения</p>';
}

?>

<form action="2.php" method="post">
    <textarea name="text" cols="30" rows="10">
        раз два три четыри пять, шесть семь нет-такого нет-такого2 slovo
    </textarea>

    <button type="submit" value="1">Отправить</button>
</form>
