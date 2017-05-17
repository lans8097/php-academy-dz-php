<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 14.05.2017
 * Time: 1:36
 */
require_once('include.php');

//Если путь не указан то работаем в корне
if(!empty($_GET['dir'])){
    //Добовляем первый и замыкающий сепаратор
    $dir = ($_GET['dir']{0}!==DS)?DS.$_GET['dir']:$_GET['dir'];
    $dir = ($dir{mb_strlen($dir)-1}!==DS)?$dir.DS:$dir;
}else{
    $dir = DS;
}

//проверяем существует ли дериктория
if(!file_exists(ROOT.$dir))die('path not found');
//проверка что это каталог
if(!is_dir(ROOT.$dir))die('this path is not dir');

//Удаление файла
if(!empty($_GET['drop'])){
    //Добовляем первый сепаратор
    $dropFile = ($_GET['drop']{0}!==DS)?DS.$_GET['drop']:$_GET['drop'];
    //Добовляем первый и замыкающий сепаратор
    if(file_exists(ROOT.$dir.$dropFile)){
        if(unlink(ROOT.$dir.$dropFile)){
            $error['good'][]=$dropFile.'. удалено';
        }else{
            $error['error'][] = '<p>Не удалось удалить : '.$dropFile.'</p>';
        }
    }else{
        $error['error'][]=ROOT.$dir.$dropFile.'. not found.';
    }

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
<div class="manager">
    <div class="breadCrumbs">
        <?=breadCrumbs($dir)?>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th width="20">Typ</th>
            <th width="120">Size</th>
            <th width="145px">Date</th>
            <th width="40px">chmod</th>
            <th width="80px"></th>
        </tr>
        <?
        foreach (new DirectoryIterator(ROOT.$dir) as $item){
            if($item->isDot()) continue;
        ?>
        <tr>
            <td>
                <a href="<?=($item->isDir())?'?dir='.$dir.$item->getFilename():$dir.$item->getFilename()?>" <?=($item->isFile())?'target="_blank"':''?>>
                <?=$item->getFilename()?>
                </a>
            </td>
            <td><?=$item->getExtension()?></td>
            <td><?=$item->getSize()?></td>
            <td><?=date('d-m-Y h:i:s',$item->getATime())?></td>
            <td><?=substr(sprintf('%o', $item->getPerms()), -4)?></td>
            <td class="conf">
                <?php
                if($item->isFile()) echo '<a href="edit.php?file='.$dir.$item->getBasename().'">Edit</a> |';
                ?>
                <a href="?dir=<?=$dir?>&drop=<?=$item->getFilename()?>">Delete</a>
            </td>
        </tr>
        <? }
        ?>
    </table>
</div>

</div>

</body>
</html>
