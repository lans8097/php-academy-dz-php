<?php
/*
 * 1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть
 * и в первом и во втором поле ввода. Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b),
 * которая будет возвращать массив с общими словами.
 * */
function getCommonWords( $text1, $text2)
{
    //Разбиваем слова в массив
    $arr1 = str_word_count($text1,2,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя123456789");
    $arr2 = str_word_count($text2,2,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя123456789");

    //определяем схождения
    return array_intersect ($arr1, $arr2);

}


if(!empty($_POST['text1']) && !empty($_POST['text2'])){
    $text1 = trim($_POST['text1']);
    $text2 = trim($_POST['text2']);

    //Отображаем дубли
    echo '<p>Результат:</p><pre>';
    print_r(getCommonWords($text1, $text2));
    echo '</pre>';
}else{
    echo '<p>Нет данных для сравнения</p>';
}

?>

<form action="1.php" method="post">
    <textarea name="text1" cols="30" rows="10">
        раз два три четыри пять, шесть семь нет-такого нет-такого2 slovo
    </textarea>

    <textarea name="text2"cols="30" rows="10">
        раз два три четыри пять. шесть семь нет-такого3 efes esfzwezf slovo
    </textarea>

    <button type="submit" value="1">Отправить</button>
</form>
