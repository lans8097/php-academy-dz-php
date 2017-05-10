<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 05.05.2017
 * Time: 2:28
 * 5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */







function myScanDir($dir, $inName = null, $inText = null)
{
    if(!empty($dir)){
        //Добовляем замыкающий слэш если его нет
        if($dir{mb_strlen($dir)-1}!=='\\') $dir.='\\';

        if(file_exists($dir)){
            //подгружаем каталог
            $ls = scandir($dir);
            $result = [];

            //Отбрасываем то что не надо
            foreach ($ls as $line){
                if($line == '.' || $line == '..' || is_dir($dir.$line)) continue;
                $result[] = $line;
            }
            //Так как работаем в процедурном стиле и есть несколько условий, будим перезаписывать обновлённые значения
            $ls = $result;
            $result = [];

            //Фильтруем по имени
            if(!empty($inName)){
                foreach ($ls as $line){
                    if(preg_match('#.*('.$inName.').*#ui', $line)){
                        $result[] = $line;
                    }
                }

                $ls = $result;
                $result = [];
            }

            //Фильтруем по содержимому
            if(!empty($inText)){
                foreach ($ls as $line){
                    if(strpos(file_get_contents($dir.$line),$inText)){
                        $result[] = $line;
                    }
                }
                $ls = $result;
            }
            unset($result);

            return $ls;

        }else{
            return 'Директория <b>'.$dir.'</b> не существует.';
        }
    }else{
        return 'Путь не указан';

    }
}


if(!empty($_POST)){
    $dir  = (!empty($_POST['dir'])) ?trim($_POST['dir']): null;
    $in_name = (!empty($_POST['in_name'])) ?trim($_POST['in_name']): null;
    $in_text = (!empty($_POST['in_text'])) ?trim($_POST['in_text']): null;

    if(is_array($files = myScanDir($dir, $in_name, $in_text))){

        if(count($files)){
            foreach ($files as $key => $file){
                echo '<p>'.++$key.': '.$file.'</p>';
            }
        }else{
            echo '<h5>Совпадений не найдено</h5>';
        }
    }else{
        echo $files;
    };
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
