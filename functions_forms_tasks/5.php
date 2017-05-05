<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 05.05.2017
 * Time: 2:28
 * 5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */



function myScanDir($dir, $in_name, $in_text)
{
    //Проверяем указан ли путь и существует-ли такая дериктория
    if($dir === null){
        return '<p>Вы забыли указать где искать !.</p>';
    }elseif (!is_dir($dir)){
        return '<p>Я не смог найти такую дерикторию !.</p>';
    }

    //Добовляем замыкающий слэш если его нет
    if($dir{mb_strlen($dir)-1}!=='\\') $dir.='\\';

    //Подгружаем листинг раздела
    $ls = scandir($dir);
    $result = [];

    //Фильтруем по имени
    if($in_name !== null){
        foreach ($ls as $line){
            //отбрасываем линки верх в низ
            if($line == '.' || $line == '..') continue;
            //Если это не файл то пропускамем
            if(!is_file($dir.$line)) continue;

            //проверяем имя
            if(preg_match('#.*('.$in_name.'){1}.*#u', $line)) $result[] = $line;
        }

        //Обновляем листинг
        $ls = $result;
        $result = [];
    }

    //Фильтруем по содержимому
    if($in_text !== null){
        foreach ($ls as $line){
            //отбрасываем линки верх в низ
            if($line == '.' || $line == '..') continue;
            //Если это не файл то пропускамем
            if(!is_file($dir.$line)) continue;
            //проверяем на соответствие
            if(strpos(file_get_contents($dir.$line),$in_text)){
                $result[] = $line;
            }
        }
        $ls = $result;
    }

    if(count($ls)){
        $result.= '<p>Найдено '.count($ls).' совпадений.</p>';
        $result.= '<ul>';
        foreach ($ls as $line){
            $result.= '<li>'.$line.'</li>';
        }
        $result.= '</ul>';

        return $result;
    }else{
        return '<p>Нет совпадений.</p>';
    }
}


if(!empty($_POST)){
    $dir  = (!empty($_POST['dir'])) ?trim($_POST['dir']): null;
    $in_name = (!empty($_POST['in_name'])) ?trim($_POST['in_name']): null;
    $in_text = (!empty($_POST['in_text'])) ?trim($_POST['in_text']): null;

    echo myScanDir($dir, $in_name, $in_text);
}
?>

<h3>5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово. Директория и искомое слово задаются как параметры функции.</h3>
<form action="5.php" method="post">
    <table>
        <tr>
            <th>Где:</th>
            <td><input type="text" name="dir" style="width:400px;" value="<?=(!empty($dir)?$dir:__DIR__)?>"></td>
        </tr>
        <tr>
            <th>В названии:</th>
            <td><input type="text" name="in_name" style="width:400px;" value="<?=(!empty($in_name)?$in_name:'')?>"></td>
        </tr>
        <tr>
            <th>В файле:</th>
            <td><input type="text" name="in_text" style="width:400px;" value="<?=(!empty($in_text)?$in_text:'')?>"></td>
        </tr>
        <tr>
            <td rowspan="2">
                <input type="submit" value="Отправить">
            </td>
        </tr>
    </table>
</form>
