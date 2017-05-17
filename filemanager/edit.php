<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 16.05.2017
 * Time: 13:11
 */
require_once('include.php');

if(!empty($_GET['file'])){
    //Добовляем первый сепаратор
    $file = (($_GET['file']{0}!==DS)?DS.$_GET['file']:$_GET['file']);
    //Проверяем что элемент существует
    if(!file_exists(ROOT.$file))die($file.'. file not found');
    if(!is_file(ROOT.$file))die($file.'. is not file');

    //Подгружаем содержимое
    $fileContent = file_get_contents(ROOT.$file);


    //Проверяем возможность редактирования файла
    if(!($isWrite = is_writable(ROOT.$file))){
        $error['alert'][]= 'This file cannot be edited.';
    }

    //Сохроняем изменения
    if(!empty($_POST['fileContent']) && $isWrite){
        $fileContent  = $_POST['fileContent'];
        if(file_put_contents(ROOT.$file,$fileContent)){
            $error['good'][]='Файл успешно сохранён';
        }else{
            $error['error'][]='Не Удалось сохранить измениеия.';
        }
    }
}else{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="Cache-Control" content="private">
</head>
<body>
<div class="main">
    <?=errorDisplay($error)?>
    <form action="edit.php?file=<?=$file?>" method="post">
        <textarea name="fileContent" ><?=$fileContent?></textarea>
        <button type="submit" <?=(($isWrite == false)?" disabled":'')?>>Сохранить</button>
    </form>
</div>
</body>
</html>
