<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 05.05.2017
 * Time: 1:29
 * 3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N задавать
 * через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

function deleteWordsInFile ($num )
{
    $file = file_get_contents('text.txt');
    echo preg_filter('#\S{'.$num.',}#ui','',$file);

}

if(!empty($_POST['num'])){
    deleteWordsInFile((int)$_POST['num']);
}
?>

<h1>Удалить слова длинее чем N</h1>
<form action="3.php" method="post">
    <lable>Макс длина:</lable>
    <input type="text" name="num" value="5">
    <button type="submit">Удалить лишнее</button>
</form>
